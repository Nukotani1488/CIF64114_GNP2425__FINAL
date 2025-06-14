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
    <x-alert></x-alert>
</div>
@endsection

@section('script')
<script type="module">
    function successCallback(message) {
        console.log(message);
        $('.alert').css('display', 'block');
        $('.alert-content').html(message.message);
        window.location.replace(message.redirect);
    }

    function errorCallback(message) {
        $('.alert').css('display', 'block');
        $('.alert-content').html(message.responseJSON.message);
    }

    $('#content-form').on('submit', function(e) {
        e.preventDefault();
        sendForm($(this), "{{ route(Route::currentRouteName()) }}", successCallback, errorCallback);
    })
</script>
@endsection