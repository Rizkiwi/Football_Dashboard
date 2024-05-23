<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StatistikTimSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Daftar tim
        $timIds = DB::table('tim')->pluck('ID_Tim');

        // Daftar kompetisi
        $kompetisiIds = DB::table('kompetisi')->pluck('ID_Kompetisi');

        foreach ($timIds as $timId) {
            $menang = $faker->numberBetween(0, 30);
            $seri = $faker->numberBetween(0, 20);
            $kalah = $faker->numberBetween(0, 30);
            $point = ($menang * 3) + $seri; // Hitung point berdasarkan kemenangan dan seri

            $musim = $faker->year . '-' . ($faker->year + 1); // Format musim seperti 2021-2022

            DB::table('statistik_tim')->insert([
                'ID_Tim' => $timId,
                'Point' => $point,
                'Menang' => $menang,
                'Seri' => $seri,
                'Kalah' => $kalah,
                'Gol_Memasukkan' => $faker->numberBetween(0, 80),
                'Gol_Kemasukkan' => $faker->numberBetween(0, 80),
                'Musim' => $musim,
                'ID_Kompetisi' => $faker->randomElement($kompetisiIds),
            ]);
        }
    }
}
