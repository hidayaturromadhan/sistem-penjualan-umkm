<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Admin;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\LaporanPenjualanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {
        // Mengambil jumlah produk, admin, dan kasir
        $produks = Produk::count();
        $totalAdmin = Admin::where('peran_id', 1)->count(); // Total Admin (id_peran = 1)
        $totalKasir = Admin::where('peran_id', 2)->count(); // Total Kasir (id_peran = 2)

        // Query untuk total pendapatan per bulan
        $pendapatanBulan = Transaksi::selectRaw('MONTH(transaksis.created_at) as bulan, SUM(detail_transaksis.total_barang * produks.harga) as total_pendapatan')
            ->join('detail_transaksis', 'transaksis.id', '=', 'detail_transaksis.transaksi_id')
            ->join('produks', 'produks.id', '=', 'detail_transaksis.produk_id')  // Join dengan tabel 'produks' untuk mendapatkan harga
            ->where('transaksis.status', 'selesai')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Menyiapkan array bulan (1-12) dan data untuk grafik
        $allBulan = range(1, 12); // Menyiapkan array bulan (1 - 12)

        // Membuat array bulan dan total pendapatan yang ditemukan
        $bulan = $pendapatanBulan->pluck('bulan')->toArray();
        $totalPendapatan = $pendapatanBulan->pluck('total_pendapatan')->toArray();

        // Menyiapkan label dan data untuk grafik
        $labels = [];
        $data = [];

        // Loop untuk mengisi bulan dan pendapatan per bulan
        foreach ($allBulan as $i) {
            $key = array_search($i, $bulan); // Mencari apakah bulan ada di hasil query
            $labels[] = $i; // Menambahkan bulan (1-12) ke label
            $data[] = $key !== false ? $totalPendapatan[$key] : 0; // Jika bulan ada, ambil pendapatannya, jika tidak ada, set ke 0
        }

        // Mengembalikan data ke view
        return view('pages.admin.dashboard', compact('totalAdmin', 'totalKasir', 'produks', 'labels', 'data', 'pendapatanBulan'));
    }



    public function laporanPenjualan(Request $request)
    {
        // Ambil input tanggal awal dan tanggal akhir dari request
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');
        
        // Query transaksi berdasarkan status selesai
        $query = Transaksi::with(['admin', 'detailTransaksis.produk'])
            ->where('status', 'selesai');
            
        // Filter berdasarkan rentang tanggal jika ada
        if ($tanggalAwal && $tanggalAkhir) {
            $query->whereBetween('created_at', [$tanggalAwal, $tanggalAkhir]);
        }

        // Batasi data per halaman dengan paginate
        $transaksi = $query->paginate(5); // 5 data per halaman

        // Kembali ke halaman dengan parameter filter tetap ada
        return view('pages.admin.laporanPenjualan.laporan', compact('transaksi', 'tanggalAwal', 'tanggalAkhir'));
    }

     // Fungsi untuk mengekspor laporan penjualan
     public function exportLaporan(Request $request)
    {
        return Excel::download(new LaporanPenjualanExport($request->tanggal_awal, $request->tanggal_akhir), 'laporan_penjualan.xlsx');
    }
     // Menampilkan admin kecil
    public function index()
    {
        $kasirs = Admin::where('peran_id', 2)->get();  // Ambil semua kasir
        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');
        return view('pages.admin.kasir.index',  compact('kasirs'));
    }

    // Membuat akun kasir
    public function create()
    {
        return view('pages.admin.kasir.create');
    }

    // pengiriman data kasir
    public function kirim(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        $kasirs = Admin::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'peran_id' => 2,  
            
        ]);

        if ($kasirs) {
            Alert::success('Berhasil!', 'kasir berhasil ditambahkan!');
            return redirect()->route('admin.kasir');
        } else {
            Alert::error('Gagal!', 'Kasir gagal ditambahkan!');
            return redirect()->back();
        }
    }

    // menu merubah data kasir
    public function edit($id)
    {
        $kasirs = Admin::findOrFail($id);
        return view('pages.admin.kasir.edit', compact('kasirs'));
    }

    public function update(Request $request, $id)
    {
        $kasirs = Admin::findOrFail($id);

        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:8', // Password tidak wajib diisi
        ]);

        // Cek apakah ada input password baru
        $password = $kasirs->password; // Default gunakan password lama
        if ($request->filled('password')) {
            $password = bcrypt($request->password); // Hash jika ada password baru
        }

        // Update data kasir
        $updated = $kasirs->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $password, // Gunakan password lama jika tidak diubah
            'peran_id' => 2,
        ]);

        // Pengecekan proses update
        if ($updated) {
            Alert::success('Berhasil!', 'Kasir berhasil dirubah!');
            return redirect()->route('admin.kasir');
        } else {
            Alert::error('Gagal!', 'Kasir gagal dirubah!');
            return redirect()->back();
        }
    }

    public function delete($id)
    {
        $kasirs = Admin::findOrFail($id);
        
        $kasirs->delete();

        if ($kasirs) {
            Alert::success('Berhasil!', 'Kasir berhasil dihapus');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Kasir gagal dihapus');
            return redirect()->back();
        }
    }


}