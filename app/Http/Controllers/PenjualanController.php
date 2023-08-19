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
        if ($request->isMethod('post')) {
            if (isset($request->produk_array) && !empty($request->produk_array)) {
                $array_produks = json_decode($request->produk_array);

                // Lakukan pengambilan data dari penjualan sebelumnya atau buat no_order baru
                $previousPenjualan = Penjualan::latest('no_order')->first();
                $no_order = $previousPenjualan ? $previousPenjualan->no_order + 1 : 1;

                return view("cart", compact('array_produks', 'no_order'));
            } else {
                return redirect()->route('penjualan')->with('error', 'Pilih Salah Satu Produk !');
            }
        } else {
            return redirect()->route('penjualan')->with('error', 'Metode yang digunakan tidak didukung.');
        }
    }


    public function prosesCheckout(Request $request)
    {
        try {
            $noOrder = $request->input('no_order');
            $produkIds = $request->input('produk_id');
            $hargas = $request->input('harga');
            $keuntungans = $request->input('keuntungan');
            $totals = $request->input('total');

            // Simpan transaksi
            $this->simpanTransaksi($noOrder, $produkIds, $hargas, $keuntungans, $totals);

            // Hitung dan update total pada penjualan
            $this->updateTotalPenjualan($noOrder);

            return redirect()->route('penjualan')->with('success', 'Transaksi berhasil.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function konfirmasiCheckout(Request $request)
    {
        try {
            $noOrder = $request->input('no_order');
            $array_produks = json_decode($request->produk_array);

            $totalHarga = 0;

            foreach ($array_produks as $id) {
                $item = Produk::find($id);
                $totalHarga += $item->harga_jual;
            }

            $penjualan = Penjualan::where('no_order', $noOrder)->first();

            return view('konfirmasi-checkout', compact('penjualan', 'array_produks', 'totalHarga'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function uploadToPenjualan(Request $request)
    {
        try {
            $produkId = $request->input('produk_id');
            $jumlah = $request->input('jumlah');
            $subtotal = $request->input('subtotal');

            // Create a new entry in the Penjualan table
            $penjualan = new Penjualan();
            $penjualan->produk_id = $produkId;
            $penjualan->jumlah = $jumlah;
            $penjualan->subtotal = $subtotal;
            // You might need to adjust the above fields based on your table structure

            $penjualan->save();

            return redirect()->route('penjualan')->with('success', 'Produk berhasil ditambahkan ke dalam keranjang.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
