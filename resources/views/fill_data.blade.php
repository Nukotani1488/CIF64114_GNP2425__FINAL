@extends('layouts.app')

@section('title', 'Biodata')

@section('content')
<div class="auth-container flex-col justify-center place-items-center h-screen p-20">
    <div class="auth-form-container h-[95%] w-[80%] bg-white rounded-xl border-5 border-molasses-dark p-5">
        <div class="auth-message text-center">
            <p class="text-3xl font-bold mb-4">{{ strtoupper(__('fill.head')) }}</p>
        </div>
        <form id="content-form" class="flex-col justify-center h-[60%] w-full">
            <x-form-inputs type="text" name="full_name" placeholder="{{ __('fill.name') }}"></x-form-inputs>
            <x-form-inputs type="number" name="height" placeholder="{{ __('fill.height') }}" required></x-form-inputs>
            <x-form-inputs type="number" name="weight" placeholder="{{ __('fill.weight') }}" required></x-form-inputs>
            <input type="date" name="birth_date" placeholder="{{ __('fill.birthdate') }}" required>
            <select name="sex" required>
                <option value="" disabled selected>{{ __('fill.sex') }}</option>
                <option value="male">Laki-laki</option>
                <option value="female">Perempuan</option>
            </select>
            <select name="plan" required>
                <option value="" disabled selected>{{ __('fill.plan') }}</option>
                <option value="0">Normal</option>
                <option value="1">Penurunah berat badan</option>
            </select>
            <x-form-inputs type="submit" placeholder="Submit"></x-form-inputs>
            @csrf
        </form>
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