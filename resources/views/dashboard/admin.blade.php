@extends('layouts.dashboard-layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="dashboard-container">
    <h1 class="text-2xl font-semibold mb-4">Welcome, {{ Auth::user()->name }}</h1>
    <p class="mb-6">You are logged in as <strong>Administrator</strong>.</p>

    <div class="dashboard-grid">
        <div class="card">
            <h3 class="text-lg font-semibold">Manage Users</h3>
            <p>View and manage user accounts.</p>
            <a href="{{ route('admin.users.index') }}" class="btn-primary mt-2 inline-block">Go</a>
        </div>

        <div class="card">
            <h3 class="text-lg font-semibold">Departments</h3>
            <p>Manage department data and structures.</p>
            <a href="{{ route('admin.departments.index') }}" class="btn-primary mt-2 inline-block">Go</a>
        </div>

        <div class="card">
            <h3 class="text-lg font-semibold">Courses</h3>
            <p>Manage courses, SKS, and prerequisites.</p>
            <a href="{{ route('admin.courses.index') }}" class="btn-primary mt-2 inline-block">Go</a>
        </div>

        <div class="card">
            <h3 class="text-lg font-semibold">Lecturers</h3>
            <p>Manage lecturer accounts and assignments.</p>
            <a href="{{ route('admin.lecturers.index') }}" class="btn-primary mt-2 inline-block">Go</a>
        </div>

        <div class="card">
            <h3 class="text-lg font-semibold">Students</h3>
            <p>Manage student accounts and enrollment data.</p>
            <a href="{{ route('admin.students.index') }}" class="btn-primary mt-2 inline-block">Go</a>
        </div>

        <div class="card">
            <h3 class="text-lg font-semibold">Academic Years</h3>
            <p>Set active academic year and semesters.</p>
            <a href="{{ route('admin.academic-years.index') }}" class="btn-primary mt-2 inline-block">Go</a>
        </div>

        <div class="card">
            <h3 class="text-lg font-semibold">System Settings</h3>
            <p>Adjust academic and system settings.</p>
            <a href="{{ route('admin.settings.index') }}" class="btn-primary mt-2 inline-block">Go</a>
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
