<?php

use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;

// Halaman awal diarahkan ke daftar ruangan
Route::get('/', function () {
    return redirect()->route('ruangan.index');
});

// Setelah login, Breeze mengarahkan ke route bernama "dashboard"
Route::get('/dashboard', function () {
    return redirect()->route('ruangan.index');
})->middleware('auth')->name('dashboard');

// Admin dan Petugas: lihat, tambah, ubah.
// "auth" = harus login (guest dilempar ke halaman login)
// "role:admin,petugas" = role harus admin atau petugas
Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::resource('ruangan', RuanganController::class)->except(['show', 'destroy']);
});

// Hanya Admin: hapus data
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('ruangan/{ruangan}', [RuanganController::class, 'destroy'])->name('ruangan.destroy');
});

// Route login, register, dan logout bawaan Breeze
require __DIR__ . '/auth.php';
