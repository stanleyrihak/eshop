@extends('layouts.default')

@section('content')
    <h1>LOGIN</h1>

    {{--@if(Session::has('fail'))
        <div class="failed_login">{{Session::get('fail')}}</div>
    @endif--}}
    @error('fail')
    <div class="failed_login">{{$message}}</div>
    @enderror

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email"></label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" autocomplete="email" required>
            @error('email')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="current-password"></label>
            <input type="text" id="current-password" name="password" value="{{ old('password') }}" autocomplete="current-password" required>
            @error('password')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit">Register</button>
    </form>

@endsection
