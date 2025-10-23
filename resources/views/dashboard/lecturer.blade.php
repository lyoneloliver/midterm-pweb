@extends('layouts.dashboard-layout')

@section('title', 'Lecturer Dashboard')

@section('content')
<div class="dashboard-container">
    <h1>Hello, {{ Auth::user()->name }}</h1>
    <p>You are logged in as <strong>Lecturer</strong>.</p>

    <div class="dashboard-grid">
        <div class="card">
            <h3>Your Classes</h3>
            <p>Manage your teaching classes and schedules.</p>
            <a href="{{ route('lecturer.class-sections.index') }}" class="btn-primary">View Classes</a>
        </div>

        <div class="card">
            <h3>Attendance</h3>
            <p>Track and update student attendance records.</p>
            <a href="{{ route('lecturer.attendance.index') }}" class="btn-primary">Open</a>
        </div>

        <div class="card">
            <h3>Grades</h3>
            <p>Submit and manage student grades.</p>
            <a href="{{ route('lecturer.grades.index') }}" class="btn-primary">Enter Grades</a>
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
