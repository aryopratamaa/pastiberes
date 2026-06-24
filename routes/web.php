<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TipeLayananController;
use App\Http\Controllers\BengkelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\ReportController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('tipelayanan', TipeLayananController::class);
Route::resource('bengkel', BengkelController::class);
Route::resource('user', UserController::class);
Route::resource('promo', PromoController::class);

// Route Khusus Laporan PDF
Route::get('/report/layanan', [ReportController::class, 'laporanLayanan'])->name('report.layanan');
Route::get('/report/bengkel', [ReportController::class, 'laporanBengkel'])->name('report.bengkel');
Route::get('/report/promo', [ReportController::class, 'laporanPromo'])->name('report.promo');