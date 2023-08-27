<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TokoController;
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
Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk-store');
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk-edit');
Route::put('/produk/{id}/update', [ProdukController::class, 'update'])->name('produk-update');
Route::delete('/produk/{id}/destroy', [ProdukController::class, 'destroy'])->name('produk-destroy');

//stok
Route::get('/stok', [StokController::class, 'index'])->name('stok');
Route::post('/stok/detail', [StokController::class, 'detail'])->name('stok_detail');

//penjualan
Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
Route::post('/penjualan/cart', [PenjualanController::class, 'cart'])->name('cart');
Route::post('/penjualan/confirmpenjualan', [PenjualanController::class, 'confirmpenjualan'])->name('confirmpenjualan');

//riwayatPenjualan
Route::get('/riwayat-penjualan', [PenjualanController::class, 'riwayatPenjualan'])->name('riwayatPenjualan');

// toko
Route::get('/toko', [TokoController::class, 'index'])->name('toko');
Route::post('/toko/store', [TokoController::class, 'store'])->name('toko-store');
