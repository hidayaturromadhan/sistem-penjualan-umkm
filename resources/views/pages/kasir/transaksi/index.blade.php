@extends('layouts.kasir.main')
@section('title', 'Kasir Transaksi')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kasir</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('kasir.dashboard') }}" style="color: #1A5F3C;">Dashboard</a></div>
                <div class="breadcrumb-item">kasir</div>
            </div>
        </div>
        <a href="{{ route('kasir.transaksi.create') }}" class="btn btn-icon icon-left" style="background-color: #1A5F3C; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);">
            <i class="fas fa-plus"></i> Transaksi
        </a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>Kasir</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Total Produk</th>
                        <th>Total Harga</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $no = ($transaksis->currentPage() - 1) * $transaksis->perPage();
                    @endphp
                    @forelse ($transaksis as $transaksi)
                    <tr>
                    <td>{{ ++$no}}</td>
                    <td>{{ $transaksi->id }}</td> 
                    <td>{{ $transaksi->admin->nama }}</td> <!-- Menampilkan nama kasir -->
                    <td>{{ ucfirst($transaksi->status) }}</td>
                    <td>{{ $transaksi->created_at->format('d-m-Y H:i') }}</td> <!-- Menampilkan tanggal -->
                    <td>
                        <!-- Anda bisa menampilkan total barang di sini berdasarkan detail transaksi -->
                        {{ $transaksi->detailTransaksis->sum('total_barang') }}
                    </td>
                    <td>
                        <!-- Hitung total harga dari detail transaksi -->
                        {{ $transaksi->detailTransaksis->sum(function($detail) { return $detail->total_barang * $detail->produk->harga; }) }}
                    </td>
                       
                        <td>
                            <a href="{{ route('kasir.transaksi.show', $transaksi->id) }}" class="badge">
                                <i style="color: gray;" class="fas fa-eye"></i> <!-- Ikon detail -->
                            </a>
                            <a href="{{ route('kasir.transaksi.edit', $transaksi->id) }}" class="badge">
                                <i style="color: orange;" class="fas fa-edit"></i> <!-- Ikon edit -->
                            </a>
                        </td>

                    </tr>
                    @empty
                    <td colspan="5" class="text-center">Data Kasir Kosong</td>
                    @endforelse
                </table>
                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $transaksis->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection