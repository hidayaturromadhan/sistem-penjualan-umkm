@extends('layouts.admin.main')
@section('title', 'Admin Kasir')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kasir</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}" style="color: #1A5F3C;">Dashboard</a></div>
                <div class="breadcrumb-item">kasir</div>
            </div>
        </div>
        <a href="{{ route('admin.kasir.create') }}" class="btn btn-icon icon-left" style="background-color: #1A5F3C; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);">
            <i class="fas fa-plus"></i> Kasir
        </a>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                    @php
                        $no = 0
                    @endphp
                    @forelse ($kasirs as $item)
                    <tr>
                        <td>{{ $no += 1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->username }}</td>
                        <td>
                            <a href="{{ route('admin.kasir.edit', $item->id) }}" class="badge">
                                <i style="color: orange;" class="fas fa-edit"></i> <!-- Ikon edit -->
                            </a>
                            <a href="{{ route('admin.kasir.delete', $item->id) }}" class="badge" data-confirm-delete="true">
                                <i style="color: #B92B2B;" class="fas fa-trash-alt"></i> <!-- Ikon hapus -->
                            </a>
                        </td>
                    </tr>
                    @empty
                    <td colspan="5" class="text-center">Data Kasir Kosong</td>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</div>
@endsection