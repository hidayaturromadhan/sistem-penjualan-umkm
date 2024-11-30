@extends('layouts.kasir.main')
@section('title', 'Detail Transaksi')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Transaksi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('kasir.dashboard') }}" style="color: #1A5F3C;">Dashboard</a>
                </div>
                <div class="breadcrumb-item">
                    <a href="{{ route('kasir.transaksi.index') }}" style="color: #1A5F3C;">Transaksi</a>
                </div>
                <div class="breadcrumb-item">Detail Transaksi</div>
            </div>
        </div>
        <a href="{{ route('kasir.transaksi.index') }}"  style="background-color: #1A5F3C; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);" class="btn btn-icon icon-left">Kembali</a>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Total Produk</th>
                            <th>Stok Satuan</th>
                            <th>Harga Satuan</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksi->detailTransaksis as $detail)
                        <tr>
                            <td>{{ $detail->produk->nama_produk }}</td>
                            <td>{{ $detail->total_barang }}</td>
                            <td>{{ $detail->produk->stok_satuan }}</td>
                            <td>{{ number_format($detail->produk->harga, 0, ',', '.') }}</td>
                            <td>{{ number_format($detail->total_barang * $detail->produk->harga, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4"><strong>Total Transaksi</strong></td>
                            <td>
                                <strong>
                                    {{ number_format($transaksi->detailTransaksis->sum(function($detail) {
                                        return $detail->total_barang * $detail->produk->harga;
                                    }), 0, ',', '.') }}
                                </strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection
