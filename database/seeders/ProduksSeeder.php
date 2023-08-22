<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProduksSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'id' => 1,
                'nama' => 'Kopi ABC',
                'stok' => 8,
                'satuan' => 'pcs',
                'harga_beli' => 3000,
                'harga_jual' => 4500,
            ],
            [
                'id' => 2,
                'nama' => 'Luwak Whiite Coffee',
                'stok' => 8,
                'satuan' => 'pcs',
                'harga_beli' => 3000,
                'harga_jual' => 4500,
            ],
            [
                'id' => 3,
                'nama' => 'Indomie Kari',
                'stok' => 24,
                'satuan' => 'pcs',
                'harga_beli' => 3000,
                'harga_jual' => 5000,
            ],
            [
                'id' => 4,
                'nama' => 'POP ICE',
                'stok' => 7,
                'satuan' => 'pcs',
                'harga_beli' => 2000,
                'harga_jual' => 3500,
            ],
            [
                'id' => 5,
                'nama' => 'Milo',
                'stok' => 12,
                'satuan' => 'pcs',
                'harga_beli' => 2000,
                'harga_jual' => 3500,
            ],
            [
                'id' => 6,
                'nama' => 'Teajus',
                'stok' => 15,
                'satuan' => 'pcs',
                'harga_beli' => 1000,
                'harga_jual' => 2000,
            ]
        ];

        foreach ($data as $key => $value) {
            Produk::create($value);
        }
    }
}
