<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
            'kode_barang' => 'PLT',
            'nama_barang' => 'Pilot',
            'harga_barang'=> 200,
            'deskripsi_barang' => 'Ballpoint Pilot',
            'satuan_id' => 2
            ],
            [
            'kode_barang' => 'ADES',
            'nama_barang' => 'Ades',
            'harga_barang'=> 2000,
            'deskripsi_barang' => 'Air Mineral Ades',
            'satuan_id' => 2
            ],
            
            ]);
    }
}
