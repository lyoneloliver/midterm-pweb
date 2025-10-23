@extends('layouts.dashboard-layout')

@section('title', 'Admin Dashboard')

@section('content')
    {{-- Pesan Selamat Datang --}}
    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-lg shadow-sm mb-6" role="alert">
        <div class="flex">
            <div class="py-1"><i class="bi bi-info-circle-fill me-3 text-2xl"></i></div>
            <div>
                <p class_=("font-bold text-lg">Welcome, {{ Auth::user()->name }}! 👋</p>
                <p class="text-sm">You are logged in as <strong>Administrator</strong>.</p>
            </div>
        </div>
    </div>

    {{-- Grid Kartu --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        {{-- Card 1: Manage Users --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center space-x-4 mb-3">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-blue-100 rounded-full">
                        <i class="bi bi-people text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Manage Users</h3>
                </div>
                <p class="text-sm text-gray-500 mb-4">View and manage user accounts.</p>
                <a href="{{ route('admin.users.index') }}" 
                   class="inline-flex items-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 transition-colors">
                    Go
                    <i class="bi bi-arrow-right-short ms-1"></i>
                </a>
            </div>
        </div>

        {{-- Card 2: Departments --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center space-x-4 mb-3">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-indigo-100 rounded-full">
                        <i class="bi bi-building text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Departments</h3>
                </div>
                <p class="text-sm text-gray-500 mb-4">Manage department data and structures.</p>
                <a href="{{ route('admin.departments.index') }}" 
                   class="inline-flex items-center text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2 transition-colors">
                    Go
                    <i class="bi bi-arrow-right-short ms-1"></i>
                </a>
            </div>
        </div>

        {{-- Card 3: Courses --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center space-x-4 mb-3">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-green-100 rounded-full">
                        <i class="bi bi-journal-bookmark text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Courses</h3>
                </div>
                <p class="text-sm text-gray-500 mb-4">Manage courses, SKS, and prerequisites.</p>
                <a href="{{ route('admin.courses.index') }}" 
                   class="inline-flex items-center text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 transition-colors">
                    Go
                    <i class="bi bi-arrow-right-short ms-1"></i>
                </a>
            </div>
        </div>

        {{-- Card 4: Lecturers --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center space-x-4 mb-3">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-red-100 rounded-full">
                        <i class="bi bi-person-video3 text-2xl text-red-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Lecturers</h3>
                </div>
                <p class="text-sm text-gray-500 mb-4">Manage lecturer accounts and assignments.</p>
                <a href="{{ route('admin.lecturers.index') }}" 
                   class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 transition-colors">
                    Go
                    <i class="bi bi-arrow-right-short ms-1"></i>
                </a>
            </div>
        </div>

        {{-- Card 5: Students --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center space-x-4 mb-3">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-red-100 rounded-full">
                        <i class="bi bi-person-badge text-2xl text-red-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Students</h3>
                </div>
                <p class="text-sm text-gray-500 mb-4">Manage student accounts and enrollment data.</p>
                <a href="{{ route('admin.students.index') }}" 
                   class="inline-flex items-center text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 transition-colors">
                    Go
                    <i class="bi bi-arrow-right-short ms-1"></i>
                </a>
            </div>
        </div>

        {{-- Card 6: Academic Years --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center space-x-4 mb-3">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-yellow-100 rounded-full">
                        <i class="bi bi-calendar-event text-2xl text-yellow-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Academic Years</h3>
                </div>
                <p class="text-sm text-gray-500 mb-4">Set active academic year and semesters.</p>
                <a href="{{ route('admin.academic-years.index') }}" 
                   class="inline-flex items-center text-white bg-yellow-600 hover:bg-yellow-700 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-2 transition-colors">
                    Go
                    <i class="bi bi-arrow-right-short ms-1"></i>
                </a>
            </div>
        </div>

        {{-- Card 7: System Settings --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center space-x-4 mb-3">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-gray-200 rounded-full">
                        <i class="bi bi-gear text-2xl text-gray-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">System Settings</h3>
                </div>
                <p class="text-sm text-gray-500 mb-4">Adjust academic and system settings.</p>
                <a href="{{ route('admin.settings.index') }}" 
                   class="inline-flex items-center text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 transition-colors">
                    Go
                    <i class="bi bi-arrow-right-short ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- 
  CATATAN: 
  Anda dapat MENGHAPUS @push('styles') dan @push('scripts') di bawah ini.
  Alasannya: File CSS dan JS Anda seharusnya sudah dimuat oleh 'dashboard-layout.blade.php'
  sehingga tidak perlu dimuat lagi di sini.
--}}
{{-- 
@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endpush 
--}}