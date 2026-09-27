<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MencobaController;
use App\Http\Controllers\PenyakitController;

Route::get('/trying', [MencobaController::class, 'boomesport']);
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/penyakit', [PenyakitController::class, 'index']);