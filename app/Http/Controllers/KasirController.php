<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use App\Models\DetailTransaksi;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;

class kasirController extends Controller
{

    public function index()
    {
        // Ambil data produk buah dan sayur berdasarkan kategori
        $buah = Produk::whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'buah');
        })->get();

        $sayur = Produk::whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'sayur');
        })->get();

        return view('pages.kasir.dashboard', compact('buah', 'sayur'));
    }
}
