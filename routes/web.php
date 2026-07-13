<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\PengembalianController;

/*
|--------------------------------------------------------------------------
| Web Routes - BACALOKA Perpustakaan Digital
|--------------------------------------------------------------------------
*/

// ==========================================
// 1. PUBLIC / GUEST ROUTES
// ==========================================

// Landing Page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Authentication Routes
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
// 2. PROTECTED ADMIN ROUTES (Role: Admin)
// ==========================================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Admin
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // CRUD Kelola Data Buku
    Route::resource('buku', BukuController::class);

    // Pendaftaran Anggota & Status Keanggotaan
    Route::resource('anggota', AnggotaController::class);

    // Manajemen Pengembalian & Histori
    Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');
    Route::get('/pengembalian/{id}', [PengembalianController::class, 'show'])->name('pengembalian.show');
    Route::post('/pengembalian/{id}', [PengembalianController::class, 'store'])->name('pengembalian.store');
});


// ==========================================
// 3. PROTECTED USER ROUTES (Role: Anggota)
// ==========================================
Route::middleware(['auth', 'role:anggota'])->prefix('user')->name('user.')->group(function () {
    
    // Dashboard User (Akan dikerjakan setelah ini)
    Route::get('/dashboard', function () {
        return "Dashboard User (Akan dikerjakan sekarang)";
    })->name('dashboard');

});