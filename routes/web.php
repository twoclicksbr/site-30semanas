<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/home', function () { return view('home'); })->name('home');

Route::get('/video', [VideoController::class, 'index'])->name('videos.index');

Route::get('/login', function () { return view('login'); });
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/login', [AuthController::class, 'authenticate'])->name('login.process');

// Route::get('/config', [ConfigController::class, 'index'])->name('config.index');
// Route::post('/config/save', [ConfigController::class, 'save'])->name('config.save');