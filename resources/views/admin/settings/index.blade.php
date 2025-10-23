@extends('layouts.dashboard-layout')

@section('title', 'System Settings')

@section('content')
<div class="dashboard-container">
    <h1>System Settings</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        <div class="space-y-4">
            @foreach($settings as $setting)
                <div class="card flex flex-col">
                    <label for="{{ $setting->key }}" class="font-semibold mb-2">{{ ucwords(str_replace('_', ' ', $setting->key)) }}</label>
                    <input type="text" name="{{ $setting->key }}" id="{{ $setting->key }}"
                           value="{{ old($setting->key, $setting->value) }}"
                           class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @if($setting->description)
                        <small class="text-gray-500 mt-1">{{ $setting->description }}</small>
                    @endif
                </div>
            @endforeach

            <div>
                <button type="submit" class="btn-primary bg-blue-600 hover:bg-blue-700">
                    Update Settings
                </button>
            </div>
        </div>
    </form>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endpush
