@extends('layouts.dashboard-layout')

@section('title', 'Add User')

@section('content')
<div class="dashboard-container">
    <h2 class="text-2xl font-semibold mb-4">Add New User</h2>

    <form action="{{ route('admin.users.store') }}" method="POST" class="card space-y-4 p-6">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" 
                   class="border rounded px-3 py-2 w-full @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" 
                   class="border rounded px-3 py-2 w-full @error('email') border-red-500 @enderror">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Password</label>
            <input type="password" name="password" 
                   class="border rounded px-3 py-2 w-full @error('password') border-red-500 @enderror">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Role</label>
            <select name="role" class="border rounded px-3 py-2 w-full @error('role') border-red-500 @enderror">
                <option value="">- Select Role -</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="lecturer" {{ old('role') == 'lecturer' ? 'selected' : '' }}>Lecturer</option>
                <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
            </select>
            @error('role')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit" class="btn-primary">Add User</button>
            <a href="{{ route('admin.users.index') }}" class="ml-2 btn-primary bg-gray-500 hover:bg-gray-600">Cancel</a>
        </div>
    </form>
</div>
@endsection
