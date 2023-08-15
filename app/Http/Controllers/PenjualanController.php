<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $produk = Produk::where('stok', '>', '0')->get(); // Retrieve all products from the database
        return view('penjualan', compact('produk'));
    }
}
