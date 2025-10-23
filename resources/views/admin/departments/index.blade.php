@extends('layouts.dashboard-layout')

@section('title', 'Departments')

@section('content')
<div class="dashboard-container">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Departments</h2>
        <button onclick="toggleForm()" class="btn-primary">Add Department</button>
    </div>

    {{-- Success message --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Add Department Form --}}
    <div id="department-form" class="card p-4 mb-6 hidden">
        <form action="{{ route('admin.departments.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1 font-medium">Department Name</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                       class="border rounded px-3 py-2 w-full @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium">Department Code</label>
                <input type="text" name="code" value="{{ old('code') }}" 
                       class="border rounded px-3 py-2 w-full @error('code') border-red-500 @enderror">
                @error('code')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn-primary">Add</button>
        </form>
    </div>

    {{-- Departments Table --}}
    <div class="card overflow-x-auto">
        <table class="w-full table-auto border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Code</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($departments as $index => $department)
                    <tr class="border-b">
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>

                        {{-- Inline Edit Form --}}
                        <td class="px-4 py-2 border">
                            <form action="{{ route('admin.departments.update', $department->id) }}" method="POST" class="flex space-x-2 items-center">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" value="{{ $department->name }}" class="border rounded px-2 py-1 w-full">
                        </td>
                        <td class="px-4 py-2 border">
                                <input type="text" name="code" value="{{ $department->code }}" class="border rounded px-2 py-1 w-full">
                        </td>
                        <td class="px-4 py-2 border flex space-x-2">
                                <button type="submit" class="btn-primary px-3 py-1">Update</button>
                            </form>

                            <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure to delete this department?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-center text-gray-500">No departments found.</td>
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
        const form = document.getElementById('department-form');
        form.classList.toggle('hidden');
    }
</script>
@endpush
