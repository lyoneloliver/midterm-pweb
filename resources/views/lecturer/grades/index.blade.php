@extends('layouts.dashboard-layout')

@section('title', 'Grades')

@section('content')
<div class="dashboard-container">
    <h2 class="text-2xl font-semibold mb-4">Grading Scales</h2>

    {{-- Success message --}}
    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-300 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Grading table --}}
    <div class="card overflow-x-auto mb-6">
        <table class="w-full table-auto border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">Grade</th>
                    <th class="px-4 py-2 border">Min Score</th>
                    <th class="px-4 py-2 border">Max Score</th>
                    <th class="px-4 py-2 border">Grade Point</th>
                </tr>
            </thead>
            <tbody>
                @forelse($grades as $grade)
                    <tr class="border-b">
                        <td class="px-4 py-2 border">{{ $grade->grade }}</td>
                        <td class="px-4 py-2 border">{{ $grade->min_score }}</td>
                        <td class="px-4 py-2 border">{{ $grade->max_score }}</td>
                        <td class="px-4 py-2 border">{{ $grade->grade_point }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-2 text-center text-gray-500">
                            No grading scales found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Add new grading scale --}}
    <div class="card p-6">
        <h3 class="text-xl font-semibold mb-4">Add New Grade Scale</h3>

        <form action="{{ route('lecturer.grades.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="block mb-1 font-medium">Grade</label>
                    <input type="text" name="grade" value="{{ old('grade') }}"
                        class="w-full border p-2 rounded @error('grade') border-red-500 @enderror">
                    @error('grade')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium">Min Score</label>
                    <input type="number" name="min_score" value="{{ old('min_score') }}"
                        class="w-full border p-2 rounded @error('min_score') border-red-500 @enderror">
                    @error('min_score')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium">Max Score</label>
                    <input type="number" name="max_score" value="{{ old('max_score') }}"
                        class="w-full border p-2 rounded @error('max_score') border-red-500 @enderror">
                    @error('max_score')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label class="block mb-1 font-medium">Grade Point</label>
                    <input type="number" step="0.01" name="grade_point" value="{{ old('grade_point') }}"
                        class="w-full border p-2 rounded @error('grade_point') border-red-500 @enderror">
                    @error('grade_point')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn-primary">Add Grade Scale</button>
            </div>
        </form>
    </div>
</div>
@endsection
