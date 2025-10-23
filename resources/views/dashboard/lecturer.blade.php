@extends('layouts.dashboard-layout')

@section('title', 'Lecturer Dashboard')

@section('content')
<div class="dashboard-container">
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>You are logged in as <strong>Lecturer</strong>.</p>

    <div class="dashboard-grid">
        <div class="card">
            <h3>Your Classes</h3>
            <p>Total classes you are teaching: <strong>{{ $class_count }}</strong></p>
            <a href="{{ route('lecturer.class-sections.index') }}" class="btn-primary">View Classes</a>
        </div>

        <div class="card">
            <h3>Attendance</h3>
            <p>Record and monitor student attendance.</p>
            <a href="{{ route('lecturer.attendance.index') }}" class="btn-primary">Go</a>
        </div>

        <div class="card">
            <h3>Grades</h3>
            <p>Manage student grades for your classes.</p>
            <a href="{{ route('lecturer.grades.index') }}" class="btn-primary">Go</a>
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
