<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;

Route::get('/', fn () => redirect()->route('dosens.index'));
Route::resource('dosens', DosenController::class);
Route::resource('mata_kuliah', MataKuliahController::class);

// Dashboard
Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

// If you want a static welcome page at /welcome, uncomment the line below
// Route::view('/welcome', 'welcome');
