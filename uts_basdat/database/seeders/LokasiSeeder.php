<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LokasiSeeder extends Seeder
{
    public function run()
    {
        $dataKota = [
            'Malang',
            'Gianyar',
            'Banjarmasin',
            'Bekasi',
            'Samarinda',
            'South Tangerang',
            'Pamekasan',
            'Surabaya',
            'Bandung',
            'Jakarta',
            'Kediri',
            'Bogor',
            'Surakarta',
            'Tangerang',
            'Semarang',
            'Makassar',
            'Sleman'
        ];

        // Menambahkan data pada tabel negara
        DB::table('negara')->insert([
            ['nama_negara' => 'Indonesia'],
            // Tambahkan negara lainnya sesuai kebutuhan
        ]);

        // Menambahkan data pada tabel provinsi
        DB::table('provinsi')->insert([
            ['nama_provinsi' => 'DKI Jakarta', 'negara_id' => 1], // Negara ID 1 adalah Indonesia
            ['nama_provinsi' => 'Jawa Timur', 'negara_id' => 1], 
            ['nama_provinsi' => 'Jawa Barat', 'negara_id' => 1],
            ['nama_provinsi' => 'Kalimantan Selatan', 'negara_id' => 1], //4
            ['nama_provinsi' => 'Kalimantan Timur', 'negara_id' => 1],
            ['nama_provinsi' => 'Banten', 'negara_id' => 1],
            ['nama_provinsi' => 'Bali', 'negara_id' => 1], // 7
            ['nama_provinsi' => 'DKI Jakarta', 'negara_id' => 1], 
            ['nama_provinsi' => 'Jawa Tengah', 'negara_id' => 1],
            ['nama_provinsi' => 'Banten', 'negara_id' => 1], // 10
            ['nama_provinsi' => 'Sulawesi Selatan', 'negara_id' => 1],
            ['nama_provinsi' => 'DI Yogyakarta', 'negara_id' => 1], //12
        ]);

        // Menambahkan data pada tabel kota berdasarkan data kota_asal di atas
        $provinsiId = [
            2,  // Malang, Jawa Timur
            7, // Gianyar, Bali
            4,  // Banjarmasin, Kalimantan Selatan
            3,  // Bekasi, Jawa Barat
            5,  // Samarinda, Kalimantan Timur
            10, // South Tangerang, Banten
            2,  // Pamekasan, Jawa Timur
            2,  // Surabaya, Jawa Timur
            3,  // Bandung, Jawa Barat
            8,  // Jakarta, DKI Jakarta
            2,  // Kediri, Jawa Timur
            3,  // Bogor, Jawa Barat
            9, // Surakarta, Jawa Tengah
            10, // Tangerang, Banten
            9, // Semarang, Jawa Tengah
            11,  // Makassar, Sulawesi Selatan
            12  // Sleman, DI Yogyakarta
        ];

        foreach ($dataKota as $key => $namaKota) {
            DB::table('kota')->insert([
                'nama_kota' => $namaKota,
                'provinsi_id' => $provinsiId[$key],
            ]);
        }
    }
}