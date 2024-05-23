<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimSeeder extends Seeder
{
    public function run()
    {
        DB::table('tim')->insert([
            [
                'Nama_Tim' => 'Persija Jakarta',
                'Kota_Asal' => 'Jakarta',
                'Tahun_Berdiri' => 1928,
                'Asal_Negara' => 'Indonesia',
                'ID_Kompetisi' => 1,
            ],
            [
                'Nama_Tim' => 'Arema FC',
                'Kota_Asal' => 'Malang',
                'Tahun_Berdiri' => 1987,
                'Asal_Negara' => 'Indonesia',
                'ID_Kompetisi' => 2,
            ],
            [
                'Nama_Tim' => 'Persebaya Surabaya',
                'Kota_Asal' => 'Surabaya',
                'Tahun_Berdiri' => 1927,
                'Asal_Negara' => 'Indonesia',
                'ID_Kompetisi' => 3,
            ],
            [
                'Nama_Tim' => 'Persib Bandung',
                'Kota_Asal' => 'Bandung',
                'Tahun_Berdiri' => 1933,
                'Asal_Negara' => 'Indonesia',
                'ID_Kompetisi' => 1,
            ],
            [
                'Nama_Tim' => 'PSM Makassar',
                'Kota_Asal' => 'Makassar',
                'Tahun_Berdiri' => 1970,
                'Asal_Negara' => 'Indonesia',
                'ID_Kompetisi' => 2,
            ],
            [
                'Nama_Tim' => 'Persis Solo',
                'Kota_Asal' => 'Solo',
                'Tahun_Berdiri' => 1970,
                'Asal_Negara' => 'Indonesia',
                'ID_Kompetisi' => 3,
            ],
            // Tambahkan tim lainnya sesuai kebutuhan
        ]);
    }
}

