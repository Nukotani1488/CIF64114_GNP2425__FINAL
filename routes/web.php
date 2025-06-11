<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\StatisticController;

use App\Http\Middleware\RequireJson;
use App\Http\Middleware\RequireRawForm;

Route::get('/', function () {
    return view('index');
});

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::get('/register', 'showRegister')->name('register');
    Route::middleware(RequireRawForm::class)->group(function () {
        Route::post('/login', 'login')->name('login.post');
        Route::post('/register', 'register')->name('register.post');
    });
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
        Route::get('/fill_data', 'showFillData')->name('.fill');
        Route::post('/fill_data', 'fill_data')
            ->middleware(RequireRawForm::class)->name('.fill.post');
});

Route::controller(RecordController::class)
    ->middleware(['auth', RequireRawForm::class])
    ->name('record')
    ->group(function () {
        Route::post('/insert_record', 'insert')->name('.insert');
});

Route::controller(StatisticController::class)
    ->middleware('auth')
    ->name('statistic')
    ->prefix('/statistic')
    ->group(function () {
        Route::get('/today_consumption', 'getTodayConsumption')
            ->middleware(RequireRawForm::class)->name('.today_consumption');
});