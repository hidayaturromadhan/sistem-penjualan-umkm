@extends('layouts.admin.main')
@section('title', 'Admin Edit Produk')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Produk</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}" style="color: #1A5F3C;">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.produk') }}" style="color: #1A5F3C;">Produk</a>
                </div>
                <div class="breadcrumb-item">Edit Produk</div>
            </div>
        </div>

        <a href="{{ route('admin.produk') }}"  style="background-color: #1A5F3C; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);" class="btn btn-icon icon-left">Kembali</a>

        <div class="card mt-4">
            <form action="{{ route('admin.produk.update', $dataProduk->id) }}" 
                  class="needs-validation" 
                  novalidate 
                  enctype="multipart/form-data" 
                  method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input id="nama_produk" type="text" 
                                       class="form-control" 
                                       name="nama_produk" 
                                       value="{{ old('nama_produk', $dataProduk->nama_produk) }}" 
                                       required>
                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="harga">Harga Produk</label>
                                <input id="harga" type="number" 
                                       class="form-control" 
                                       name="harga" 
                                       value="{{ old('harga', $dataProduk->harga) }}" 
                                       required>
                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input id="stok" type="number" 
                                       class="form-control" 
                                       name="stok" 
                                       value="{{ old('stok', $dataProduk->stok) }}" 
                                       required>
                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="stok_satuan">Stok Satuan</label>
                                <select name="stok_satuan" class="form-control" required>
                                    <option value="kg" {{ $dataProduk->stok_satuan == 'kg' ? 'selected' : '' }}>kg</option>
                                    <option value="g" {{ $dataProduk->stok_satuan == 'g' ? 'selected' : '' }}>g</option>
                                    <option value="buah" {{ $dataProduk->stok_satuan == 'buah' ? 'selected' : '' }}>buah</option>
                                </select>
                                <div class="invalid-feedback">
                                    Kolom ini harus diisi!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="kategori_id">Kategori</label>
                                <select name="kategori_id" class="form-control" required>
                                    @foreach ($kategoris as $item)
                                        <option value="{{ $item->id }}" 
                                            {{ $dataProduk->kategori_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Pilih kategori produk!
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input class="custom-file-input" name="image" id="customFile" type="file">
                                    <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" style="background-color: #1A5F3C; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);" class="btn btn-icon icon-left">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
