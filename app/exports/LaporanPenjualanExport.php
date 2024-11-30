<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanPenjualanExport implements FromCollection, WithHeadings, WithMapping
{
    protected $tanggalAwal;
    protected $tanggalAkhir;

    public function __construct($tanggalAwal, $tanggalAkhir)
    {
        $this->tanggalAwal = $tanggalAwal;
        $this->tanggalAkhir = $tanggalAkhir;
    }

    public function collection()
    {
        $query = Transaksi::with(['admin', 'detailTransaksis.produk'])
            ->where('status', 'selesai');

        if ($this->tanggalAwal && $this->tanggalAkhir) {
            $query->whereBetween('created_at', [$this->tanggalAwal, $this->tanggalAkhir]);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'ID Transaksi',
            'Nama Kasir',
            'Tanggal',
            'Detail Produk',
            'Total Pendapatan',
        ];
    }

    public function map($transaksi): array
    {
        $detailProduk = '';
        foreach ($transaksi->detailTransaksis as $detail) {
            $detailProduk .= $detail->produk->nama_produk . ' x ' . $detail->total_barang . ' (' . 'Rp ' . number_format($detail->produk->harga, 0, ',', '.') . ')<br>';
        }

        $totalPendapatan = $transaksi->detailTransaksis->sum(function($detail) {
            return $detail->total_barang * $detail->produk->harga;
        });

        return [
            $transaksi->id,
            $transaksi->admin->nama,
            $transaksi->created_at->format('d-m-Y H:i'),
            $detailProduk,
            'Rp ' . number_format($totalPendapatan, 0, ',', '.'),
        ];
    }
}
