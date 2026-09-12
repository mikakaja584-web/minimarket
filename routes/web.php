<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard_pos', [
        'nama_pegawai' => 'Budi Santoso',
        'shift' => 'Pagi (08:00 - 15:00)'
    ]);
});

Route::get('/produk/{id}', function ($id) {
    return 'Menampilkan data produk dengan ID: ' . $id;
});

Route::get('/produk/cari/{nama?}', function ($nama = null) {
    if ($nama) {
        return 'Hasil pencarian produk: ' . $nama;
    }
    return 'Silakan masukkan kata kunci pencarian pada URL
    (contoh: /produk/cari/sabun)';
});

Route::prefix('admin')->group(function () {
    Route::get('/produk', function () {
        return 'Halaman Kelola Produk (Hanya Admin)';
    })->name('admin.produk');

    Route::get('/kategori', function () {
        return 'Halaman Kelola Kategori Produk (Hanya Admin)';
    })->name('admin.kategori');
});

Route::prefix('kasir')->group(function () {
    Route::get('/transaksi', function () {
        return 'Halaman Input Transaksi Penjualan (Kasir)';
    })->name('kasir.transaksi');
});

Route::get('/produk-toko', function () {
    $produk = [
        [
            'nama' => 'Beras',
            'sku' => 'BR001',
            'harga' => 75000,
            'stok' => 20,
            'gambar' => asset('images/beras.jpeg')
        ],
        [
            'nama' => 'Minyak Goreng',
            'sku' => 'MG001',
            'harga' => 18000,
            'stok' => 30,
            'gambar' => asset('images/minyak.jpeg')
        ],
        [
            'nama' => 'Gula',
            'sku' => 'GL001',
            'harga' => 16000,
            'stok' => 25,
            'gambar' => asset('images/gula.jpeg')
        ],
    ];

    return view('daftar_produk', [
        'produk' => $produk
    ]);
});