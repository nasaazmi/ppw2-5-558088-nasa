<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;

class PenyakitController extends Controller
{
    public function index()
    {
        $nama_penyakit = request('nama_penyakit');
        $search = request('search');

        if ($search) {
            $data_penyakit = Penyakit::where(
                'nama_penyakit',
                'like',
                '%' . $search . '%'
            )->get();
        }

        elseif ($nama_penyakit) {
            $data_penyakit = Penyakit::where(
                'nama_penyakit',
                $nama_penyakit
            )->get();
        }

        else {
            $data_penyakit = Penyakit::orderBy(
                'tanggal_data',
                'desc'
            )->take(5)->get();
        }

        $daftar_penyakit = Penyakit::select('nama_penyakit')
            ->distinct()
            ->orderBy('nama_penyakit')
            ->get();

        $jumlah_data = Penyakit::count();
        $total_kasus = Penyakit::sum('jumlah_kasus');
        $kasus_tertinggi = Penyakit::max('jumlah_kasus');
        $kasus_terendah = Penyakit::min('jumlah_kasus');

        return view('penyakit.index', compact(
            'data_penyakit',
            'daftar_penyakit',
            'nama_penyakit',
            'search',
            'jumlah_data',
            'total_kasus',
            'kasus_tertinggi',
            'kasus_terendah'
        ));
    }
}