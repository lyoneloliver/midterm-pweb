@extends('layouts.dashboard-layout')

@section('title', 'Student Dashboard')

@section('content')
<div class="dashboard-container">
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>You are logged in as <strong>Student</strong>.</p>

    <div class="dashboard-grid">
        <div class="card">
            <h3>My Enrollment</h3>
            <p>Register or view your course enrollment.</p>
            <a href="{{ route('student.enrollments.index') }}" class="btn-primary">Go</a>
        </div>

        <div class="card">
            <h3>My Schedule</h3>
            <p>Check your semester class schedule.</p>
            <a href="{{ route('student.schedule.index') }}" class="btn-primary">View Schedule</a>
        </div>

        <div class="card">
            <h3>Grades & GPA</h3>
            <p>See your grades and GPA progress.</p>
            <a href="{{ route('student.semester-enrollments.index') }}" class="btn-primary">Check</a>
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
