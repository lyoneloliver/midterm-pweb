@extends('layouts.dashboard-layout')

@section('title', 'My Enrollments')

@section('content')
<div class="dashboard-container">
    <h2 class="text-2xl font-semibold mb-4">My Enrollments - {{ $academicYear->year ?? '-' }}</h2>

    {{-- Daftar enrollments --}}
    <div class="card overflow-x-auto mb-6">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Course Code</th>
                    <th class="px-4 py-2">Course Name</th>
                    <th class="px-4 py-2">Class Section</th>
                    <th class="px-4 py-2">Lecturer</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($enrollments as $index => $enrollment)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $enrollment->classSection->course->code ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $enrollment->classSection->course->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $enrollment->classSection->section_code ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $enrollment->classSection->lecturer->user->name ?? '-' }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('student.enrollments.destroy', $enrollment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this enrollment?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-primary bg-red-500 hover:bg-red-600">Remove</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-2 text-center text-gray-500">
                            You have not enrolled in any class yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Form enroll kelas baru --}}
    <div class="card">
        <h3 class="text-xl font-semibold mb-2">Enroll New Class</h3>
        <form action="{{ route('student.enrollments.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="class_section_id" class="block mb-1 font-medium">Select Class:</label>
                <select name="class_section_id" id="class_section_id" class="border p-2 rounded w-full">
                    @foreach($availableClasses as $class)
                        <option value="{{ $class->id }}">
                            {{ $class->course->code ?? '-' }} - {{ $class->course->name ?? '-' }} ({{ $class->section_code ?? '-' }})
                        </option>
                    @endforeach
                </select>
                @error('class_section_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn-primary">Enroll Class</button>
        </form>
    </div>
</div>
@endsection
