<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all(); // Ambil data produk dari database
        $produk = Produk::paginate(5);
        return view('produk', compact('produk')); // Menggunakan 'produk' bukan 'produks'
    }


    public function create()
    {
        return view('produk-tambah');
    }

    public function store(Request $request)
    {
        // Lakukan validasi input, contoh:
        $validatedData = $request->validate([
            'nama' => 'required',
            'satuan' => 'required',
            'harga' => 'required|numeric',
            'status' => 'required',
        ]);

        Produk::create($validatedData); // Simpan data ke database
        return redirect()->route('produk'); // Redirect kembali ke halaman produk index
    }


    public function show($id)
    {
        $produk = Produk::find($id);
        return view('produk-detail', compact('produk'));
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('produk-edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'satuan' => 'required|max:50',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|in:0,1',
        ]);

        $produk = Produk::find($id);

        if (!$produk) {
            return redirect()->route('produk')->with('error', 'Produk tidak ditemukan');
        }

        $produk->nama = $request->nama;
        $produk->satuan = $request->satuan;
        $produk->harga = $request->harga;
        $produk->status = $request->status;
        $produk->save();

        return redirect()->route('produk')->with('success', 'Data produk berhasil diperbarui');
    }


    public function destroy($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return redirect()->route('produk')->with('error', 'Produk tidak ditemukan');
        }

        $produk->delete();

        return redirect()->route('produk')->with('success', 'Produk berhasil dihapus');
    }
}
