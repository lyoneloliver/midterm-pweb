@extends('layouts.dashboard-layout')

@section('title', 'Attendance - ' . ($classSection->course->name ?? ''))

@section('content')
<div class="dashboard-container">
    <h2 class="text-2xl font-semibold mb-4">
        Attendance - {{ $classSection->course->code ?? '-' }} {{ $classSection->section_code ?? '' }}
    </h2>

    <div class="mb-4">
        <p><strong>Date:</strong> {{ $today }}</p>
        <p><strong>Academic Year:</strong> {{ $classSection->academicYear->year ?? '-' }}</p>
        <p><strong>Lecturer:</strong> {{ $classSection->lecturer->user->name ?? '-' }}</p>
    </div>

    <form action="{{ route('lecturer.attendance.store', $classSection->id) }}" method="POST">
        @csrf
        <div class="card overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Student NRP</th>
                        <th class="px-4 py-2">Student Name</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $index => $enrollment)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $enrollment->student->NRP ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $enrollment->student->user->name ?? '-' }}</td>
                            <td class="px-4 py-2">
                                <select name="attendance[{{ $enrollment->id }}]" class="border p-2 rounded">
                                    <option value="present" {{ (isset($attendances[$enrollment->id]) && $attendances[$enrollment->id] == 'present') ? 'selected' : '' }}>Present</option>
                                    <option value="absent" {{ (isset($attendances[$enrollment->id]) && $attendances[$enrollment->id] == 'absent') ? 'selected' : '' }}>Absent</option>
                                    <option value="late" {{ (isset($attendances[$enrollment->id]) && $attendances[$enrollment->id] == 'late') ? 'selected' : '' }}>Late</option>
                                </select>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center text-gray-500">
                                No students enrolled in this class section.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn-primary">Save Attendance</button>
            <a href="{{ route('lecturer.attendance.index') }}" class="btn-primary ml-2">Back</a>
        </div>
    </form>
</div>
@endsection
