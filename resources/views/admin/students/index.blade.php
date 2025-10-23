@extends('layouts.dashboard-layout')

@section('title', 'Courses Management')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@section('content')
<div class="dashboard-container">
    <h1>Courses Management</h1>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="card" style="background-color:#d1fae5; color:#065f46; margin-bottom:1rem;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="card" style="background-color:#fee2e2; color:#b91c1c; margin-bottom:1rem;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form tambah course --}}
    <div class="card">
        <h3>Add New Course</h3>
        <form action="{{ route('admin.courses.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label>Course Code</label>
                <input type="text" name="code" value="{{ old('code') }}" placeholder="e.g. CS101" required class="input-field">
            </div>
            <div>
                <label>Course Name</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Introduction to CS" required class="input-field">
            </div>
            <div>
                <label>SKS</label>
                <input type="number" name="sks" value="{{ old('sks') }}" min="1" required class="input-field">
            </div>
            <div>
                <label>Department</label>
                <select name="department_id" required class="input-field">
                    <option value="">-- Select Department --</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>
                            {{ $dept->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn-primary">Add Course</button>
        </form>
    </div>

    {{-- List courses --}}
    <div class="dashboard-grid" style="margin-top:2rem;">
        <div class="card" style="grid-column: span 1 / -1;">
            <h3>All Courses</h3>
            <table style="width:100%; border-collapse:collapse;">
                <thead>
                    <tr style="background:#2563eb; color:white;">
                        <th style="padding:0.5rem; border:1px solid #ccc;">Code</th>
                        <th style="padding:0.5rem; border:1px solid #ccc;">Name</th>
                        <th style="padding:0.5rem; border:1px solid #ccc;">SKS</th>
                        <th style="padding:0.5rem; border:1px solid #ccc;">Department</th>
                        <th style="padding:0.5rem; border:1px solid #ccc;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                        <tr>
                            <td style="padding:0.5rem; border:1px solid #ccc;">{{ $course->code }}</td>
                            <td style="padding:0.5rem; border:1px solid #ccc;">{{ $course->name }}</td>
                            <td style="padding:0.5rem; border:1px solid #ccc;">{{ $course->sks }}</td>
                            <td style="padding:0.5rem; border:1px solid #ccc;">
                                {{ $course->department->name ?? '-' }}
                            </td>
                            <td style="padding:0.5rem; border:1px solid #ccc;">
                                {{-- Delete --}}
                                <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-primary" style="background:#ef4444;">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="padding:0.5rem; text-align:center;">No courses available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endpush
