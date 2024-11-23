<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris'; // Nama tabel

    protected $fillable = ['nama_kategori']; // Kolom yang bisa diisi

    /**
     * Relasi dengan model Produk
     */
    public function produks()
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }
}