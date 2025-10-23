@extends('layouts.dashboard-layout')

@section('title', 'My Schedule')

@section('content')
<div class="dashboard-container">
    <h2 class="text-2xl font-semibold mb-4">My Schedule - {{ $semester }}</h2>

    @forelse($schedule as $class)
        <div class="card mb-4">
            <h3 class="text-xl font-semibold mb-2">{{ $class['course_code'] }} - {{ $class['course_name'] }}</h3>
            <p class="mb-1"><strong>Class:</strong> {{ $class['class_name'] }}</p>
            <p class="mb-1"><strong>Lecturer:</strong> {{ $class['lecturer'] }}</p>

            @if(count($class['schedules']) > 0)
                <table class="w-full table-auto mt-2">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2">Day</th>
                            <th class="px-4 py-2">Start Time</th>
                            <th class="px-4 py-2">End Time</th>
                            <th class="px-4 py-2">Room</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($class['schedules'] as $sched)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $sched['day'] }}</td>
                            <td class="px-4 py-2">{{ $sched['start_time'] }}</td>
                            <td class="px-4 py-2">{{ $sched['end_time'] }}</td>
                            <td class="px-4 py-2">{{ $sched['room'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-500 mt-2">No schedule available for this class.</p>
            @endif
        </div>
    @empty
        <div class="card text-center">
            <p>No schedule found for this semester.</p>
        </div>
    @endforelse
</div>
@endsection
