<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', function () {
    return "Halaman Beranda";
});

Route::get('/salam', function () {
    return "Selamat Datang Ayuu di Laravel 11";
});

Route::get('/profile', function () {
    return "Halaman Profile";
});


// Praktikum Laravel 2
Route::get('/dashboard', [AdminController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/about', [ContactController::class, 'index']);