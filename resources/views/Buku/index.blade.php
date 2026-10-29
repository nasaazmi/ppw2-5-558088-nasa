@extends('layouts.master')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Data Buku</h4>
    <a href="{{ route('buku.create') }}" class="btn btn-primary">+ Tambah Buku</a>
</div>

<form action="{{ route('buku.search') }}" method="get" class="mb-3">
    <input type="text" name="kata" class="form-control" placeholder="Cari judul atau penulis ...">
</form>

@include('buku._tabel')
@endsection