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
        // Ambil data produk buah dengan pagination
        $buah = Produk::whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'buah');
        })->paginate(5); // Batasi 5 data per halaman
    
        // Ambil data produk sayur dengan pagination
        $sayur = Produk::whereHas('kategori', function ($query) {
            $query->where('nama_kategori', 'sayur');
        })->paginate(5); // Batasi 5 data per halaman
    
        // Return view dengan data
        return view('pages.kasir.dashboard', compact('buah', 'sayur'));
    }
    
}
