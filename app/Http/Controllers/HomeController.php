<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Toko;
use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     
     +*---*/
    public function index()
    {
        $produk = Produk::all();
        $transaksi = Transaksi::all(); // Definisikan variabel $transaksi
        $penjualan = Penjualan::all();
        $toko = Toko::first();

        // $data = Transaksi::whereIn(DB::raw('MONTH(created_at)'), $months)->get();
        // $total_profit = 0;
        // foreach ($data as $key) {
        //     $total_profit = $key->quantity * $key->keuntungan;
        //     array_push($profit_per_month, $total_profit);
        // }
        // $omset_per_month['profit'] = $total_profit;


        $months = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'];
        $omset_per_month = [];
        $profit_per_month = [];
        foreach ($months as  $m) {
            $x = Transaksi::whereMonth('created_at', $m)->sum('subtotal');
            $y = Transaksi::whereMonth('created_at', $m)->sum('keuntungan');
            array_push($omset_per_month, $x);
            array_push($profit_per_month, $y);
        }
        // dd($profit_per_month);

        // dd($data);

        return view('index', compact('produk', 'transaksi', 'penjualan', 'toko', 'omset_per_month', 'profit_per_month'));
    }
}
