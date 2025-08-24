<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\PekerjaController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect ke dashboard
Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ====================== AUTH ======================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Dashboard role
Route::get('/dashboard/admin', function () {
    return "Selamat datang Admin!";
})->name('dashboard.admin');

Route::get('/dashboard/klien', function () {
    return "Selamat datang Klien!";
})->name('dashboard.klien');

// ====================== PEKERJA ======================
Route::get('/pekerja', [PesananController::class, 'daftarPekerja'])->name('pekerja.index');
Route::get('/namapekerja', [PekerjaController::class, 'index'])->name('pekerja.namapekerja');
Route::get('/pekerja/{id}/profile', [PekerjaController::class, 'profile'])->name('pekerja.profile');

// ====================== PESANAN ======================
Route::get('/pesan/{pekerja}', [PesananController::class, 'formPesan'])->name('pesanan.form');
Route::post('/pesan/{pekerja}', [PesananController::class, 'simpanPesanan'])->name('pesanan.simpan');

Route::get('/pesanan-sukses', [PesananController::class, 'sukses'])->name('pesanan.sukses');
Route::post('/pesanan/store', [PesananController::class, 'store'])->name('pesanan.store');

Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::post('/pesanan/{id}/selesai', [PesananController::class, 'selesai'])->name('pesanan.selesai');

Route::get('/pesanan/available-times/{pekerja}', [PesananController::class, 'getAvailableTimes'])->name('pesanan.available-times');

// ====================== KLIEN ======================
Route::get('/klien', [KlienController::class, 'index'])->name('klien.index');
