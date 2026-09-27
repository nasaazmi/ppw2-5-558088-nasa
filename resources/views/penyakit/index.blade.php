<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Persebaran Penyakit</title>
</head>

<body>

    <h1>Data Persebaran Penyakit</h1>

    {{-- Form Search --}}
    <form action="/penyakit" method="GET">
        <label for="search">Cari Nama Penyakit:</label>

        <input
            type="text"
            name="search"
            id="search"
            value="{{ $search }}"
            placeholder="Masukkan nama penyakit"
        >

        <button type="submit">Cari</button>
    </form>

    <br>

    {{-- Form Filter --}}
    <form action="/penyakit" method="GET">
        <label for="nama_penyakit">Pilih Penyakit:</label>

        <select name="nama_penyakit" id="nama_penyakit">
            <option value="">Semua Penyakit</option>

            @foreach($daftar_penyakit as $penyakit)
                <option
                    value="{{ $penyakit->nama_penyakit }}"
                    {{ $nama_penyakit == $penyakit->nama_penyakit ? 'selected' : '' }}
                >
                    {{ $penyakit->nama_penyakit }}
                </option>
            @endforeach
        </select>

        <button type="submit">Filter</button>
    </form>

    <br>

    {{-- Tabel Data Penyakit --}}
    <table border="1" cellpadding="10" cellspacing="0">

        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penyakit</th>
                <th>Provinsi</th>
                <th>Kabupaten</th>
                <th>Jumlah Kasus</th>
                <th>Tanggal Data</th>
                <th>Latitude</th>
                <th>Longitude</th>
            </tr>
        </thead>

        <tbody>

            @if($data_penyakit->count() > 0)

                @foreach($data_penyakit as $penyakit)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $penyakit->nama_penyakit }}</td>
                        <td>{{ $penyakit->provinsi }}</td>
                        <td>{{ $penyakit->kabupaten }}</td>
                        <td>{{ $penyakit->jumlah_kasus }}</td>
                        <td>{{ $penyakit->tanggal_data->format('d/m/Y') }}</td>
                        <td>{{ $penyakit->latitude }}</td>
                        <td>{{ $penyakit->longitude }}</td>
                    </tr>
                @endforeach

            @else

                <tr>
                    <td colspan="8" style="text-align: center;">
                        Data penyakit tidak ditemukan.
                    </td>
                </tr>

            @endif

        </tbody>

    </table>

    {{-- Statistik --}}
    <div style="margin-top: 20px;">

        <h3>Statistik Data Penyakit</h3>

        <p>
            <strong>Total Data Penyakit:</strong>
            {{ $jumlah_data }}
        </p>

        <p>
            <strong>Total Jumlah Kasus:</strong>
            {{ number_format($total_kasus, 0, ',', '.') }} kasus
        </p>

        <p>
            <strong>Jumlah Kasus Tertinggi:</strong>
            {{ number_format($kasus_tertinggi, 0, ',', '.') }} kasus
        </p>

        <p>
            <strong>Jumlah Kasus Terendah:</strong>
            {{ number_format($kasus_terendah, 0, ',', '.') }} kasus
        </p>

    </div>

</body>
</html>