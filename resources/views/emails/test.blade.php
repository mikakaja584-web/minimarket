<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengujian Email Laravel</title>
</head>
<body>
    <h1>Pengujian Email Laravel</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif

<form action="{{ route('email.send') }}" method="POST">
    @csrf

    <div>
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="email">Alamat Email:</label>
        <input type="email" name="email" id="email" required>
    </div>

    <button type="submit">Kirim Email</button>
</form>

</body>
</html>