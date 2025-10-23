@extends('layouts.dashboard-layout')

@section('title', 'Courses')

@section('content')
<div class="dashboard-container">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Courses</h2>
        <button onclick="toggleForm()" class="btn-primary">Add Course</button>
    </div>

    {{-- Success message --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Add Course Form --}}
    <div id="course-form" class="card p-4 mb-6 hidden">
        <form action="{{ route('admin.courses.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1 font-medium">Course Name</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                       class="border rounded px-3 py-2 w-full @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium">Course Code</label>
                <input type="text" name="code" value="{{ old('code') }}" 
                       class="border rounded px-3 py-2 w-full @error('code') border-red-500 @enderror">
                @error('code')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium">Credit (SKS)</label>
                <input type="number" name="credit" value="{{ old('credit') }}" 
                       class="border rounded px-3 py-2 w-full @error('credit') border-red-500 @enderror">
                @error('credit')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium">Department</label>
                <select name="department_id" class="border rounded px-3 py-2 w-full @error('department_id') border-red-500 @enderror">
                    <option value="">Select Department</option>
                    @foreach($departments as $dept)
                        <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>
                            {{ $dept->name }} ({{ $dept->code }})
                        </option>
                    @endforeach
                </select>
                @error('department_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-primary">Add Course</button>
        </form>
    </div>

    {{-- Courses Table --}}
    <div class="card overflow-x-auto">
        <table class="w-full table-auto border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Code</th>
                    <th class="px-4 py-2 border">Credit</th>
                    <th class="px-4 py-2 border">Department</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $index => $course)
                    <tr class="border-b">
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>

                        {{-- Inline Edit Form --}}
                        <td class="px-4 py-2 border">
                            <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" class="flex space-x-2 items-center">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" value="{{ $course->name }}" class="border rounded px-2 py-1 w-full">
                        </td>
                        <td class="px-4 py-2 border">
                                <input type="text" name="code" value="{{ $course->code }}" class="border rounded px-2 py-1 w-full">
                        </td>
                        <td class="px-4 py-2 border">
                                <input type="number" name="credit" value="{{ $course->credit }}" class="border rounded px-2 py-1 w-full">
                        </td>
                        <td class="px-4 py-2 border">
                                <select name="department_id" class="border rounded px-2 py-1 w-full">
                                    @foreach($departments as $dept)
                                        <option value="{{ $dept->id }}" {{ $course->department_id == $dept->id ? 'selected' : '' }}>
                                            {{ $dept->name }} ({{ $dept->code }})
                                        </option>
                                    @endforeach
                                </select>
                        </td>
                        <td class="px-4 py-2 border flex space-x-2">
                                <button type="submit" class="btn-primary px-3 py-1">Update</button>
                            </form>

                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure to delete this course?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-2 text-center text-gray-500">No courses found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
<script>
    function toggleForm() {
        const form = document.getElementById('course-form');
        form.classList.toggle('hidden');
    }
</script>
@endpush
