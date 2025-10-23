@extends('layouts.dashboard-layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="dashboard-container">
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>You are logged in as <strong>Administrator</strong>.</p>

    <div class="dashboard-grid">
        {{-- Students Card --}}
        <div class="card">
            <h3>Students</h3>
            <p>Total registered students: <strong>{{ $student_count }}</strong></p>
            <a href="{{ route('admin.students.index') }}" class="btn-primary">Manage Students</a>
        </div>

        {{-- Lecturers Card --}}
        <div class="card">
            <h3>Lecturers</h3>
            <p>Total lecturers: <strong>{{ $lecturer_count }}</strong></p>
            <a href="{{ route('admin.lecturers.index') }}" class="btn-primary">Manage Lecturers</a>
        </div>

        {{-- Courses Card --}}
        <div class="card">
            <h3>Courses</h3>
            <p>Total courses: <strong>{{ $course_count }}</strong></p>
            <a href="{{ route('admin.courses.index') }}" class="btn-primary">Manage Courses</a>
        </div>

        {{-- Departments Card --}}
        <div class="card">
            <h3>Departments</h3>
            <p>Total departments: <strong>{{ $department_count }}</strong></p>
            <a href="{{ route('admin.departments.index') }}" class="btn-primary">Manage Departments</a>
        </div>

        {{-- Academic Years --}}
        <div class="card">
            <h3>Academic Years</h3>
            <p>Manage academic years and active semester.</p>
            <a href="{{ route('admin.academic-years.index') }}" class="btn-primary">Go</a>
        </div>

        {{-- System Settings --}}
        <div class="card">
            <h3>System Settings</h3>
            <p>Configure general system settings.</p>
            <a href="{{ route('admin.settings.index') }}" class="btn-primary">Go</a>
        </div>

        <div class="card">
            <h3>User</h3>
            <p>Manage system users.</p>
            <a href="{{ route('admin.users.index') }}" class="btn-primary">Manage Users</a>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endpush
