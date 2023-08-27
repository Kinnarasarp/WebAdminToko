<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guarded = [];

    public function penjualan()
    {
        return $this->belongsToMany(Penjualan::class, 'penjualan', 'produk_id', 'no_order');
    }
}
