<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// When somebody opens the main page, I send them to the login page.
Route::redirect('/', '/login');

// These routes are only for visitors who are not logged in yet.
Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.store');

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');
});

// The auth middleware protects these routes.
// If a user is not logged in, Laravel will not allow access to the dashboard.
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
