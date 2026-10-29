@extends('layouts.master')

@section('content')
@if (count($data_buku))
    <div class="alert alert-success">
        Ditemukan <strong>{{ count($data_buku) }}</strong> data dengan kata: <strong>{{ $cari }}</strong>
    </div>
    @include('buku._tabel')
@else
    <div class="alert alert-warning">
        <h5>Data "{{ $cari }}" tidak ditemukan</h5>
        <a href="{{ route('buku.index') }}" class="btn btn-warning">Kembali</a>
    </div>
@endif
@endsection