<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/pekerja', [PesananController::class, 'daftarPekerja'])->name('pekerja.index');
Route::get('/pesan/{pekerja}', [PesananController::class, 'formPesan'])->name('pesanan.form');
Route::post('/pesan/{pekerja}', [PesananController::class, 'simpanPesanan'])->name('pesanan.simpan');
Route::get('/pesanan-sukses', [PesananController::class, 'sukses'])->name('pesanan.sukses');
Route::post('/pesanan/store', [PesananController::class, 'store'])->name('pesanan.store');
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::post('/pesanan/{id}/selesai', [PesananController::class, 'selesai'])->name('pesanan.selesai');


