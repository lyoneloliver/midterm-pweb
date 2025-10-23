<!DOCTYPE html>
<html lang="id" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | FRS System</title>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Hapus @push('styles') karena CSS utama sudah di-load oleh Vite --}}
    @stack('styles')
</head>
<body class="app-body"> <div class="flex h-screen overflow-hidden">
        
        @include('layouts.sidebar')

        <div id="sidebar-backdrop" class="fixed inset-0 z-20 bg-black bg-opacity-50 hidden md:hidden"></div>

        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            
            <header class="sticky top-0 z-30 bg-white-900 border-b border-white-700 shadow-sm">
                <div class="container-fluid mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
            
                        <div class="flex items-center">
                            <button id="sidebar-toggler" class="text-gray-400 hover:text-white md:hidden me-3" aria-controls="sidebar">
                                <span class="sr-only">Buka sidebar</span>
                                <i class="bi bi-list text-2xl"></i>
                            </button>
            
                            <h1 class="text-xl font-semibold text-white">@yield('title')</h1>
                        </div>
            
                        <div class="flex items-center space-x-4">
                            @auth
                                <div class="text-black-300 text-sm hidden sm:block">
                                    <i class="bi bi-person-circle me-1"></i>
                                    {{ Auth::user()->name }}
                                    <small class="text-gray-500">({{ ucfirst(Auth::user()->role) }})</small>
                                </div>
            
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="flex items-center text-black-400 hover:text-white hover:bg-gray-700 px-3 py-1.5 rounded-lg text-sm font-medium">
                                        <i class="bi bi-box-arrow-right me-1.5"></i>
                                        <span class="hidden sm:inline">Logout</span>
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>
            
            <main class="flex-1">
                {{-- Padding utama untuk konten halaman --}}
                <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-7xl mx-auto">
                    @yield('content')
                </div>
            </main>
            
        </div>
    </div>

    {{-- Hapus @push('scripts') karena JS utama sudah di-load oleh Vite --}}
    @stack('scripts')
</body>
</html>