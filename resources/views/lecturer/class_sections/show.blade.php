@extends('layouts.dashboard-layout')

@section('title', 'Class Section Detail')

@section('content')
<div class="dashboard-container">
    <h2 class="text-2xl font-semibold mb-4">Class Section Detail</h2>

    <div class="card mb-6">
        <h3 class="text-xl font-semibold mb-2">{{ $classSection->course->name ?? '-' }} ({{ $classSection->course->code ?? '-' }})</h3>
        <p><strong>Section Code:</strong> {{ $classSection->section_code ?? '-' }}</p>
        <p><strong>Lecturer:</strong> {{ $classSection->lecturer->user->name ?? '-' }}</p>
        <p><strong>Capacity:</strong> {{ $classSection->capacity }}</p>
        <p><strong>Day:</strong> {{ $classSection->day ?? '-' }}</p>
        <p><strong>Time:</strong> {{ $classSection->start_time ?? '-' }} - {{ $classSection->end_time ?? '-' }}</p>
        <p><strong>Room:</strong> {{ $classSection->room ?? '-' }}</p>
        <p><strong>Academic Year:</strong> {{ $classSection->academicYear->year ?? '-' }}</p>
    </div>

    <a href="{{ route('lecturer.class-sections.index') }}" class="btn-primary">Back to Class Sections</a>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endpush