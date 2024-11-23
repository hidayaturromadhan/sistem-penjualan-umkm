<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;

class kasirController extends Controller
{

    // Menampilkan dashboard admin kecil
    public function index()
    {
        return view('pages.kasir.dashboard');
    }

    // Melihat transaksi
    public function lihatTransaksi()
    {
        $transaksis = Transaksi::with('detailTransaksi')->get();
        return view('layouts.admin.transaksi.index', compact('transaksis'));
    }

    // Menambah transaksi
    public function tambahTransaksi(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer',
        ]);

        $transaksi = Transaksi::create([
            'admin_id' => auth()->id(),
            'status' => 'pending',
        ]);

        DetailTransaksi::create([
            'transaksi_id' => $transaksi->id,
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
        ]);

        return redirect()->route('admin.transaksi.index');
    }

    // Menghapus transaksi
    public function hapusTransaksi($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();
        return redirect()->route('admin.transaksi.index');
    }

    // Mengubah status transaksi
    public function ubahStatusTransaksi($id, $status)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->status = $status;
        $transaksi->save();
        return redirect()->route('admin.transaksi.index');
    }
}
