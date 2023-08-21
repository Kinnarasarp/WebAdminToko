<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        $transaksi = Transaksi::all();
        $penjualan = Penjualan::all();
        return view('index', compact('produk', 'transaksi', 'penjualan'));
    }
}
