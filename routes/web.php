<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StokController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('dashboard');

//produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/produk/tambah', [ProdukController::class, 'create'])->name('produk-create');

Route::get('/stok', [StokController::class, 'index'])->name('stok');
Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
