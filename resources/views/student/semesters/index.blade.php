@extends('layouts.dashboard-layout')

@section('title', 'My Semester Enrollments')

@section('content')
<div class="dashboard-container">
    <h2 class="text-2xl font-semibold mb-4">My Semester Enrollments</h2>

    <div class="card overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Academic Year</th>
                    <th class="px-4 py-2">Total Credits</th>
                    <th class="px-4 py-2">GPA / IP</th>
                    <th class="px-4 py-2">Approved By</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($semesters ?? [] as $index => $semester)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $semester->academicYear->year ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $semester->total_sks ?? 0 }}</td>
                        <td class="px-4 py-2">{{ $semester->total_gpa ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $semester->approved_by ? $semester->approver->name : '-' }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('student.semester-enrollments.show', $semester->id) }}" class="btn-primary">View</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-2 text-center text-gray-500">
                            No semester enrollment data found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
