@extends('layouts.dashboard-layout')

@section('title', 'My Class Sections')

@section('content')
<div class="dashboard-container">
    <h2 class="text-2xl font-semibold mb-4">My Class Sections</h2>

    {{-- Tombol Create --}}
    <div class="mb-4">
        <a href="{{ route('lecturer.class-sections.create') }}" class="btn-primary">Create New Class Section</a>
    </div>

    {{-- Daftar Class Sections --}}
    <div class="card overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Academic Year</th>
                    <th class="px-4 py-2">Course Code</th>
                    <th class="px-4 py-2">Course Name</th>
                    <th class="px-4 py-2">Section Code</th>
                    <th class="px-4 py-2">Capacity</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($classSections as $index => $class)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $class->academicYear->year ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $class->course->code ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $class->course->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $class->section_code ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $class->capacity ?? '-' }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('lecturer.class-sections.show', $class->id) }}" class="btn-primary">View</a>
                            {{-- Edit / Delete bisa ditambahkan --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-2 text-center text-gray-500">
                            No class sections found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
