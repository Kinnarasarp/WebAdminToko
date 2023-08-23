<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Toko;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        $transaksi = Transaksi::all(); // Definisikan variabel $transaksi
        $penjualan = Penjualan::all();
        $toko = Toko::first();
        return view('index', compact('produk', 'transaksi', 'penjualan', 'toko'));
    }
}
