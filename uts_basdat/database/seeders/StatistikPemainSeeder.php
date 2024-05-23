<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StatistikPemainSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Daftar pemain
        $pemainIds = DB::table('pemain')->pluck('ID_Pemain');

        foreach ($pemainIds as $pemainId) {
            $posisiPemain = DB::table('pemain')->where('ID_Pemain', $pemainId)->value('Posisi_Pemain');

            if ($posisiPemain == 'Kiper') {
                $jumlahGol = $faker->numberBetween(0, 2);
                $jumlahAssist = $faker->numberBetween(0, 2);
                $cleanSheet = $faker->numberBetween(0, 1);
                $penyelamatan = $faker->numberBetween(5, 20);
                $kartuKuning = $faker->numberBetween(0, 2);
                $tekel = 0;
            } else {
                $jumlahGol = 0;
                $jumlahAssist = 0;
                $cleanSheet = 0;
                $penyelamatan = 0;
                $tekel = $faker->numberBetween(0, 10);
                $kartuKuning = $faker->numberBetween(0, 2);
            }

            DB::table('statistik_pemain')->insert([
                'ID_Pemain' => $pemainId,
                'Menit_bermain' => $faker->numberBetween(0, 90), // Menit bermain antara 0 hingga 90 menit
                'Jumlah_Gol' => $jumlahGol,
                'Jumlah_Assist' => $jumlahAssist,
                'Kartu_Kuning' => $kartuKuning,
                'Kartu_Merah' => ($kartuKuning == 2) ? 1 : $faker->numberBetween(0, 1),
                'Penyelamatan' => $penyelamatan,
                'Clean_Sheet' => $cleanSheet,
                'Tekel' => $tekel,
                'Jumlah_Pertandingan' => $faker->numberBetween(1, 1), // Jumlah pertandingan antara 1 hingga 50 pertandingan
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
