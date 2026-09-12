<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #999;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <h1>Daftar Produk Toko Kelontong</h1>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>SKU</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($produk as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td>{{ $item['sku'] }}</td>
                    <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                    <td>{{ $item['stok'] }}</td>
                    <td>
                        <img src="{{ $item['gambar'] }}" width="100">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>