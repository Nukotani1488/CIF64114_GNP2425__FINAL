@extends('layouts.app')

@section('title')
@yield('title')
@endsection

@section('content')
<div class="auth-container flex-col justify-center place-items-center h-screen p-20">
    <div class="auth-form-container h-[95%] w-[80%] bg-white rounded-xl border-5 border-molasses-dark p-5">
        @yield('auth-message')
        @yield('auth-content')
    </div>
</div>
@endsection