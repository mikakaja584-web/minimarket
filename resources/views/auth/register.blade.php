<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengguna</title>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 24px;
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #e0f2fe, #f0f9ff, #dbeafe);
        color: #1e293b;
    }

    .register-card {
        width: 100%;
        max-width: 430px;
        padding: 36px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(30, 64, 175, 0.12);
    }

    .register-header {
        text-align: center;
        margin-bottom: 28px;
    }

    .register-icon {
        width: 64px;
        height: 64px;
        margin: 0 auto 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 18px;
        background: #dbeafe;
        color: #2563eb;
        font-size: 30px;
    }

    .register-header h1 {
        font-size: 27px;
        margin-bottom: 9px;
        color: #0f172a;
    }

    .register-header p {
        font-size: 14px;
        color: #64748b;
        line-height: 1.6;
    }

    .form-group {
        margin-bottom: 19px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-size: 14px;
        font-weight: 600;
        color: #334155;
    }

    input {
        width: 100%;
        padding: 13px 14px;
        border: 1px solid #cbd5e1;
        border-radius: 10px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
    }

    .error-list {
        padding: 12px 14px;
        margin-bottom: 20px;
        border-radius: 10px;
        background: #fef2f2;
        color: #b91c1c;
        font-size: 13px;
        line-height: 1.7;
    }

    .success-message {
        padding: 12px 14px;
        margin-bottom: 20px;
        border-radius: 10px;
        background: #dcfce7;
        color: #166534;
        font-size: 14px;
    }

    .register-button {
        width: 100%;
        padding: 14px;
        margin-top: 5px;
        border: none;
        border-radius: 10px;
        background: #2563eb;
        color: white;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: background 0.2s, transform 0.2s;
    }

    .register-button:hover {
        background: #1d4ed8;
        transform: translateY(-1px);
    }

    .register-footer {
        margin-top: 22px;
        text-align: center;
        font-size: 12px;
        color: #94a3b8;
    }

    @media (max-width: 480px) {
        .register-card {
            padding: 26px 22px;
        }

        .register-header h1 {
            font-size: 24px;
        }
    }
</style>

</head>
<body>
    <main class="register-card">
        <header class="register-header">
            <div class="register-icon">&#9993;</div>
            <h1>Buat Akun</h1>
            <p>Daftarkan dirimu untuk memulai.</p>
        </header>

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error-list">
            <strong>Periksa kembali data kamu:</strong>
            <ul style="padding-left: 20px; margin-top: 6px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama lengkap</label>
            <input
                type="text"
                id="name"
                name="name"
                placeholder="Masukkan nama lengkap"
                value="{{ old('name') }}"
                autocomplete="name"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">Alamat email</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="nama@email.com"
                value="{{ old('email') }}"
                autocomplete="email"
                required
            >
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Minimal 8 karakter"
                autocomplete="new-password"
                required
            >
        </div>

        <div class="form-group">
            <label for="password_confirmation">Konfirmasi password</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Masukkan ulang password"
                autocomplete="new-password"
                required
            >
        </div>

        <button type="submit" class="register-button">
            Daftar Sekarang
        </button>
    </form>

    <footer class="register-footer">
        Registrasi Pengguna &bull; Minimarket
    </footer>
</main>

</body>
</html>