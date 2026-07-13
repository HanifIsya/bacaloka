<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

// 1. Guest Routes
Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 2. Protected Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

// 3. Protected User Routes (Nanti dikerjakan setelah Admin selesai)
Route::middleware(['auth', 'role:anggota'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', function () {
        return "Dashboard User (Halaman ini akan dibuat setelah seluruh fitur admin selesai)";
    })->name('dashboard');
});