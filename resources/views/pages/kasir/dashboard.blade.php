@extends('layouts.kasir.main')
@section('title', 'Kasir Dashboard')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Kasir</h1>
        </div>

        <!-- Tabel Produk Buah -->
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($buah as $item)
                        <tr>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>Rp{{ number_format($item->harga, 2, ',', '.') }}</td>
                            <td>{{ $item->stok_satuan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Tidak ada produk buah</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination -->
            {{ $buah->links('vendor.pagination.bootstrap-5') }}
        </div>


        <!-- Tabel Produk Sayur -->
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sayur as $item)
                        <tr>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->stok }}</td>
                            <td>Rp{{ number_format($item->harga, 2, ',', '.') }}</td>
                            <td>{{ $item->stok_satuan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Tidak ada produk sayur</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination -->
            {{ $sayur->links('vendor.pagination.bootstrap-5') }}
        </div>

    </section>
</div>
@endsection
