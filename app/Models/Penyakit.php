<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakit';

    protected $fillable = [
        'nama_penyakit',
        'provinsi',
        'kabupaten',
        'jumlah_kasus',
        'tanggal_data',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'tanggal_data' => 'date',
    ];
}