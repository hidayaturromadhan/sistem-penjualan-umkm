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
        $request->validate([
            'status' => 'required|in:pending,selesai,dibatalkan',
            'produk' => 'required|array',
            'produk.*' => 'exists:produks,id',
            'total_barang' => 'required|array',
            'total_barang.*' => 'integer|min:1',
        ]);

        $kasir = Auth::user();
        if (!$kasir) {
            // SweetAlert untuk kasus kasir tidak ditemukan
            alert()->error('Gagal', 'Kasir tidak ditemukan.');
            return redirect()->back();
        }

        // Validasi stok produk
        foreach ($request->produk as $index => $produkId) {
            $produk = Produk::find($produkId);
            if ($request->total_barang[$index] > $produk->stok) {
                // SweetAlert untuk stok tidak mencukupi
                alert()->error('Gagal', "Stok untuk produk {$produk->nama_produk} tidak mencukupi.");
                return redirect()->back();
            }
        }

        // Buat transaksi
        $transaksi = Transaksi::create([
            'admin_id' => $kasir->id,
            'status' => $request->status,
            'tanggal' => now(),
            'total_produk' => count($request->produk),
            'total_harga' => 0,
        ]);

        $totalHarga = 0;

        foreach ($request->produk as $index => $produkId) {
            $produk = Produk::find($produkId);

            $totalHargaProduk = $produk->harga * $request->total_barang[$index];

            DetailTransaksi::create([
                'transaksi_id' => $transaksi->id,
                'produk_id' => $produkId,
                'total_barang' => $request->total_barang[$index],
                'total_harga' => $totalHargaProduk,
            ]);

            // Kurangi stok produk jika status transaksi "selesai"
            if ($request->status === 'selesai') {
                $produk->update([
                    'stok' => $produk->stok - $request->total_barang[$index],
                ]);
            }

            $totalHarga += $totalHargaProduk;
        }

        $transaksi->update([
            'total_harga' => $totalHarga,
        ]);

        // SweetAlert untuk transaksi berhasil ditambahkan
        alert()->success('Berhasil', 'Transaksi berhasil ditambahkan.');

        return redirect()->route('kasir.transaksi.index');
    }



    public function edit($id)
    {
        $transaksi = Transaksi::with('detailTransaksis.produk')->findOrFail($id);
        $produks = Produk::all();

        return view('pages.kasir.transaksi.edit', compact('transaksi', 'produks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,selesai,dibatalkan',
            'produk' => 'required|array',
            'produk.*' => 'exists:produks,id',
            'total_barang' => 'required|array',
            'total_barang.*' => 'integer|min:1',
        ]);

        $transaksi = Transaksi::findOrFail($id);

        // Logika: Jika status sudah selesai, transaksi tidak bisa diedit
        if ($transaksi->status === 'selesai') {
            alert()->warning('Peringatan', 'Transaksi dengan status selesai tidak dapat diedit.');
            return redirect()->back();
        }

        // Validasi stok produk
        foreach ($request->produk as $index => $produkId) {
            $produk = Produk::find($produkId);
            if ($request->total_barang[$index] > $produk->stok) {
                // SweetAlert untuk stok tidak mencukupi
                alert()->error('Gagal Memperbarui', "Stok untuk produk {$produk->nama_produk} tidak mencukupi.");
                return redirect()->back();
            }
        }

        // Update status transaksi
        $transaksi->update([
            'status' => $request->status,
        ]);

        // Hapus detail transaksi lama
        $transaksi->detailTransaksis()->delete();

        $totalHarga = 0;

        // Tambahkan detail transaksi baru
        foreach ($request->produk as $index => $produkId) {
            $produk = Produk::find($produkId);

            $totalHargaProduk = $produk->harga * $request->total_barang[$index];

            $transaksi->detailTransaksis()->create([
                'produk_id' => $produkId,
                'total_barang' => $request->total_barang[$index],
                'total_harga' => $totalHargaProduk,
            ]);

            // Kurangi stok produk jika status transaksi "selesai"
            if ($request->status === 'selesai') {
                $produk->update([
                    'stok' => $produk->stok - $request->total_barang[$index],
                ]);
            }

            $totalHarga += $totalHargaProduk;
        }

        $transaksi->update([
            'total_harga' => $totalHarga,
        ]);

        // SweetAlert untuk transaksi berhasil diperbarui
        alert()->success('Berhasil', 'Transaksi berhasil diperbarui.');

        return redirect()->route('kasir.transaksi.index');
    }




}


