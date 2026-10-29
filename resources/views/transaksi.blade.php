<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Minimarket</title>

    @vite(['resources/js/app.js'])

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
            min-height: 100vh;
        }

        .navbar {
            background: #ffffff;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e2e8f0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 20px;
            font-weight: 750;
            color: #2563eb;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #dbeafe;
            display: grid;
            place-items: center;
            font-size: 23px;
        }

        .status {
            color: #15803d;
            background: #dcfce7;
            padding: 8px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .container {
            max-width: 1100px;
            margin: 48px auto;
            padding: 0 24px;
        }

        .heading {
            margin-bottom: 28px;
        }

        .heading .label {
            color: #2563eb;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 750;
            letter-spacing: 1.5px;
            margin-bottom: 10px;
        }

        .heading h1 {
            font-size: 32px;
            margin-bottom: 10px;
            color: #0f172a;
        }

        .heading p {
            color: #64748b;
            line-height: 1.6;
        }

        .content {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 24px;
            align-items: start;
        }

        .card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 8px 30px rgba(15, 23, 42, 0.04);
        }

        .card h2 {
            font-size: 18px;
            margin-bottom: 8px;
        }

        .card-description {
            color: #64748b;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 26px;
        }

        .field-label {
            display: block;
            font-size: 13px;
            font-weight: 650;
            margin-bottom: 10px;
        }

        .input-wrapper {
            position: relative;
            margin-bottom: 8px;
        }

        .currency {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-weight: 600;
        }

        input[type="number"] {
            width: 100%;
            padding: 15px 15px 15px 52px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 17px;
            outline: none;
            transition: border 0.2s, box-shadow 0.2s;
        }

        input[type="number"]:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px #dbeafe;
        }

        .hint {
            color: #94a3b8;
            font-size: 12px;
            margin-bottom: 24px;
        }

        .btn {
            width: 100%;
            border: none;
            border-radius: 10px;
            padding: 15px;
            background: #2563eb;
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
        }

        .btn:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .summary {
            background: linear-gradient(145deg, #1d4ed8, #3b82f6);
            color: white;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 20px;
        }

        .summary .summary-label {
            font-size: 13px;
            opacity: 0.85;
            margin-bottom: 14px;
        }

        .summary .summary-icon {
            font-size: 30px;
            margin-bottom: 22px;
        }

        .summary h3 {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .summary p {
            font-size: 12px;
            line-height: 1.7;
            opacity: 0.85;
        }

        .info {
            display: flex;
            gap: 12px;
            padding: 16px;
            border-radius: 12px;
            background: #eff6ff;
            color: #1e40af;
            font-size: 12px;
            line-height: 1.7;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
            line-height: 1.6;
        }

        .success {
            color: #166534;
            background: #dcfce7;
            border: 1px solid #bbf7d0;
        }

        .error {
            color: #991b1b;
            background: #fee2e2;
            border: 1px solid #fecaca;
        }

        footer {
            text-align: center;
            padding: 28px 16px;
            color: #94a3b8;
            font-size: 12px;
        }

        @media (max-width: 700px) {
            .navbar {
                padding: 16px 20px;
            }

            .container {
                margin: 32px auto;
                padding: 0 16px;
            }

            .heading h1 {
                font-size: 26px;
            }

            .content {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 22px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="brand">
            <div class="brand-icon">🛒</div>
            <span>MiniMart<span style="color:#64748b">.</span></span>
        </div>

        <div class="status">● Sistem Lokal</div>
    </nav>

    <main class="container">
        <div class="heading">
            <div class="label">Manajemen Minimarket</div>
            <h1>Transaksi Baru</h1>
            <p>Catat transaksi dan pantau prosesnya melalui sistem minimarket.</p>
        </div>

        @if (session('success'))
            <div class="alert success">
                ✓ {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert error">
                <strong>Transaksi gagal diproses.</strong>
                <ul style="padding-left:20px; margin-top:8px">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="content">
            <section class="card">
                <h2>Informasi Transaksi</h2>
                <p class="card-description">
                    Masukkan total nominal transaksi yang akan dicatat.
                </p>

                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf

                    <label class="field-label" for="total_amount">
                        Total Pembayaran
                    </label>

                    <div class="input-wrapper">
                        <span class="currency">Rp</span>
                        <input
                            type="number"
                            id="total_amount"
                            name="total_amount"
                            min="1"
                            step="1"
                            value="{{ old('total_amount') }}"
                            placeholder="Contoh: 25000"
                            required
                        >
                    </div>

                    <p class="hint">
                        Masukkan nominal dalam rupiah tanpa tanda titik.
                    </p>

                    <button type="submit" class="btn">
                        Simpan Transaksi &rarr;
                    </button>
                </form>
            </section>

            <aside>
                <div class="summary">
                    <div class="summary-icon">📋</div>
                    <div class="summary-label">Modul Praktikum</div>
                    <h3>Event Broadcast</h3>
                    <p>
                        Acara 32 — Integrasi event dengan controller
                        dan pengujian notifikasi real-time.
                    </p>
                </div>

                <div class="info">
                    <span>ℹ️</span>
                    <p>
                        Halaman ini digunakan untuk pengujian pencatatan
                        nominal transaksi dan integrasi event Laravel.
                        Notifikasi real-time memerlukan koneksi Reverb
                        serta konfigurasi Laravel Echo yang benar.
                    </p>
                </div>
            </aside>
        </div>
    </main>

    <footer>
        MiniMart &copy; {{ date('Y') }} · Workshop Pengembangan Website
    </footer>

    @auth
        <script>
        document.addEventListener('DOMContentLoaded', function () {
            function listenForOrders() {
                if (!window.Echo) {
                    setTimeout(listenForOrders, 300);
                    return;
                }

                window.Echo.private('user.{{ auth()->id() }}')
                    .listen('.order.placed', (event) => {
                        alert(
                            `Pesanan #${event.order_id} berhasil ditempatkan!\n` +
                            `Total: Rp ${event.total}`
                        );

                        console.log('Order Placed:', event);
                    });

                console.log('Listener OrderPlaced berhasil dipasang.');
            }

            listenForOrders();
        });
        </script>
    @endauth
</body>
</html>