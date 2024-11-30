@extends('layouts.admin.main')
@section('title', 'Admin Dashboard')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.dashboard') }}" style="color: #1A5F3C;">Dashboard</a>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Card 1: Total Admin -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Admin</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalAdmin }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2: Total Kasir -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Kasir</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalKasir }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 3: Total Produk -->
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Produk</h4>
                        </div>
                        <div class="card-body">
                            {{ $produks }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Grafik Penjualan -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Penjualan Per Tahun 2024</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="penjualanChart" width="600" height="auto"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    // Pastikan data bulan dan total penjualan diterima dengan format yang benar
    var bulan = @json($labels); // Array bulan (1-12)
    var totalPenjualan = @json($data); // Data total penjualan per bulan

    var bulanNama = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    // Membuat grafik dengan Chart.js
    var ctx = document.getElementById('penjualanChart').getContext('2d');
    var penjualanChart = new Chart(ctx, {
        type: 'line', // Mengubah tipe grafik menjadi line (garis)
        data: {
            labels: bulan.map(function(b) { // Mengonversi angka bulan menjadi nama bulan
                return bulanNama[b - 1]; // Mapping bulan (1-12) ke nama bulan
            }),
            datasets: [{
                label: 'Total Pendapatan',
                data: totalPenjualan, // Data total penjualan untuk setiap bulan
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna area grafik
                borderColor: 'rgba(75, 192, 192, 1)', // Warna garis grafik
                borderWidth: 2, // Ketebalan garis
                fill: true, // Mengisi area di bawah garis dengan warna
                tension: 0.3 // Memperhalus garis dengan pengaturan kelengkungan
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Bulan' // Judul untuk sumbu X
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Total Pendapatan' // Judul untuk sumbu Y
                    },
                    beginAtZero: true, // Memulai sumbu Y dari 0
                    ticks: {
                        callback: function(value) { // Format angka dengan pemisah ribuan
                            return value.toLocaleString(); 
                        }
                    }
                }
            }
        }
    });
</script>

@endsection
