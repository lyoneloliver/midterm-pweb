@extends('layouts.dashboard-layout')

@section('title', 'Lecturers Management')

@section('content')
<div class="dashboard-container">
    <h1>Lecturers</h1>

    {{-- Button tambah dosen --}}
    <button class="btn-primary" data-modal-toggle="addLecturerModal">Add Lecturer</button>

    {{-- Table daftar dosen --}}
    <div class="mt-4 overflow-x-auto">
        <table class="min-w-full border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">NIP</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($lecturers as $lecturer)
                <tr>
                    <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">{{ $lecturer->user->name }}</td>
                    <td class="px-4 py-2 border">{{ $lecturer->user->email }}</td>
                    <td class="px-4 py-2 border">{{ $lecturer->nip }}</td>
                    <td class="px-4 py-2 border">
                        <form method="POST" action="{{ route('admin.lecturers.destroy', $lecturer->id) }}" onsubmit="return confirm('Delete this lecturer?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-primary bg-red-500 hover:bg-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-2 border text-center">No lecturers found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Modal Add Lecturer --}}
<div id="addLecturerModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white rounded-lg w-96 p-6">
        <h2 class="text-xl font-semibold mb-4">Add Lecturer</h2>
        <form method="POST" action="{{ route('admin.lecturers.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="block mb-1">Name</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-3">
                <label for="email" class="block mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-3">
                <label for="password" class="block mb-1">Password</label>
                <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="mb-3">
                <label for="nip" class="block mb-1">NIP</label>
                <input type="text" name="nip" class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" class="btn-primary bg-gray-400 hover:bg-gray-500" data-modal-toggle="addLecturerModal">Cancel</button>
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
