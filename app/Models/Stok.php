<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah',
        'produk_id'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
