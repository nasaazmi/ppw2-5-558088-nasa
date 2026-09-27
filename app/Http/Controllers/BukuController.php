<?php

namespace App\Http\Controllers;

use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $data_buku = Buku::all();

        $jumlah_buku = Buku::count();

        $total_harga = Buku::sum('harga');

        return view('buku.index', compact(
            'data_buku',
            'jumlah_buku',
            'total_harga'
        ));
    }
}