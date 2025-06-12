@extends('layouts.app')
@section('title', 'Jagagula')
@section('content')
        <div class="index-container grid place-items-center h-screen p-20">
            <p class="font-inter font-bold text-9xl">JAGAGULA</p>
            <x-button height="145" width="750" route="login" text-size="72" text="auth.login"></x-button>
        </div>
@endsection