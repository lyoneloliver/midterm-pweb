<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FRS System')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body class="auth-container"> <div class="auth-box">

        <div class="auth-header">
<img src="{{ asset('image/logo.png') }}" alt="FRS System Logo" class="auth-logo">
            <h1 class="auth-title">Study Plan Registration</h1>
            <p class="auth-subtitle">Welcome Back!</p>
        </div>

        @yield('content')

    </div>

</body>
</html>