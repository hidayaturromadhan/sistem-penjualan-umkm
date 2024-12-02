@extends('layouts.kasir.main')
@section('title', 'Kasir Edit Transaksi')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Transaksi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('kasir.dashboard') }}" style="color: #1A5F3C;">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('kasir.transaksi.index') }}" style="color: #1A5F3C;">Transaksi</a></div>
                <div class="breadcrumb-item">Edit Transaksi</div>
            </div>
        </div>

        <a href="{{ route('kasir.transaksi.index') }}" class="btn btn-icon icon-left" style="background-color: #1A5F3C; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);">Kembali</a>
        
        <div class="card mt-4">
            <form action="{{ route('kasir.transaksi.update', $transaksi->id) }}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="kasir">Kasir</label>
                                <input type="text" class="form-control" id="kasir" value="{{ Auth::user()->nama }}" disabled>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="status">Status Transaksi</label>
                                <select id="status" name="status" class="form-control" required="">
                                    <option value="pending" {{ $transaksi->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="selesai" {{ $transaksi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="dibatalkan" {{ $transaksi->status == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                                <div class="invalid-feedback">
                                    Status transaksi harus dipilih!
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form untuk produk -->
                    <div id="produk_section">
                        @foreach($transaksi->detailTransaksis as $detail)
                        <div class="row produk_row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="produk[]">Produk</label>
                                    <select name="produk[]" class="form-control" required>
                                        <option value="">Pilih Produk</option>
                                        @foreach($produks as $produk)
                                            <option value="{{ $produk->id }}" {{ $produk->id == $detail->produk_id ? 'selected' : '' }}>{{ $produk->nama_produk }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">
                                        Produk harus dipilih!
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="total_barang[]">Jumlah</label>
                                    <input type="number" name="total_barang[]" class="form-control" min="1" value="{{ $detail->total_barang }}" required>
                                    <div class="invalid-feedback">
                                        Jumlah produk harus diisi!
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <button type="button" class="btn btn-danger remove-produk" style="margin-top: 32px;">Hapus</button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <button type="button" id="add_more_produk" class="btn mt-3" style="background-color: #1A5F3C; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5); margin-right: 25px;">Tambah Produk</button>

                    <button type="submit" class="btn btn-icon icon-left mt-3" style="background-color: #1A5F3C; color: #fff; box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </section>
</div>

<script>
    document.getElementById('add_more_produk').addEventListener('click', function () {
    const produkRow = document.querySelector('.produk_row');
    const newProdukRow = produkRow.cloneNode(true);

    // Kosongkan nilai input di baris baru
    const inputs = newProdukRow.querySelectorAll('input, select');
    inputs.forEach(input => {
        if (input.tagName === 'INPUT') input.value = '';
        if (input.tagName === 'SELECT') input.selectedIndex = 0;
    });

    document.getElementById('produk_section').appendChild(newProdukRow);

    // Tambahkan event listener untuk tombol "Hapus" di baris baru
    newProdukRow.querySelector('.remove-produk').addEventListener('click', function () {
        validateAndRemoveRow(this);
    });
});

// Tambahkan event listener untuk tombol "Hapus" yang sudah ada
document.querySelectorAll('.remove-produk').forEach(button => {
    button.addEventListener('click', function () {
        validateAndRemoveRow(this);
    });
});

// Fungsi untuk validasi dan menghapus baris produk
function validateAndRemoveRow(button) {
    const produkRows = document.querySelectorAll('.produk_row');
    
    if (produkRows.length <= 1) {
        alert('Minimal harus ada satu produk!');
    } else {
        button.closest('.produk_row').remove();
    }
}

</script>
@endsection
