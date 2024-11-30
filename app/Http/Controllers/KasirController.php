<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;

class kasirController extends Controller
{

    // Menampilkan dashboard admin kecil
    public function index()
    {
        return view('pages.kasir.dashboard');
    }
}
