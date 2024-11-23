<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class PengunjungController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('pengunjung.beranda', compact('produks'));
    }

    public function produkBuah()
    {
        $produks = Produk::all();
        return view('pengunjung.produkBuah', compact('produks'));
    }
    public function produkSayur()
    {
        $produks = Produk::all();
        return view('pengunjung.produkSayur', compact('produks'));
    }

    public function kontak()
    {
        return view('pengunjung.kontak');
    }

    public function tentang()
    {
        return view('pengunjung.tentang');
    }
    public function infoPembayaran()
    {
        return view('pengunjung.informasiPembayaran');
    }
}


