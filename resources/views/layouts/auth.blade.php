@extends('layouts.app')

@section('title')
@yield('title')
@endsection

@section('content')
<div class="auth-container grid place-items-center h-screen p-20">
    <div class="h-[80%] w-[80%]">
        @yield('auth-content')
    </div>
</div>
@endsection