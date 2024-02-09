@extends('layouts.default')

@section('content')
    <h1>REGISTER</h1>
    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name"></label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email Address -->
        <div>
            <label for="email"></label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password"></label>
            <input type="text" id="password" name="password" value="{{ old('password') }}" autocomplete="new-password" required>
            @error('password')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit">Register</button>
    </form>

@endsection
