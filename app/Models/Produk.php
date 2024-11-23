<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks'; // Nama tabel

    protected $fillable = ['nama_produk', 'stok', 'harga', 'gambar', 'kategori_id', 'stok_satuan']; // Kolom yang bisa diisi

    /**
     * Relasi dengan model Kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    /**
     * Relasi dengan model DetailTransaksi
     */
    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'produk_id');
    }
}
