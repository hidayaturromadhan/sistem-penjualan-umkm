<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    use HasFactory;

    protected $table = 'perans'; // Nama tabel

    protected $fillable = ['nama_peran']; // Kolom yang bisa diisi

    /**
     * Relasi dengan model Admin
     */
    public function admins()
    {
        return $this->hasMany(Admin::class, 'peran_id');
    }
}