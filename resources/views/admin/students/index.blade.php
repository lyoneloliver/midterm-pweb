@extends('layouts.dashboard-layout')

@section('title', 'Manage Students')

@section('content')
<div class="dashboard-container">
    <h1 class="text-2xl font-semibold mb-4">Students Management</h1>

    {{-- Tabel daftar students --}}
    <div class="card overflow-x-auto mb-6">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">NRP</th>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $index => $student)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $student->NRP ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $student->user->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $student->user->email ?? '-' }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-primary bg-red-500 hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 text-center text-gray-500">
                            No students registered yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Form tambah student --}}
    <div class="card">
        <h3 class="text-xl font-semibold mb-2">Add New Student</h3>
        <form action="{{ route('admin.students.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block mb-1 font-medium">Name</label>
                    <input type="text" name="name" id="name" class="border p-2 rounded w-full" value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block mb-1 font-medium">Email</label>
                    <input type="email" name="email" id="email" class="border p-2 rounded w-full" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block mb-1 font-medium">Password</label>
                    <input type="password" name="password" id="password" class="border p-2 rounded w-full">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="nrp" class="block mb-1 font-medium">NRP</label>
                    <input type="text" name="nrp" id="nrp" class="border p-2 rounded w-full" value="{{ old('nrp') }}">
                    @error('nrp')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn-primary mt-4">Add Student</button>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endpush