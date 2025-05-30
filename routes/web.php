<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login.index');

Route::get('/', [DashboardController::class, 'index'])
   ->name('dashboard.index');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.index');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

Route::get('/register', function () {
    return view('register');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard.index');
