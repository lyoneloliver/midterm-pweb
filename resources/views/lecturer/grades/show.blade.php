@extends('layouts.app')

@section('title', 'Grades - ' . $classSection->course->name)

@section('content')
<div class="dashboard-container">
    <h2 class="text-2xl font-semibold mb-4">
        Grades for Class: {{ $classSection->course->name }} ({{ $classSection->section_code }})
    </h2>

    {{-- Success message --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('lecturer.grades.update', $classSection->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card overflow-x-auto">
            <table class="w-full table-auto border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">#</th>
                        <th class="px-4 py-2 border">NRP</th>
                        <th class="px-4 py-2 border">Student Name</th>
                        <th class="px-4 py-2 border">Grade</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $index => $enrollment)
                        <tr class="border-b">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $enrollment->student->NRP ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $enrollment->student->user->name ?? '-' }}</td>
                            <td class="px-4 py-2 border">
                                <select name="grades[{{ $enrollment->id }}]" class="border p-1 rounded w-full">
                                    <option value="">- Select -</option>
                                    @foreach($gradingScales as $scale)
                                        <option value="{{ $scale->grade }}"
                                            {{ $enrollment->grade == $scale->grade ? 'selected' : '' }}>
                                            {{ $scale->grade }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center text-gray-500">
                                No students enrolled in this class.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn-primary">Save Grades</button>
        </div>
    </form>
</div>
@endsection
