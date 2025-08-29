<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\KlienController;
use App\Http\Controllers\PekerjaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

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
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// ====================== DASHBOARD ======================
// Dashboard hanya untuk admin
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('dashboard.index');

// ====================== PEKERJA ======================
// Daftar pekerja bisa diakses klien & admin
Route::get('/pekerja', [PesananController::class, 'daftarPekerja'])
    ->middleware(['auth', 'role:klien,admin'])
    ->name('pekerja.index');

Route::get('/namapekerja', [PekerjaController::class, 'index'])
    ->middleware(['auth', 'role:klien,admin'])
    ->name('pekerja.namapekerja');

Route::get('/pekerja/{id}/profile', [PekerjaController::class, 'profile'])
    ->middleware(['auth', 'role:klien,admin'])
    ->name('pekerja.profile');

// ====================== PESANAN ======================
Route::get('/pesan/{pekerja}', [PesananController::class, 'formPesan'])
    ->middleware(['auth', 'role:klien,admin'])
    ->name('pesanan.form');

Route::post('/pesan/{pekerja}', [PesananController::class, 'simpanPesanan'])
    ->middleware(['auth', 'role:klien,admin'])
    ->name('pesanan.simpan');

Route::get('/pesanan-sukses', [PesananController::class, 'sukses'])
    ->middleware(['auth', 'role:klien,admin'])
    ->name('pesanan.sukses');

Route::get('/pesanan', [PesananController::class, 'index'])
    ->middleware(['auth', 'role:klien,admin'])
    ->name('pesanan.index');

// Ambil waktu yang tersedia
Route::get('/pesanan/available-times/{pekerja}/{tanggal?}', [PesananController::class, 'getAvailableTimes'])
    ->middleware(['auth', 'role:klien,admin'])
    ->name('pesanan.available-times');

// ====================== KLIEN ======================
Route::get('/klien', [KlienController::class, 'index'])
    ->middleware(['auth', 'role:klien,admin'])
    ->name('klien.index');  

    // Rute untuk pendaftaran
Route::get('/daftar', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/daftar', [RegisterController::class, 'register'])->name('register.process');
