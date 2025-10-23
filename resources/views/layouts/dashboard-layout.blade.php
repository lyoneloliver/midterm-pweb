<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | FRS System</title>

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    {{-- Tambahan style per-page --}}
    @stack('styles')
</head>
<body class="bg-gray-100 flex min-h-screen text-gray-900">

    {{-- Sidebar --}}
    @include('layouts.sidebar')

    {{-- Main content --}}
    <div class="flex-1 flex flex-col">
        {{-- Header --}}
        <header class="bg-white shadow p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold">@yield('title')</h1>

            <div class="flex items-center space-x-4">
                <span>👋 {{ Auth::user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                        Logout
                    </button>
                </form>
            </div>
        </header>

        {{-- Page content --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    {{-- Custom JS --}}
    <script src="{{ asset('js/dashboard.js') }}"></script>

    {{-- Tambahan script per-page --}}
    @stack('scripts')
</body>
</html>
