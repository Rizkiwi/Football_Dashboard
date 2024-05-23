<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PemainSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $timIds = DB::table('tim')->get(); // Ambil semua tim

        $posisiPemain = ['Penyerang', 'Gelandang', 'Bek', 'Kiper'];

        foreach ($timIds as $tim) {
            for ($i = 0; $i < 11; $i++) {
                DB::table('pemain')->insert([
                    'Nama_Pemain' => $faker->name,
                    'Tanggal_Lahir' => $faker->dateTimeBetween('1980-01-01', '2003-12-31')->format('Y-m-d'),
                    'Tempat_Lahir' => $tim->Kota_Asal, // Gunakan kota asal tim sebagai tempat lahir pemain
                    'Tinggi_Badan' => $faker->numberBetween(160, 200),
                    'Berat_Badan' => $faker->numberBetween(50, 100),
                    'Posisi_Pemain' => $posisiPemain[$i % 4],
                    'Nomor_Punggung' => $i + 1,
                    'ID_Tim' => $tim->ID_Tim,
                ]);
            }
        }
    }
}