<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FoodController;

Route::get('/', function () {
    return view('index');
});

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('register.post');
});

Route::controller(DashboardController::class)
    ->middleware('auth')
    ->name('dashboard')
    ->group(function () {
        Route::get('/dashboard', 'show')->name('.index');
});

Route::controller(UserDataController::class)
    ->middleware('auth')
    ->name('userdata')
    ->group(function () {
        Route::post('/fill_data', 'fill_data')->name('.fill.post');
        Route::get('/fill_data', 'showFillData')->name('.fill');
});

Route::controller(RecordController::class)
    ->middleware('auth')
    ->name('record')
    ->group(function () {
        Route::post('/insert_record', 'insert')->name('.insert');
});

Route::controller(StatisticController::class)
    ->middleware('auth')
    ->name('stats')
    ->group(function() {
        Route::get('/stats', 'show')->name('.index');
});

Route::controller(ProfileController::class)
    ->middleware('auth')
    ->name('profile')
    ->group(function() {
        Route::get('/profile', 'show')->name('.index');
});

Route::controller(FoodController::class)
    ->name('food')
    ->group(function() {
        Route::post('/food_search', 'search')->name('.search');
});