<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksis')->cascadeOnDelete();
            $table->foreignId('produk_id')->constrained('produks')->cascadeOnDelete();
            $table->integer('total_barang');  // Kolom untuk menyimpan total barang yang dibeli
            $table->decimal('total_harga', 10, 2);  // Kolom untuk menyimpan total harga (kuantitas * harga produk)
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksis');
    }
};
