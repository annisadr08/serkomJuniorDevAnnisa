<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;

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

// route ke halaman utama/ beranda
Route::get('/', [BeasiswaController::class, 'beranda'])->name('beranda');

// route ke halaman pendaftaran
Route::get('/daftar', [BeasiswaController::class, 'daftar'])->name('daftar');

// route untuk menyimpan data pendaftaran
Route::post('/daftar', [BeasiswaController::class, 'store'])->name('store');

// route ke halaman hasil
Route::get('/hasil', [BeasiswaController::class, 'hasil'])->name('hasil');

// route ke halaman grafik
Route::get('/grafik', [BeasiswaController::class, 'grafik'])->name('grafik');

// route untuk menampilkan form pendaftaran secara langsung (duplikasi route)
Route::get('/daftar', function () {
    return view('daftar'); 
})->name('daftar');
