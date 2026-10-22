<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk | Minimarket</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 35px 20px;
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f0f7ff;
            color: #24364b;
        }

        .container {
            max-width: 1050px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 28px;
        }

        h1 {
            margin: 0 0 8px;
            color: #174779;
            font-size: 28px;
        }

        .subtitle {
            margin: 0;
            color: #7890a9;
            font-size: 14px;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 10px;
            background: #347fc1;
            color: white;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
        }

        .btn:hover {
            background: #2569a8;
        }

        .alert {
            padding: 14px 18px;
            margin-bottom: 20px;
            border-radius: 10px;
            background: #e8f8ef;
            color: #207746;
        }

        .table-card {
            overflow-x: auto;
            border: 1px solid #e1ecf8;
            border-radius: 16px;
            background: white;
            box-shadow: 0 10px 30px rgba(47, 91, 135, 0.06);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 16px;
            border-bottom: 1px solid #edf2f8;
            font-size: 14px;
        }

        th {
            background: #e8f3ff;
            color: #285983;
            font-weight: 600;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #f8fbff;
        }

        .product-image {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border: 1px solid #e1ecf8;
            border-radius: 10px;
        }

        .no-image {
            display: flex;
            width: 70px;
            height: 70px;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: #f0f5fa;
            color: #91a0b1;
            font-size: 12px;
        }

        .empty {
            padding: 35px;
            color: #8192a5;
            text-align: center;
        }

        @media (max-width: 600px) {
            body {
                padding: 22px 12px;
            }

            .header {
                align-items: flex-start;
                flex-direction: column;
            }

            h1 {
                font-size: 23px;
            }

            th, td {
                padding: 12px;
            }
        }
    </style>
</head>

<body>
    <main class="container">

        <header class="header">
            <div>
                <h1>Katalog Produk</h1>
                <p class="subtitle">
                    Kelola dan pantau inventaris produk minimarket.
                </p>
            </div>

            <a href="{{ route('produk.create') }}" class="btn">
                + Tambah Produk
            </a>
        </header>

        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>SKU</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($daftarProduk as $produk)
                        <tr>
                            <td>
                                @if ($produk->image)
                                    <img
                                        src="{{ asset('storage/' . $produk->image) }}"
                                        alt="{{ $produk->name }}"
                                        class="product-image"
                                    >
                                @else
                                    <div class="no-image">No image</div>
                                @endif
                            </td>

                            <td>{{ $produk->name }}</td>
                            <td>{{ $produk->sku }}</td>
                            <td>
                                Rp {{ number_format($produk->price, 0, ',', '.') }}
                            </td>
                            <td>{{ $produk->stock }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty">
                                Belum ada produk yang tersimpan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </main>
</body>
</html>