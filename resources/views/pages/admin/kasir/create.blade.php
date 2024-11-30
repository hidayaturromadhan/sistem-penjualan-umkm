@extends('layouts.admin.main')
@section('title', 'Admin Tambah Kasir')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard')}}" style="color: #1A5F3C; ">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.kasir') }}" style="color: #1A5F3C; ">Kasir</a></div>
                <div class="breadcrumb-item">Tambah Kasir</div>
            </div>
        </div>
        <a href="{{ route('admin.kasir') }}" style="background-color: #1A5F3C; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);" class="btn btn-icon icon-left"> Kembali</a>
        <div class="card mt-4">
            <form action="{{ route('admin.kasir.kirim') }}" class="needs-validation" novalidate=""
            enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nama">Nama Kasir</label>
                            <input id="nama" type="text" class="form-control" name="nama" required="">
                            <div class="invalid-feedback">
                                Kolom ini harus di isi!
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" type="text" class="form-control" name="username" required="">
                            <div class="invalid-feedback">
                                Kolom ini harus di isi!
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required="">
                            <div class="invalid-feedback">
                                Kolom ini harus di isi!
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" style="background-color: #1A5F3C; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);" class="btn btn-icon icon-left">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
        </form>
    </div>
</section>
</div>
@endsection