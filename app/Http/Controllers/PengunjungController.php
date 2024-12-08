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
        // Mengambil semua produk untuk ditampilkan di halaman utama
        $produks = Produk::all();

        // Mengambil top 8 produk berdasarkan total terjual
        $topProduk = DB::table('detail_transaksis')
            ->join('produks', 'detail_transaksis.produk_id', '=', 'produks.id')
            ->join('transaksis', 'detail_transaksis.transaksi_id', '=', 'transaksis.id')
            ->select(
                'produks.nama_produk',
                'produks.gambar',
                'produks.stok_satuan',
                DB::raw('SUM(detail_transaksis.total_barang) as total_terjual')
            )
            ->where('transaksis.status', 'selesai')
            ->groupBy('detail_transaksis.produk_id', 'produks.nama_produk', 'produks.gambar', 'produks.stok_satuan')
            ->orderByDesc('total_terjual')
            ->limit(8)
            ->get();

        return view('pengunjung.beranda', compact('produks', 'topProduk'));
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


