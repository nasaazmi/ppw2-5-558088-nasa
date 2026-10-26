@extends('layout.master')

@section('content')
<div class="container-tabel">

@if (count($data_buku))
    <div class="alert alert-success">Ditemukan <strong>{{ count($data_buku) }}</strong>
    data dengan kata: <strong>{{ $cari }}</strong></div>

    <h4>Data Buku</h4>

    <a href="{{ route('buku.create') }}" class="btn btn-primary float-end">Tambah Buku</a>

    <form action="{{ route('buku.search') }}" method="get">
        <input type="text" name="kata" class="form-control" placeholder="Cari ..."
               value="{{ $cari }}"
               style="width: 30%; display: inline; margin-top: 10px; margin-bottom: 10px; float: right;">
    </form>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tgl. Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_buku as $buku)
                <tr>
                    <td>{{ ++$no }}</td>
                    <td>{{ $buku->judul }}</td>
                    <td>{{ $buku->penulis }}</td>
                    <td>{{ "Rp. ".number_format($buku->harga, 0, ',', '.') }}</td>
                    <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin mau di hapus?')" type="submit"
                                    class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>{{ $data_buku->links() }}</div>
    <div><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>
@else
    <div class="alert alert-warning">
        <h4>Data {{ $cari }} tidak ditemukan</h4>
        <a href="/buku" class="btn btn-warning">Kembali</a>
    </div>
@endif

</div>
@endsection