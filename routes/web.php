<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PengunjungController;

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
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/produk', [AdminController::class, 'lihatProduk'])->name('admin.produk.index');
    Route::get('/admin/produk/{id}/edit', [AdminController::class, 'editProduk'])->name('admin.produk.edit');
    Route::post('/admin/produk/tambah', [AdminController::class, 'tambahProduk'])->name('admin.produk.tambah');
    Route::delete('/admin/produk/{id}', [AdminController::class, 'hapusProduk'])->name('admin.produk.hapus');
    Route::get('/admin/kasir', [AdminController::class, 'kelolaKasir'])->name('admin.kasir.index');
    Route::get('/admin/laporan', [AdminController::class, 'laporanPenjualan'])->name('admin.laporan');
    //Route::get('/admin-logout', [AuthController::class, 'logout'])->name('logout');
});


// Kasir
Route::middleware(['auth', 'role:Kasir'])->group(function () {
    Route::prefix('kasir')->group(function () {
        Route::get('/dashboard', [KasirController::class, 'index'])->name('kasir.dashboard');
        Route::get('/transaksi', [KasirController::class, 'transaksiIndex'])->name('kasir.transaksi');
        Route::get('/laporan', [KasirController::class, 'laporan'])->name('kasir.laporan');
        // Tambahkan rute lainnya untuk Kasir
    });
});