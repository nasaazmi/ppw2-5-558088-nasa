@extends('layouts.master')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card shadow-sm">
            <div class="card-header bg-white"><h5 class="mb-0">Edit Buku</h5></div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('buku.store') }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" value="{{ $buku->judul }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" name="penulis" class="form-control" value="{{ $buku->penulis }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Harga</label>
                        <input type="text" name="harga" class="form-control" value="{{ $buku->harga }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tanggal Terbit</label>
                        <input type="text" id="tgl_terbit" name="tgl_terbit" class="form-control"
                               placeholder="yyyy/mm/dd" value="{{ $buku->tgl_terbit->format('Y/m/d') }}" autocomplete="off">
                        <div id="kalender"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('buku.update', $buku->id) }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection