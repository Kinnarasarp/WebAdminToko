<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'satuan',
        'harga'
    ];

    public function stok()
    {
        return $this->hasOne(Stok::class);
    }
}
