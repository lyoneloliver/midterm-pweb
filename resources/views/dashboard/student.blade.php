@extends('layouts.dashboard-layout')

@section('title', 'Student Dashboard')

@section('content')
<div class="dashboard-container">
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>You are logged in as <strong>Student</strong>.</p>

    <div class="dashboard-grid">
        {{-- Current Semester --}}
        @if($semester)
        <div class="card">
            <h3>Current Semester</h3>
            <p>{{ $semester->academicYear->year ?? '-' }} - {{ $semester->semester_type ?? '-' }}</p>
        </div>
        @endif

        {{-- Total Enrollments --}}
        <div class="card">
            <h3>Enrollments</h3>
            <p>Total classes this semester: <strong>{{ $enrollment_count }}</strong></p>
            <a href="{{ route('student.enrollments.index') }}" class="btn-primary">View Enrollments</a>
        </div>

        {{-- Schedule --}}
        <div class="card">
            <h3>My Schedule</h3>
            <p>View your current semester schedule.</p>
            <a href="{{ route('student.schedule.index') }}" class="btn-primary">View Schedule</a>
        </div>

        {{-- Semester History --}}
        <div class="card">
            <h3>Grades / History</h3>
            <p>View grades of previous semesters.</p>
            <a href="{{ route('student.semester-enrollments.index') }}" class="btn-primary">View Grades</a>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endpush
