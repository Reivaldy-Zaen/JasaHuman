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

// Redirect ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// ====================== AUTH ======================
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ====================== DASHBOARD ======================

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('dashboard.index');

Route::get('/pekerja', [PesananController::class, 'daftarPekerja'])
    ->middleware(['auth', 'role:klien'])
    ->name('pekerja.index');

// ====================== PEKERJA ======================
Route::get('/namapekerja', [PekerjaController::class, 'index'])
    ->middleware('auth')
    ->name('pekerja.namapekerja');

Route::get('/pekerja/{id}/profile', [PekerjaController::class, 'profile'])
    ->middleware('auth')
    ->name('pekerja.profile');

// ====================== PESANAN ======================
Route::get('/pesan/{pekerja}', [PesananController::class, 'formPesan'])
    ->middleware('auth')
    ->name('pesanan.form');

Route::post('/pesan/{pekerja}', [PesananController::class, 'simpanPesanan'])
    ->middleware('auth')
    ->name('pesanan.simpan');

Route::get('/pesanan-sukses', [PesananController::class, 'sukses'])
    ->middleware('auth')
    ->name('pesanan.sukses');

// PASTIKAN route nya seperti ini:
Route::get('/pesanan/available-times/{pekerja}/{tanggal?}', [PesananController::class, 'getAvailableTimes']);

// ====================== KLIEN ======================
Route::get('/klien', [KlienController::class, 'index'])
    ->middleware('auth')
    ->name('klien.index');
