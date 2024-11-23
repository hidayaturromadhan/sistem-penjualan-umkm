<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Admin;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        return view('pages.admin.dashboard');
    }

    // Melihat data produk
    public function lihatProduk()
    {
        $produks = Produk::all();
        return view('layouts.admin.produk.index', compact('produks'));
    }
    // Mengedit produk
    public function editProduk($id)
    {
        $produk = Produk::findOrFail($id);
        return view('layouts.admin.produk.edit', compact('produk'));
    }

    // Menambah produk baru
    public function tambahProduk(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok_satuan' => 'required|in:kg,g,buah',
        ]);

        Produk::create($request->all());
        return redirect()->route('admin.produk.index');
    }

    // Menghapus produk
    public function hapusProduk($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();
        return redirect()->route('admin.produk.index');
    }
    // Mengelola Admin Kecil
    public function kelolaAdminKecil()
    {
        $admins = Admin::where('peran_id', 2)->get(); // Peran Admin Kecil
        return view('layouts.admin.admin_kecil.index', compact('admins'));
    }

    // Laporan Penjualan
    public function laporanPenjualan()
    {
        $transaksis = Transaksi::all();
        return view('layouts.admin.laporan_penjualan', compact('transaksis'));
    }
}