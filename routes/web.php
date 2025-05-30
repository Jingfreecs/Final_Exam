<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CurrencyConverterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('pages.auth.login');
})->name('login.index');

Route::post('/login', [LoginController::class, 'login'])->name('login.store');


Route::get('/register', function(){
    return view('pages.auth.register');
});

Route::post('/register', [UserController::class, 'store'])
    ->name('user.store');

Route::controller(CurrencyConverterController::class)->prefix('currency-converter')->group(function () {
    Route::view('/', 'currencyConverter.index')->name('dashboard.index');
    Route::get('exchange-rate', 'fetchExchangeRate');
    Route::get('sse',  'sse');

});

