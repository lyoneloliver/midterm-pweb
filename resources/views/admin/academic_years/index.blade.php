@extends('layouts.dashboard-layout')

@section('title', 'Academic Years')

@section('content')
<div class="dashboard-container">
    <h1>Academic Years</h1>

    {{-- Button tambah academic year --}}
    <button class="btn-primary" data-modal-toggle="addYearModal">Add Academic Year</button>

    {{-- Table daftar academic year --}}
    <div class="mt-4 overflow-x-auto">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Year</th>
                    <th class="px-4 py-2 border">Status</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($academicYears as $year)
                <tr>
                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $year->year }}</td>
                    <td class="px-4 py-2 border">
                        @if($year->is_active)
                            <span class="text-green-600 font-semibold">Active</span>
                        @else
                            <span class="text-gray-500">Inactive</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border">
                        @if(!$year->is_active)
                        <form method="POST" action="{{ route('admin.academic-years.activate', $year->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn-primary bg-blue-600 hover:bg-blue-700">Activate</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-4 py-2 border text-center">No academic years found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Add Academic Year --}}
<div id="addYearModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg w-96 p-6">
        <h2 class="text-xl font-semibold mb-4">Add Academic Year</h2>
        <form method="POST" action="{{ route('admin.academic-years.store') }}">
            @csrf
            <div class="mb-3">
                <label for="year" class="block mb-1">Year</label>
                <input type="text" name="year" class="w-full border rounded px-3 py-2" placeholder="2025 - Ganjil" required>
            </div>

            <div class="mb-3 flex items-center space-x-2">
                <input type="checkbox" name="is_active" id="is_active">
                <label for="is_active" class="block">Set as active</label>
            </div>

            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" class="btn-primary bg-gray-400 hover:bg-gray-500" data-modal-toggle="addYearModal">Cancel</button>
                <button type="submit" class="btn-primary bg-blue-600 hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@push('scripts')
<script>
    // Toggle modal
    document.querySelectorAll('[data-modal-toggle]').forEach(btn => {
        btn.addEventListener('click', function() {
            const modalId = this.getAttribute('data-modal-toggle');
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        });
    });
</script>
@endpush
