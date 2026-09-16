<?php

namespace App\Http\Controllers;

class LaporanPenjualanController extends Controller
{
    public function __invoke()
    {
        $statistik = [
            'total_transaksi' => 125,
            'total_produk_terjual' => 348,
            'total_pendapatan' => 15750000,
            'produk_terlaris' => 'Mie Instan',
        ];

        return view('laporan.index', compact('statistik'));
    }
}