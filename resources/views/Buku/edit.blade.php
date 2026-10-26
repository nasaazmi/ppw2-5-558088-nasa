@extends('layout.master')

@section('content')
<div class="container">
    <h4>Edit Buku</h4>

    @if (count($errors) > 0)
        <ul class="alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="post" action="{{ route('buku.update', $buku->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}">
        </div>

        <div>
            <label>Penulis</label>
            <input type="text" name="penulis" value="{{ old('penulis', $buku->penulis) }}">
        </div>

        <div>
            <label>Harga</label>
            <input type="text" name="harga" value="{{ old('harga', $buku->harga) }}">
        </div>

        <div>
            <label>Tanggal Terbit</label>
            <input type="text" id="tgl_terbit" name="tgl_terbit" class="form-control"
                   placeholder="yyyy/mm/dd" autocomplete="off"
                   value="{{ old('tgl_terbit', $buku->tgl_terbit->format('Y/m/d')) }}">
            <div id="kalender"></div>
        </div>

        <button type="submit">Update</button>
        <a href="{{ url('/buku') }}">Kembali</a>
    </form>
</div>
@endsection