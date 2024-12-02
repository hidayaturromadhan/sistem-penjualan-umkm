<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use DB;

class PengunjungController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('pengunjung.beranda', compact('produks'));
    }


    public function produkBuah(Request $request)
    {
        // Ambil input pencarian dari form
        $search = $request->input('search');

        // Query produk kategori 'Buah' dengan pencarian (jika ada)
        $produks = DB::table('produks')
            ->join('kategoris', 'produks.kategori_id', '=', 'kategoris.id')
            ->select('produks.*', 'kategoris.nama_kategori')
            ->where('kategoris.nama_kategori', 'buah') // Filter kategori 'Buah'
            ->when($search, function ($query, $search) {
                return $query->where('produks.nama_produk', 'LIKE', "%$search%");
            })
            ->get(); 

        // Kirim data ke view
        return view('pengunjung.produkBuah', compact('produks', 'search'));
    }


    public function produkSayur(Request $request)
    {
        // Ambil input pencarian dari form
        $search = $request->input('search');

        $produks = DB::table('produks')
            ->join('kategoris', 'produks.kategori_id', '=', 'kategoris.id')
            ->select('produks.*', 'kategoris.nama_kategori')
            ->where('kategoris.nama_kategori', 'sayur') // Filter kategori 'Sayur'
            ->when($search, function ($query, $search) {
                return $query->where('produks.nama_produk', 'LIKE', "%$search%");
            })
            ->get(); 
        return view('pengunjung.produkSayur', compact('produks', 'search'));
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


