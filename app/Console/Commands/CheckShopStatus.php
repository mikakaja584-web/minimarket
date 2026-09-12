<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;

class CheckShopStatus extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'pos:status {jam?}';

    /**
     * The console command description.
     */
    protected $description = 'Mengecek status operasional Toko Kelontong POS';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $jam = $this->argument('jam') ?? 10;

        $namaKasir = $this->ask('Masukkan nama Anda: ');

        $this->info('=== STATUS TOKO KELONTONG POS ===');

        if ($jam >= 8 && $jam <= 21) {
            $this->info("Halo {$namaKasir}, Status Toko pada jam {$jam}:00 WIB adalah: BUKA");
            $this->comment('Silakan kasir bersiap di meja transaksi.');
        } else {
            $this->error("Halo {$namaKasir}, Status Toko pada jam {$jam}:00 WIB adalah: TUTUP");
            $this->warn('Akses transaksi kasir dinonaktifkan sementara.');
        }

        return Command::SUCCESS;
    }
}