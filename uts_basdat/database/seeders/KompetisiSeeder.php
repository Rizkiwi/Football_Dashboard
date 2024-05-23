<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KompetisiSeeder extends Seeder
{
    public function run()
    {
        // Data kompetisi
        $kompetisiData = [
            [
                'Nama_Kompetisi' => 'Liga 1 Indonesia',
                'Tanggal_Mulai' => '2023-01-01',
                'Tanggal_Berakhir' => '2023-12-31',
                'Juara' => 'Persija', // Tambahkan klub juara di sini
            ],
            [
                'Nama_Kompetisi' => 'Liga 2 Indonesia',
                'Tanggal_Mulai' => '2023-01-01',
                'Tanggal_Berakhir' => '2023-12-31',
                'Juara' => 'Persib', // Tambahkan klub juara di sini
            ],
            [
                'Nama_Kompetisi' => 'Liga 3 Indonesia',
                'Tanggal_Mulai' => '2023-01-01',
                'Tanggal_Berakhir' => '2023-12-31',
                'Juara' => 'Persebaya', // Tambahkan klub juara di sini
            ],
        ];

        // Tambahkan data kompetisi
        foreach ($kompetisiData as $data) {
            DB::table('kompetisi')->insert($data);
        }
    }
}






