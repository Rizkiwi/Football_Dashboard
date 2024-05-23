<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\FactPemainSepakBola; // Sesuaikan dengan nama model yang benar

class PemainChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($orderBy = 'jumlah__Gol')
    {
        $request = request(); // Pastikan untuk menggunakan request() jika Anda menggunakan framework Laravel

        // Ambil data top 10 dari model FactPemainSepakBola dengan orderBy yang sesuai
        $topData = FactPemainSepakBola::orderBy($orderBy, 'desc')
                        ->take(10)
                        ->get();

        // Ambil kolom yang diperlukan dari data yang diambil
        $topValues = $topData->pluck($orderBy)->toArray();
        $topLabels = $topData->pluck('Nama_Pemain')->toArray();
        $chartTitle = '';
        switch ($orderBy) {
            case 'jumlah__Gol':
                $chartTitle = 'Top 10 Pemain Pencetak Gol Terbanyak';
                break;
            case 'jumlah__Assist':
                $chartTitle = 'Top 10 Pemain Pencetak Assist Terbanyak';
                break;
            case 'jumlah_Kartu_Kuning':
                $chartTitle = 'Top 10 Pemain dengan Kartu Kuning Terbanyak';
                break;
            case 'jumlah_Kartu_Merah':
                $chartTitle = 'Top 10 Pemain dengan Kartu Merah Terbanyak';
                break;
            case 'jumlah_Penyelamatan':
                $chartTitle = 'Top 10 Pemain dengan Penyelamatan Terbanyak';
                break;
            case 'jumlah_Clean_Sheet':
                $chartTitle = 'Top 10 Pemain dengan Clean Sheet Terbanyak';
                break;
            case 'jumlah_Pertandingan':
                $chartTitle = 'Top 10 Pemain dengan Pertandingan Terbanyak';
                break;
            case 'jumlah_Tekel':
                $chartTitle = 'Top 10 Pemain dengan Tekel Terbanyak';
                break;
            // Tambahkan opsi lain sesuai kebutuhan
            default:
                $chartTitle = 'Title Default';
                break;
        }
        return $this->chart->horizontalBarChart()
            ->setTitle($chartTitle)
            ->addData(ucwords(str_replace('_', ' ', $orderBy)), $topValues)
            ->setXAxis($topLabels);
    }
    public function buildPieChart()
    {
        // Rentang gaji
        $minSalary = 100000000;
        $maxSalary = 1000000000;
        $interval = ($maxSalary - $minSalary) / 5;
    
        // Inisialisasi kategori gaji
        $categories = [];
        $startRange = $minSalary;
        for ($i = 0; $i < 5; $i++) {
            $endRange = $startRange + $interval;
            $categories[] = 'Kategori ' . ($i + 1) . ' (Rp ' . number_format($startRange, 0, ',', '.') . ' - Rp ' . number_format($endRange, 0, ',', '.') . ')';
            $startRange = $endRange + 1;
        }
    
        // Mendapatkan data pemain dari database atau menggunakan metode yang sesuai
        $players = FactPemainSepakBola::all(); // Misalnya, ambil semua data pemain dari model FactPemainSepakBola
    
        // Hitung jumlah pemain dalam setiap kategori gaji
        $playerCountByCategory = array_fill(0, 5, 0); // Array untuk menyimpan jumlah pemain dalam setiap kategori
        foreach ($players as $player) {
            $categoryIndex = min(floor(($player->Harga - $minSalary) / $interval), 4);
            $playerCountByCategory[$categoryIndex]++;
        }
    
        // Buat visualisasi pie chart
        return $this->chart->pieChart()
            ->setTitle('Jumlah Pemain dalam Kategori Gaji')
            ->setSubtitle('Berdasarkan Rentang Gaji')
            ->addData($playerCountByCategory)
            ->setLabels($categories);
    }
    
    
    

}
