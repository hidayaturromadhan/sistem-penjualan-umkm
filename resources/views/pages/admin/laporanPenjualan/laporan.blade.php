@extends('layouts.admin.main')
@section('title', 'Laporan Penjualan')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Laporan Penjualan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}" style="color: #1A5F3C;">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Laporan Penjualan</div>
            </div>
        </div>

        <form method="GET" action="{{ route('admin.laporanPenjualan') }}" class="row g-3 mb-4">
            <div class="col-md-2">
                <label for="tanggal_awal" class="form-label">Tanggal Awal:</label>
                <input type="date" id="tanggal_awal" name="tanggal_awal" class="form-control" value="{{ $tanggalAwal ?? '' }}">
            </div>
            <div class="col-md-2">
                <label for="tanggal_akhir" class="form-label">Tanggal Akhir:</label>
                <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="form-control" value="{{ $tanggalAkhir ?? '' }}">
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="submit" style="background-color:#1A5F3C; color: #fff;" class="btn">Filter</button>
            </div>
            <!-- Tombol Clear -->
            <div class="col-md-1 d-flex align-items-end">
                <a href="{{ route('admin.laporanPenjualan') }}" class="btn btn-danger">Clear</a>
            </div>
        </form>

        <!-- Tombol Export ke Excel -->
        <a href="{{ route('admin.exportLaporan', ['tanggal_awal' => $tanggalAwal, 'tanggal_akhir' => $tanggalAkhir]) }}" class="btn btn-success mb-3">
            Export Excel
        </a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Transaksi</th>
                            <th>Nama Kasir</th>
                            <th>Tanggal</th>
                            <th>Detail Produk</th>
                            <th>Total Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = ($transaksi->currentPage() - 1) * $transaksi->perPage();
                        @endphp
                        @foreach ($transaksi as $trx)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $trx->id }}</td>
                            <td>{{ $trx->admin->nama }}</td>
                            <td>{{ $trx->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                <ul>
                                    @foreach ($trx->detailTransaksis as $detail)
                                        <li>
                                            {{ $detail->produk->nama_produk }} 
                                            x {{ $detail->total_barang }} 
                                            (Rp {{ number_format($detail->produk->harga, 0, ',', '.') }})
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                {{ number_format($trx->detailTransaksis->sum(function($detail) {
                                    return $detail->total_barang * $detail->produk->harga;
                                }), 0, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $transaksi->appends(['tanggal_awal' => $tanggalAwal, 'tanggal_akhir' => $tanggalAkhir])->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </section>
</div>
@endsection
