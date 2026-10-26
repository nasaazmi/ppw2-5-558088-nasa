<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MencobaController;
use App\Http\Controllers\PenyakitController;

Route::get('/trying', [MencobaController::class, 'boomesport']);
Route::get('/penyakit', [PenyakitController::class, 'index']);
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
