@extends('layouts.dashboard-layout') {{-- Menggunakan layout baru --}}

@section('title', 'Student Dashboard')

@section('content')
    {{-- Pesan Selamat Datang --}}
    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded-lg shadow-sm mb-6" role="alert">
        <div class="flex">
            <div class="py-1"><i class="bi bi-info-circle-fill me-3 text-2xl"></i></div>
            <div>
                <p class="font-bold">Halo, {{ Auth::user()->name }}! 👋</p>
                <p class="text-sm">Selamat datang di FRS System. Anda login sebagai <strong>Student</strong>.</p>
            </div>
        </div>
    </div>

    {{-- Grid Kartu --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        {{-- Card 1: My Enrollment --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center space-x-4 mb-3">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-blue-100 rounded-full">
                        <i class="bi bi-journal-check text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">My Enrollment</h3>
                </div>
                <p class="text-sm text-gray-500 mb-4">Daftar atau lihat mata kuliah yang Anda ambil.</p>
                <a href="{{ route('student.enrollments.index') }}" 
                   class="inline-flex items-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 transition-colors">
                    Pergi ke KRS
                    <i class="bi bi-arrow-right-short ms-1"></i>
                </a>
            </div>
        </div>

        {{-- Card 2: My Schedule --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center space-x-4 mb-3">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-purple-100 rounded-full">
                        <i class="bi bi-calendar-week text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">My Schedule</h3>
                </div>
                <p class="text-sm text-gray-500 mb-4">Cek jadwal kelas Anda untuk semester ini.</p>
                <a href="{{ route('student.schedule.index') }}" 
                   class="inline-flex items-center text-white bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 transition-colors">
                    Lihat Jadwal
                    <i class="bi bi-arrow-right-short ms-1"></i>
                </a>
            </div>
        </div>

        {{-- Card 3: Grades & GPA --}}
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
            <div class="p-6">
                <div class="flex items-center space-x-4 mb-3">
                    <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center bg-green-100 rounded-full">
                        <i class="bi bi-bar-chart-line text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800">Grades & GPA</h3>
                </div>
                <p class="text-sm text-gray-500 mb-4">Lihat progres nilai dan IPK Anda.</p>
                <a href="{{ route('student.semester-enrollments.index') }}" 
                   class="inline-flex items-center text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 transition-colors">
                    Cek Nilai
                    <i class="bi bi-arrow-right-short ms-1"></i>
                </a>
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
