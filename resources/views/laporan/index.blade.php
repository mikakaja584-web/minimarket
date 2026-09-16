<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
</head>
<body>

    <h1>Rekap Statistik Penjualan</h1>

    <p>Total Transaksi: {{ $statistik['total_transaksi'] }}</p>

    <p>Produk Terjual: {{ $statistik['total_produk_terjual'] }}</p>

    <p>Total Pendapatan:
        Rp {{ number_format($statistik['total_pendapatan'], 0, ',', '.') }}
    </p>

    <p>Produk Terlaris: {{ $statistik['produk_terlaris'] }}</p>

</body>
</html>