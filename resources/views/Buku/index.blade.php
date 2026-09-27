<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        td:first-child {
            text-align: center;
        }

        .info {
            margin-top: 10px;
            font-size: 16px;
        }

        .info p {
            margin: 12px 0;
        }
    </style>
</head>

<body>

    <h1>Data Buku</h1>

    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Harga</th>
                <th>Tanggal Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data_buku as $buku)
                <tr>
                    <td>{{ $buku->id }}</td>

                    <td>{{ $buku->judul }}</td>

                    <td>{{ $buku->penulis }}</td>

                    <td>
                        {{ "Rp. ".number_format($buku->harga, 2, ',', '.') }}
                    </td>

                    <td>
                        {{ $buku->tgl_terbit->format('d/m/Y') }}
                    </td>

                    <td style="text-align: center;">
                        -
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="info">
        <p>
            Jumlah Data Buku: {{ $jumlah_buku }}
        </p>

        <p>
            Total Harga Semua Buku:
            {{ "Rp. ".number_format($total_harga, 2, ',', '.') }}
        </p>
    </div>

</body>
</html>