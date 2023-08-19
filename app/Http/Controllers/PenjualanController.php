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
        // dd($produk);
        return view('penjualan', compact('produk'));
    }

    public function cart(Request $request)
    {
        if (isset($request->produk_array)) {
            $array_produks = json_decode($request->produk_array);
            return view("cart", compact('array_produks'));
        } else {
            return redirect()->route('penjualan')->with('error', 'Pilih Salah Satu Produk !');
        }
    }
}
