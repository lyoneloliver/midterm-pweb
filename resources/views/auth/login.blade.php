@extends('layouts.auth-layout')

@section('title', 'Login')

@section('content')
<form method="POST" action="{{ route('login.perform') }}">
    @csrf

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" required>
    </div>

    <button type="submit" class="btn-primary">Login</button>

    <div class="auth-links">
        <a href="{{ route('register') }}">Don't have an account? Register</a>
    </div>
</form>
@endsection
