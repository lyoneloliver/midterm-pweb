@extends('layouts.auth-layout')

@section('title', 'Login') {{-- Changed --}}

@section('content')

    {{-- Display Validation Errors (if any) --}}
    @if ($errors->any())
        <div class="alert alert-error" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    {{-- Display Success Message (e.g., after registration) --}}
    @if (session('success'))
         <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.perform') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email Address</label> {{-- Changed --}}
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                   placeholder="name@example.com"> {{-- Changed --}}
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required
                   placeholder="••••••••">
        </div>

        <button type="submit" class="btn-primary">Login</button>

        <div class="auth-links">
             {{-- Changed --}}
            <a href="{{ route('register') }}">Don't have an account? Register</a>
        </div>
    </form>
@endsection