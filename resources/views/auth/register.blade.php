@extends('layouts.auth-layout')

@section('title', 'Register')

@section('content')
<form method="POST" action="{{ route('register.perform') }}">
    @csrf

    <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" required>
    </div>

    <div class="form-group">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <button type="submit" class="btn-primary">Register</button>

    <div class="auth-links">
        <a href="{{ route('login') }}">Already have an account?</a>
    </div>
</form>
@endsection
