<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;
// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Posts Routes (Protected by Auth)
Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account.index');
    Route::post('/account', [AccountController::class, 'update'])->name('account.update');
});
