<?php

use App\Http\Controllers\RuanganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('ruangan.index');
});

Route::get('/dashboard', function () {
    return redirect()->route('ruangan.index');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('ruangan', RuanganController::class)->except('show');
});

require __DIR__ . '/auth.php';
