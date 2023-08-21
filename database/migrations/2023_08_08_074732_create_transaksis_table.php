<?php

use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Produk::class);
            $table->foreignIdFor(Penjualan::class);
            $table->integer('quantity');
            $table->integer('harga');
            $table->integer('keuntungan');
            $table->integer('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
