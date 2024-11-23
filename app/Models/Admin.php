<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins'; // Nama tabel

    protected $fillable = ['nama', 'username', 'password', 'peran_id']; // Kolom yang bisa diisi

    protected $hidden = ['password']; // Sembunyikan password saat serialisasi

    /**
     * Relasi dengan model Peran
     */
    public function peran()
    {
        return $this->belongsTo(Peran::class, 'peran_id');
    }
}