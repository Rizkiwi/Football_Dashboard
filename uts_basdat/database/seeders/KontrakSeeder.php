<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kontrak; // Ganti Kontrak dengan nama model yang sesuai
use App\Models\Pemain; // Ganti Pemain dengan nama model pemain Anda
use Carbon\Carbon;
use Faker\Factory as Faker;

class KontrakSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $totalPemain = Pemain::count(); // Mendapatkan jumlah total pemain
        $processedPemain = [];

        for ($i = 0; $i < $totalPemain; $i++) {
            $idPemain = $i + 1;

            $mulaiKontrak = $faker->dateTimeBetween('2024-01-01', '2024-12-31')->format('Y-m-d');

            $akhirKontrak = Carbon::createFromFormat('Y-m-d', $mulaiKontrak)
                ->addMonths($faker->numberBetween(6, 60))
                ->format('Y-m-d');

            if (!in_array($idPemain, $processedPemain)) {
                Kontrak::create([
                    'Mulai_Kontrak' => $mulaiKontrak,
                    'Akhir_Kontrak' => $akhirKontrak,
                    'Harga' => $faker->numberBetween(100000000, 1000000000),
                    'Gaji' => $faker->numberBetween(50000000, 200000000),
                    'ID_Pemain' => $idPemain,
                    'Agent' => $faker->name(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $processedPemain[] = $idPemain;
            }
        }
    }
}
