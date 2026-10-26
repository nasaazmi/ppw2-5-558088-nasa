@extends('layout.master')

@section('content')
<div class="container">
    <h4>Tambah Buku</h4>

    @if (count($errors) > 0)
        <ul class="alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="post" action="{{ route('buku.store') }}">
        @csrf

        <div>
            <label>Judul</label>
            <input type="text" name="judul" value="{{ old('judul') }}">
        </div>

        <div>
            <label>Penulis</label>
            <input type="text" name="penulis" value="{{ old('penulis') }}">
        </div>

        <div>
            <label>Harga</label>
            <input type="text" name="harga" value="{{ old('harga') }}">
        </div>

        <div>
            <label>Tanggal Terbit</label>
            <input type="text" id="tgl_terbit" name="tgl_terbit" class="form-control"
                   placeholder="yyyy/mm/dd" value="{{ old('tgl_terbit') }}" autocomplete="off">
            <div id="kalender"></div>
        </div>

        <button type="submit">Simpan</button>
        <a href="{{ url('/buku') }}">Kembali</a>
    </form>
</div>
@endsection