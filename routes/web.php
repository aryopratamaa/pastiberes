<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\DasborController;
use app\Http\Controllers\TipeLayananController;
use app\Http\Controllers\BengkelController;
use app\Http\Controllers\UserController;
use app\Http\Controllers\PromoController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get("/", [DasborController::class,"index"])->name('dashboard');

Route::resource('tipelayanan', TipeLayananController::class);
Route::resource('bengkels', BengkelController::class);
Route::resource('users', UserController::class);
Route::resource('promos', PromoController::class);