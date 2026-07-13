<?php

use Illuminate\Support\Facades\Route;

// 1. Landing Page (Halaman Utama saat web dibuka pertama kali)
Route::get('/', function () {
    return view('landing');
})->name('landing');

// 2. Halaman Login (Diakses lewat tombol Masuk/Registrasi)
Route::get('/login', function () {
    return view('login');
})->name('login');

// 3. Dummy Route POST Login (biar form submit tidak error)
Route::post('/login', function () {
    // Nanti dihubungkan ke LoginController
})->name('login.post');