@extends('layouts.admin.main')
@section('title', 'Admin Product')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}" style="color: #1A5F3C;">Dashboard</a></div>
                <div class="breadcrumb-item">Produk</div>
            </div>
        </div>
        <a href="{{ route('admin.produk.create')}}" class="btn btn-icon icon-left"  style="background-color: #1A5F3C; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);"><i class="fas fa-plus"></i> Produk</a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga Produk</th>
                        <th>Satuan</th>
                        <th>Gambar</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $no = ($dataProduk->currentPage() - 1) * $dataProduk->perPage();
                    @endphp
                    @forelse ($dataProduk as $item)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->nama_kategori }}</td>
                        <td>{{ $item->stok }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $item->stok_satuan }}</td>
                        <td>
                            <img src="{{ asset('images/' . $item->gambar) }}" alt="{{ $item->nama_produk }}" width="100" height="100">
                        </td>
                        <td>
                            <a href="{{ route('admin.produk.edit', $item->id) }}" class="badge">
                                <i style="color: orange;" class="fas fa-edit"></i> <!-- Ikon edit -->
                            </a>
                            <a href="{{ route('admin.produk.delete', $item->id) }}" class="badge" data-confirm-delete="true">
                                <i style="color: #B92B2B;" class="fas fa-trash-alt"></i> <!-- Ikon hapus -->
                            </a>
                        </td>
                    </tr>
                    @empty
                    <td colspan="8" class="text-center">Data Produk Kosong</td>
                    @endforelse
                </table>

                <!-- Pagination Links -->
                <div class="d-flex justify-content-center">
                    {{ $dataProduk->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
