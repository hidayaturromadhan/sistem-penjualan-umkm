<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;

use Illuminate\Support\Facades\Route;



// Pengunjung
Route::prefix('/')->group(function () {
    Route::get('/', [PengunjungController::class, 'index'])->name('pengunjung.beranda');
    Route::get('/produk/buah', [PengunjungController::class, 'produkBuah'])->name('pengunjung.produkBuah');
    Route::get('/produk/sayur', [PengunjungController::class, 'produkSayur'])->name('pengunjung.produkSayur');
    Route::get('/kontak', [PengunjungController::class, 'kontak'])->name('pengunjung.kontak');
    Route::get('/tentang', [PengunjungController::class, 'tentang'])->name('pengunjung.tentang');
    Route::get('/informasi-pembayaran', [PengunjungController::class, 'infoPembayaran'])->name('pengunjung.informasiPembayaran');
});


// Authentication
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/kasir', [AdminController::class, 'index'])->name('admin.kasir');
    Route::get('/admin/kasir/create', [AdminController::class, 'create'])->name('admin.kasir.create');
    Route::post('/admin/kasir/kirim', [AdminController::class, 'kirim'])->name('admin.kasir.kirim');
    Route::get('/admin/kasir/edit/{id}', [AdminController::class, 'edit'])->name('admin.kasir.edit');
    Route::post('/admins/kasir/update/{id}', [AdminController::class, 'update'])->name('admin.kasir.update');
    Route::delete('/admin/kasir/delete/{id}', [AdminController::class, 'delete'])->name('admin.kasir.delete');

    // Produk
    Route::get('/admin/produk', [ProdukController::class, 'index'])->name('admin.produk');
    Route::get('/admin/produk/create', [ProdukController::class, 'create'])->name('admin.produk.create');
    Route::post('/admin/produk/store', [ProdukController::class, 'store'])->name('admin.produk.store');
    Route::get('/admin/produk/edit/{id}', [ProdukController::class, 'edit'])->name('admin.produk.edit');
    Route::post('/admin/produk/update/{id}', [ProdukController::class, 'update'])->name('admin.produk.update');
    Route::delete('/admin/produk/delete/{id}', [ProdukController::class, 'delete'])->name('admin.produk.delete');

    // laporan penjualan
    Route::get('/admin/laporan-penjualan', [AdminController::class, 'laporanPenjualan'])->name('admin.laporanPenjualan');
    Route::get('/admin/laporan-penjualan/export', [AdminController::class, 'exportLaporan'])->name('admin.exportLaporan');
    
});


// Kasir
Route::middleware(['auth', 'role:Kasir'])->group(function () {
    Route::prefix('kasir')->group(function () {
        Route::get('/dashboard', [KasirController::class, 'index'])->name('kasir.dashboard');

    // Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('kasir.transaksi.index');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('kasir.transaksi.create');
    Route::get('/transaksi/{id}', [TransaksiController::class, 'show'])->name('kasir.transaksi.show');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('kasir.transaksi.store');
    Route::get('/transaksi/edit/{id}', [TransaksiController::class, 'edit'])->name('kasir.transaksi.edit');
    Route::post('/transaksi/update/{id}', [TransaksiController::class, 'update'])->name('kasir.transaksi.update');
    Route::delete('/transaksi/delete/{id}', [TransaksiController::class, 'delete'])->name('kasir.transaksi.delete');

    });
});