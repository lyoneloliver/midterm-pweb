@extends('layouts.dashboard-layout')

@section('title', 'Create Class Section')

@section('content')
<div class="dashboard-container">
    <h2 class="text-2xl font-semibold mb-4">Create New Class Section</h2>

    <div class="card max-w-md">
        <form action="{{ route('lecturer.class-sections.store') }}" method="POST">
            @csrf

            {{-- Academic Year --}}
            <div class="mb-4">
                <label for="academic_year_id" class="block mb-1 font-medium">Academic Year</label>
                <select name="academic_year_id" id="academic_year_id" class="border p-2 rounded w-full">
                    @foreach($academicYears as $year)
                        <option value="{{ $year->id }}">{{ $year->year }}</option>
                    @endforeach
                </select>
                @error('academic_year_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Course --}}
            <div class="mb-4">
                <label for="course_id" class="block mb-1 font-medium">Course</label>
                <select name="course_id" id="course_id" class="border p-2 rounded w-full">
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->code }} - {{ $course->name }}</option>
                    @endforeach
                </select>
                @error('course_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Section Code --}}
            <div class="mb-4">
                <label for="section_code" class="block mb-1 font-medium">Section Code</label>
                <input type="text" name="section_code" id="section_code" class="border p-2 rounded w-full" value="{{ old('section_code') }}">
                @error('section_code')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Capacity --}}
            <div class="mb-4">
                <label for="capacity" class="block mb-1 font-medium">Capacity</label>
                <input type="number" name="capacity" id="capacity" class="border p-2 rounded w-full" value="{{ old('capacity', 30) }}">
                @error('capacity')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-primary">Create Class Section</button>
            <a href="{{ route('lecturer.class-sections.index') }}" class="btn-primary bg-gray-500 hover:bg-gray-600 ml-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
