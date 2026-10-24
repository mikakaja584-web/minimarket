<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Preview Gambar</title>
</head>
<body>
    <h2>Menampilkan Gambar Langsung di Browser</h2>

    <form action="{{ route('produk.previewImage') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Tampilkan Gambar</button>
    </form>
</body>
</html>