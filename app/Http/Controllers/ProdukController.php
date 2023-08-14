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

        if (!$produk) {
            return redirect()->route('produk')->with('error', 'Produk tidak ditemukan.');
        }
        return view('produk-detail', compact('produk'));
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('produk-edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'stok' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
        ]);
    
        $produk = Produk::find($id);
    
        if (!$produk) {
            return redirect()->route('produk')->with('error', 'Produk tidak ditemukan.');
        }
    
        // Dump the actual data values
        dump($produk->toArray());
    
        $produk->update($request->all());
    
        return redirect()->route('produk')->with('success', 'Produk berhasil diupdate!');
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
