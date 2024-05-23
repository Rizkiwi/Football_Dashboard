<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PertandinganSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Daftar kompetisi
        $kompetisiIds = DB::table('kompetisi')->pluck('ID_Kompetisi');

        // Daftar tim
        $teams = DB::table('tim')->get();

        foreach (range(1, 38) as $index) {
            $homeTeam = $faker->randomElement($teams);
            $awayTeam = $faker->randomElement($teams->where('ID_Kompetisi', $homeTeam->ID_Kompetisi));

            DB::table('pertandingan')->insert([
                'ID_Kompetisi' => $homeTeam->ID_Kompetisi,
                'Tanggal_Pertandingan' => $faker->dateTimeBetween('2023-01-01', '2023-12-31')->format('Y-m-d'),
                'Tim_Tuan_Rumah' => $homeTeam->ID_Tim,
                'Tim_Tamu' => $awayTeam->ID_Tim,
                'Skor_Tuan_Rumah' => $faker->numberBetween(0, 5),
                'Skor_Tamu' => $faker->numberBetween(0, 5),
                'Jumlah_Penonton' => $faker->numberBetween(1000, 50000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}