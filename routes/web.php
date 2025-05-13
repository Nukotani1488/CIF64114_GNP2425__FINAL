<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecordController;

Route::get('/', function () {
    return view('index');
});

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login.get');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/register', 'showRegister')->name('register.get');
    Route::post('/register', 'register')->name('register.post');
});

Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'show')->name('dashboard.index');
})->middleware('auth')->name('dashboard');

Route::controller(UserDataController::class)->group(function () {
    Route::post('/fill_data', 'fill_data')->name('userdata.fill.post');
    Route::get('/fill_data', 'showFillData')->name('userdata.fill.get');
})->middleware('auth')->name('userdata');

Route::controller(RecordController::class)->group(function () {
    Route::post('/insert_record', 'insert')->name('record.insert');
})->middleware('auth')->name('record');
