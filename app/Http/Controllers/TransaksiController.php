<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Admin;
use App\Models\Produk;
use App\Models\DetailTransaksi;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        // Mendapatkan transaksi dengan informasi kasir dan detail transaksi, menggunakan pagination
        $transaksis = Transaksi::with(['admin', 'detailTransaksis'])->paginate(5);

        return view('pages.kasir.transaksi.index', compact('transaksis'));
    }


    public function show($id)
    {
        // Mendapatkan transaksi dengan detail transaksi dan produk yang terlibat
        $transaksi = Transaksi::with(['detailTransaksis.produk'])->findOrFail($id);

        return view('pages.kasir.transaksi.show', compact('transaksi'));
    }


    public function create()
    {
        $kasirs = Admin::where('peran_id', 2)->get(); // Menampilkan kasir
        $produks = Produk::all(); // Menampilkan semua produk
        return view('pages.kasir.transaksi.create', compact('kasirs', 'produks'));
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|in:pending,selesai,dibatalkan', // Status transaksi
            'produk' => 'required|array', // Produk harus ada dan berupa array
            'produk.*' => 'exists:produks,id', // Setiap ID produk yang dipilih harus valid
            'total_barang' => 'required|array', // Jumlah produk harus ada dan berupa array
            'total_barang.*' => 'numeric|min:1', // Setiap jumlah harus angka dan lebih besar dari 0
        ]);

        // Ambil kasir dari pengguna yang sedang login
        $kasir = Auth::user(); // Data pengguna login
        if (!$kasir) {
            return redirect()->back()->with('error', 'Kasir tidak ditemukan.');
        }

        // Membuat transaksi baru
        $transaksi = Transaksi::create([
            'admin_id' => $kasir->id, // ID kasir yang sedang login
            'status' => $request->status, // Status transaksi
            'tanggal' => now(), // Menyimpan tanggal transaksi (sekarang)
            'total_produk' => count($request->produk), // Total produk yang ditambahkan
            'total_harga' => 0, // Akan dihitung setelah detail transaksi
        ]);

        $totalHarga = 0; // Variabel untuk menghitung total harga

        // Menyimpan detail transaksi (produk yang dipilih dan jumlahnya)
        foreach ($request->produk as $key => $produkId) {
            $produk = Produk::find($produkId);

            // Menghitung harga total per produk
            $totalHargaProduk = $produk->harga * $request->total_barang[$key];

            // Membuat detail transaksi untuk setiap produk
            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id, // ID transaksi yang baru dibuat
                'produk_id' => $produkId, // ID produk
                'total_barang' => $request->total_barang[$key], // Total barang
                'total_harga' => $totalHargaProduk, // Total harga produk
            ]);

            // Menambahkan total harga ke total transaksi
            $totalHarga += $totalHargaProduk;
        }

        // Update total harga transaksi
        $transaksi->update([
            'total_harga' => $totalHarga, // Menyimpan total harga transaksi
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('kasir.transaksi.index')
                        ->with('success', 'Transaksi berhasil ditambahkan');
    }

    public function edit($id)
    {
        $transaksi = Transaksi::with('detailTransaksis.produk')->findOrFail($id);
        $produks = Produk::all();

        return view('pages.kasir.transaksi.edit', compact('transaksi', 'produks'));
    }

    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'status' => 'required|in:pending,selesai,dibatalkan',
        'produk' => 'required|array',
        'produk.*' => 'exists:produks,id',
        'total_barang' => 'required|array',
        'total_barang.*' => 'integer|min:1',
    ]);

    // Ambil data transaksi
    $transaksi = Transaksi::findOrFail($id);

    // Update status transaksi
    $transaksi->update([
        'status' => $request->status,
    ]);

    // Hapus detail transaksi lama
    $transaksi->detailTransaksis()->delete();

    // Tambahkan detail transaksi baru
    foreach ($request->produk as $index => $produkId) {
        // Ambil produk untuk mendapatkan harga
        $produk = Produk::find($produkId);
        
        // Hitung total harga
        $totalHarga = $produk->harga * $request->total_barang[$index];
        
        // Insert detail transaksi dengan total harga yang dihitung
        $transaksi->detailTransaksis()->create([
            'produk_id' => $produkId,
            'total_barang' => $request->total_barang[$index],
            'total_harga' => $totalHarga,  // Masukkan nilai total_harga
        ]);
    }

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('kasir.transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
}


    
}


