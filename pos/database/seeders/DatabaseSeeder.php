<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            KategoriSeeder::class,
            LevelSeeder::class,
            SupplierSeeder::class,       // supplier harus duluan untuk stok
            UserSeeder::class,            // user buat relasi stok dan penjualan
            BarangSeeder::class,          // barang dibutuhkan di stok & penjualan
            StokSeeder::class,            // stok butuh barang, supplier, user
            PenjualanSeeder::class,       // penjualan butuh user
            PenjualanDetailSeeder::class, // detail butuh barang dan penjualan
        ]);
    }
}
