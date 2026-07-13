<?php

use Illuminate\Support\Facades\Route;

// 1. Landing Page
Route::get('/', function () {
    return view('landing');
})->name('landing');

// 2. Halaman Login
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    // Handling Login Controller
})->name('login.post');

// 3. Halaman Registrasi
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', function () {
    // Handling Register Controller
})->name('register.post');