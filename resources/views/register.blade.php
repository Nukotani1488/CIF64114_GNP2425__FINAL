@extends('layouts.auth')

@section('title', 'Register')

@section('auth-content')

@section('auth-message')
    <div class="auth-message text-center">
        <p class="text-3xl font-bold mb-4">{{ strtoupper(__('auth.create')) }}</p>
    </div>
@endsection

@section('auth-content')
    <form id="login-form" class="flex-col justify-center h-[60%] w-full" method="post" action="{{ route('login.post') }}">
        <x-form-inputs type="text" name="username" placeholder="{{ __('auth.username') }}"></x-form-inputs>
        <x-form-inputs type="email" name="username" placeholder="{{ __('auth.email') }}"></x-form-inputs>
        <x-form-inputs type="password" name="password" placeholder="{{ __('auth.password') }}"></x-form-inputs>
        <x-form-inputs type="password" name="password" placeholder="{{ __('auth.confirm_password') }}"></x-form-inputs>
        <x-form-inputs type="submit" placeholder="{{ strtoupper(__('auth.register')) }}" style="display:block; height:10%; width:80%;"></x-form-inputs> 
        @csrf
    </form>
    <p>{{ __('auth.account_exists') }} <a href='{{ route('login') }}'>{{ __('auth.login') }}</a></p>
@endsection