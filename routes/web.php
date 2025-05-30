<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login.index');

Route::get('/', [DashboardController::class, 'index'])
   ->name('dashboard.index');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.index');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/register', function () {
    return view('register');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
});
