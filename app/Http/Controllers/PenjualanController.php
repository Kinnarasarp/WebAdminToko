<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $produk = Produk::where('stok', '>', 0)->get();
        return view('penjualan', compact('produk'));
    }

    public function cart(Request $request)
    {
        if (!empty(json_decode($request->produk_array))) {
            $array_produks = json_decode($request->produk_array);

            return view("cart", compact('array_produks'));
        } else {
            return redirect()->route('penjualan')->with('error', 'Pilih Salah Satu Produk !');
        }
    }

    public function confirmPenjualan(Request $request)
    {
        $penjualan = new Penjualan();
        $penjualan->save();

        $produk = $request->produk_id;

        foreach ($produk as $i => $value) {
            $data = json_decode($value);
            $transaksi = new Transaksi();
            $transaksi->produk_id = $data->id;
            $transaksi->penjualan_no_order = $penjualan->no_order;
            $transaksi->quantity = intval($request->jumlah[$i]);
            $transaksi->harga = intval($data->harga_jual);
            $transaksi->keuntungan = (intval($data->harga_jual) - intval($data->harga_beli)) * $transaksi->quantity;
            $transaksi->subtotal = intval($request->jumlah[$i]) * intval($data->harga_jual);
            $transaksi->save();

            $produk = Produk::find($data->id);
            $produk->stok = $produk->stok - intval($request->jumlah[$i]);
            $produk->save();
        }

        $penjualan->grand_total = intval($request->total);
        $penjualan->save();

        return redirect()->route('riwayatPenjualan')->with('success', 'Transaksi Berhasil !');
    }

    public function riwayatPenjualan()
    {
        $transaksiHistory = Transaksi::with(array('produk' => function ($query) {
            $query->withTrashed();
        }))->get();
        return view('riwayat-penjualan', compact('transaksiHistory'));
    }
}
