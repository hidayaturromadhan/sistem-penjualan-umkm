<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File; 
use Illuminate\Http\Request;
use DB;

class ProdukController extends Controller
{
    public function index()
    {
        $dataProduk = DB::table('produks')
            ->join('kategoris', 'produks.kategori_id', '=', 'kategoris.id')
            ->select('produks.*', 'kategoris.nama_kategori')
            ->paginate(3); // Set pagination to 10 items per page

        confirmDelete('Hapus Data!', 'Apakah anda yakin ingin menghapus data ini?');
        return view('pages.admin.produk.index', compact('dataProduk'));
    }



    public function create()
    {
        $kategoris = Kategori::all();
        return view('pages.admin.produk.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validasi gambar
            'kategori_id' => 'required|exists:kategoris,id',
            'stok_satuan' => 'required|in:kg,g,buah',
        ]);
        
        // Simpan gambar jika di-upload
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
        } else {
            // Jika gambar tidak di-upload, pakai gambar lama
            $imageName = $dataProduk->gambar;
        }

        $produk = Produk::create([
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'stok_satuan' => $request->stok_satuan,
            'kategori_id' => $request->kategori_id,
            'gambar' => $imageName,
        ]);

        if ($produk) {
            Alert::success('Berhasil!', 'Produk berhasil ditambahkan!');
            return redirect()->route('admin.produk');
        } else {
            Alert::error('Gagal!', 'Produk gagal ditambahkan!');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $dataProduk = Produk::findOrFail($id);
        $kategoris = Kategori::all();
        return view('pages.admin.produk.edit', compact('dataProduk', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|string|max:100',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // validasi gambar
            'kategori_id' => 'required|exists:kategoris,id',
            'stok_satuan' => 'required|in:kg,g,buah',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal!', 'Pastikan semua terisi dengan benar!');
            return redirect()->back();
        }

        $dataProduk = Produk::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $oldPath = public_path('images/' . $dataProduk->gambar);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $gambar = $request->file('gambar');
            $imageName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('images/', $imageName);
        } else {
            $imageName = $dataProduk->gambar;
        }

        $dataProduk->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,
            'stok_satuan' => $request->stok_satuan,
            'gambar' => $imageName,
        ]);

        if ($dataProduk) {
            Alert::success('Berhasil!', 'Produk berhasil diperbarui');
            return redirect()->route('admin.produk');
        } else {
            Alert::error('Gagal!', 'Produk gagal diperbarui');
            return redirect()->back();        
        }
    }

    public function delete($id)
    {
        $dataProduk = Produk::findOrFail($id);
        $dataProduk->delete();
        if ($dataProduk) {
            Alert::success('Berhasil!', 'Produk berhasil dihapus');
            return redirect()->back();
        } else {
            Alert::error('Gagal!', 'Produk gagal dihapus');
            return redirect()->back();
        }
    }
}


