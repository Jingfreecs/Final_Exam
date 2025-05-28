<?php

use App\Http\Controllers\AuthCortroller;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login.index');

Route::get('/', [DashboardController::class, 'index'])
   ->name('dashboard.index');

Route::get('/register', [AuthCortroller::class,'showRegistrationForm'])->name('register');

