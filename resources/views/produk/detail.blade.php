<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
</head>
<body>
    <h1>Detail Produk</h1>
    <p>Anda sedang melihat detail untuk produk dengan ID: <strong>{{ $id }}</strong></p>
    <a href="{{ url('/produk') }}">Kembali ke katalog</a>
</body>
</html>