<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;

class TokoController extends Controller
{
    public function index()
    {
        $toko = Toko::first(); // Ambil toko pertama
        return view('toko', compact('toko'));
    }

    public function store(Request $request)
    {
        $toko = Toko::first();
        if (Toko::count() == 0) {
            $toko = new Toko();
        } 
        
        $toko->nama = $request->nama;
        $toko->alamat = $request->alamat;
        $toko->notelp = $request->notelp;
        $toko->instagram = $request->instagram;
        $toko->save();
        
        return redirect()->route('dashboard')->with('success', 'Data Berhasil Diperbarui');
    }
}
