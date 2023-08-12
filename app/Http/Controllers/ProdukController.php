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
        $this->validate($request, [
            'nama' => 'required',
            'stok' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);
        Produk::create($request->all());
        return redirect()->route('produk')->with('success', 'Produk Berhasil Ditambahkan!');
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
            'stok' => 'required|max:50',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
        ]);

        $produk = Produk::find($id);

        if (!$produk) {
            return redirect()->route('produk')->with('error', 'Produk tidak ditemukan');
        }

        $produk->nama = $request->nama;
        $produk->stok = $request->stok;
        $produk->harga_beli = $request->harga_beli;
        $produk->harga_jual = $request->harga_jual;
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
