<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $batas = 5;
        $jumlah_buku = Buku::count();
        $total_harga = Buku::sum('harga');
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);

        return view('buku.index', compact('data_buku', 'no', 'jumlah_buku', 'total_harga'));
    }

    public function search(Request $request)
    {
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul', 'like', '%' . $cari . '%')
                         ->orWhere('penulis', 'like', '%' . $cari . '%')
                         ->paginate($batas)
                         ->appends(['kata' => $cari]);
        $jumlah_buku = $data_buku->count();
        $no = $batas * ($data_buku->currentPage() - 1);

        return view('buku.search', compact('jumlah_buku', 'data_buku', 'no', 'cari'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'      => 'required|string',
            'penulis'    => 'required|string|max:30',
            'harga'      => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ]);

        $buku = new Buku();
        $buku->judul      = $request->judul;
        $buku->penulis    = $request->penulis;
        $buku->harga      = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect('/buku')->with('pesan', 'Data Buku Berhasil di Simpan');
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'      => 'required|string',
            'penulis'    => 'required|string|max:30',
            'harga'      => 'required|numeric',
            'tgl_terbit' => 'required|date'
        ]);

        $buku = Buku::find($id);
        $buku->judul      = $request->judul;
        $buku->penulis    = $request->penulis;
        $buku->harga      = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect('/buku')->with('pesan', 'Data Buku Berhasil di Update');
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect('/buku')->with('pesan', 'Data Buku Berhasil di Hapus');
    }
}