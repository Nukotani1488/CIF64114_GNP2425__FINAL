@extends('layouts.auth')

@section('title', 'Login')

@section('auth-content')

@section('auth-message')
    <div class="auth-message text-center">
        <p class="text-3xl font-bold mb-4">{{ strtoupper(__('auth.welcome')) }}</p>
    </div>
@endsection

@section('auth-content')
    <form id="content-form" class="flex-col justify-center h-[60%] w-full">
        <x-form-inputs type="text" name="name" placeholder="{{ __('auth.username_or_email') }}"></x-form-inputs>
        <x-form-inputs type="password" name="password" placeholder="{{ __('auth.password') }}"></x-form-inputs>
        <x-form-inputs type="submit" placeholder="{{ strtoupper(__('auth.login')) }}" style="display:block; height:10%; width:80%;"></x-form-inputs> 
        @csrf
    </form>
    <p>{{ __('auth.account_does_not_exist') }} <a href='{{ route('register') }}'>{{ __('auth.register') }}</a></p>
@endsection