@extends('layouts.app')

@section('title')
@yield('title')
@endsection

@section('content')
<x-sidebar :currentPage="View::yieldContent('title')"></x-sidebar>
@yield('home-content')
@endsection

@section('script')
@endsection