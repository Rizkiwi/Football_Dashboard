<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RiwayatTimPemainSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Daftar pemain
        $pemainIds = DB::table('pemain')->pluck('ID_Pemain');

        // Daftar tim
        $timIds = DB::table('tim')->pluck('ID_Tim');

        foreach ($pemainIds as $pemainId) {
            DB::table('riwayat_tim_pemain')->insert([
                'ID_Pemain' => $pemainId,
                'ID_Tim' => $faker->randomElement($timIds),
                'Tahun_Mulai' => $faker->numberBetween(2000, 2022),
                'Tahun_Akhir' => $faker->numberBetween(2022, 2023), // Anda bisa mengubah tahun akhir sesuai kebutuhan
            ]);
        }
    }
}
