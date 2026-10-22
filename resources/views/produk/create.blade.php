<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk | Minimarket</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f0f7ff;
            color: #24364b;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 760px;
            margin: auto;
        }

        .topbar {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 30px;
        }

        .logo {
            width: 54px;
            height: 54px;
            border-radius: 16px;
            background: #d9ecff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #2563a6;
            font-size: 26px;
        }

        .brand h1 {
            font-size: 23px;
            color: #174779;
            margin-bottom: 4px;
        }

        .brand p {
            color: #7890a9;
            font-size: 13px;
        }

        .breadcrumb {
            font-size: 13px;
            color: #7b91a8;
            margin-bottom: 20px;
        }

        .breadcrumb span {
            color: #3478bd;
            font-weight: 600;
        }

        .card {
            background: white;
            border: 1px solid #e1ecf8;
            border-radius: 22px;
            padding: 32px;
            box-shadow: 0 12px 35px rgba(47, 91, 135, 0.07);
        }

        .card-header {
            padding-bottom: 24px;
            margin-bottom: 26px;
            border-bottom: 1px solid #edf2f8;
        }

        .card-header h2 {
            font-size: 24px;
            margin-bottom: 8px;
            color: #203d5b;
        }

        .card-header p {
            font-size: 14px;
            color: #8192a5;
            line-height: 1.6;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: 1.7;
        }

        .alert-success {
            background: #e8f8ef;
            border: 1px solid #bce8cc;
            color: #207746;
        }

        .alert-error {
            background: #fff0f0;
            border: 1px solid #ffd4d4;
            color: #a83232;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        label {
            font-size: 14px;
            font-weight: 600;
            color: #344e68;
        }

        .required {
            color: #e25e6b;
        }

        input,
        textarea {
            width: 100%;
            border: 1px solid #dce6f1;
            border-radius: 11px;
            padding: 12px 14px;
            font-family: inherit;
            font-size: 14px;
            color: #24364b;
            background: #fbfdff;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus,
        textarea:focus {
            border-color: #72afea;
            box-shadow: 0 0 0 4px rgba(86, 160, 230, 0.12);
            background: white;
        }

        input[type="file"] {
            background: #f7fbff;
            border: 1px dashed #9dc3e9;
            padding: 16px;
            cursor: pointer;
        }

        input[type="file"]::file-selector-button {
            background: #e1efff;
            border: none;
            border-radius: 8px;
            padding: 9px 13px;
            margin-right: 12px;
            color: #2867a6;
            font-weight: 600;
            cursor: pointer;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .hint {
            color: #91a0b1;
            font-size: 12px;
            line-height: 1.5;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            margin-top: 30px;
            padding-top: 24px;
            border-top: 1px solid #edf2f8;
        }

        .back-link {
            color: #69839e;
            font-size: 14px;
            text-decoration: none;
        }

        .back-link:hover {
            color: #2563a6;
        }

        .btn-submit {
            border: none;
            border-radius: 11px;
            background: #347fc1;
            color: white;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            padding: 13px 22px;
            cursor: pointer;
            box-shadow: 0 5px 12px rgba(52, 127, 193, 0.2);
            transition: background 0.2s, transform 0.2s;
        }

        .btn-submit:hover {
            background: #2569a8;
            transform: translateY(-1px);
        }

        @media (max-width: 600px) {
            body {
                padding: 24px 14px;
            }

            .card {
                padding: 23px 18px;
                border-radius: 17px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }

            .card-header h2 {
                font-size: 21px;
            }

            .actions {
                align-items: stretch;
                flex-direction: column-reverse;
            }

            .btn-submit {
                width: 100%;
            }

            .back-link {
                text-align: center;
                padding: 8px;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <header class="topbar">
            <div class="logo">▦</div>

            <div class="brand">
                <h1>Minimarket</h1>
                <p>Sistem Manajemen Produk</p>
            </div>
        </header>

        <div class="breadcrumb">
            Dashboard &nbsp; / &nbsp; Produk &nbsp; / &nbsp;
            <span>Tambah Produk</span>
        </div>

        <main class="card">
            <div class="card-header">
                <h2>Tambah Produk Baru</h2>
                <p>
                    Lengkapi informasi produk yang ingin ditambahkan
                    ke inventaris minimarket.
                </p>
            </div>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <strong>Periksa kembali data berikut:</strong>
                    <ul style="padding-left: 20px; margin-top: 8px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('produk.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="form-grid">

                    <div class="form-group">
                        <label for="name">
                            Nama Produk <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Contoh: Beras Premium"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="sku">
                            Kode SKU <span class="required">*</span>
                        </label>

                        <input
                            type="text"
                            id="sku"
                            name="sku"
                            value="{{ old('sku') }}"
                            placeholder="Contoh: BR029"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="price">
                            Harga (Rp) <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            id="price"
                            name="price"
                            value="{{ old('price') }}"
                            placeholder="75000"
                            min="0"
                            step="0.01"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="stock">
                            Jumlah Stok <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            id="stock"
                            name="stock"
                            value="{{ old('stock') }}"
                            placeholder="20"
                            min="0"
                            required
                        >
                    </div>

                    <div class="form-group full-width">
                        <label for="description">Deskripsi Produk</label>

                        <textarea
                            id="description"
                            name="description"
                            placeholder="Tuliskan deskripsi produk..."
                        >{{ old('description') }}</textarea>

                        <span class="hint">
                            Deskripsi bersifat opsional.
                        </span>
                    </div>

                    <div class="form-group full-width">
                        <label for="image">Gambar Produk</label>

                        <input
                            type="file"
                            id="image"
                            name="image"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <span class="hint">
                            Format JPG, JPEG, PNG, atau WebP.
                            Ukuran maksimal 2 MB.
                        </span>
                    </div>

                </div>

                <div class="actions">
                    <a href="{{ url('/produk') }}" class="back-link">
                        ← Kembali ke katalog
                    </a>

                    <button type="submit" class="btn-submit">
                        Simpan Produk &nbsp; →
                    </button>
                </div>

            </form>
        </main>

    </div>
</body>
</html>