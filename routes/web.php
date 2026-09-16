<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanPenjualanController;

Route::get('/', function () {
    return view('welcome');
});

//Routing menuju Controller
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'show']);
Route::get('/laporan', LaporanPenjualanController::class);

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