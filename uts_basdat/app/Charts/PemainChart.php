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
    public function buildPieChart($groupBy)
    {
        // Rentang berdasarkan pilihan grup
        if ($groupBy === 'Harga') {
            $minValue = 100000000;
            $maxValue = 1000000000;
        } elseif ($groupBy === 'Gaji') {
            $minValue = 50000000;
            $maxValue = 200000000;
        } else {
            // Kondisi default jika tidak ada pilihan yang valid
            return null; // Atau berikan respons error
        }
    
        $interval = ($maxValue - $minValue) / 5;
    
        // Inisialisasi kategori
        $categories = [];
        $startRange = $minValue;
        for ($i = 0; $i < 5; $i++) {
            $endRange = $startRange + $interval;
            $categories[] = 'Kategori ' . ($i + 1) . ' (Rp ' . number_format($startRange, 0, ',', '.') . ' - Rp ' . number_format($endRange, 0, ',', '.') . ')';
            $startRange = $endRange + 1;
        }
    
        // Mendapatkan data pemain dari database atau menggunakan metode yang sesuai
        $players = FactPemainSepakBola::all(); // Misalnya, ambil semua data pemain dari model FactPemainSepakBola
    
        // Hitung jumlah pemain dalam setiap kategori
        $playerCountByCategory = array_fill(0, 5, 0); // Array untuk menyimpan jumlah pemain dalam setiap kategori
        foreach ($players as $player) {
            $value = ($groupBy === 'Harga') ? $player->Harga : $player->Gaji;
            $categoryIndex = min(floor(($value - $minValue) / $interval), 4);
            $playerCountByCategory[$categoryIndex]++;
        }
        $blueColors = ['#6495ED', '#4169E1', '#0000FF', '#0000CD', '#00008B'];

        // Buat visualisasi pie chart
        return $this->chart->pieChart()
            ->setTitle('Jumlah Pemain dalam Kategori ' . $groupBy)
            ->setSubtitle('Berdasarkan Rentang ' . $groupBy)
            ->addData($playerCountByCategory)
            ->setLabels($categories)
            ->setColors($blueColors); // Atur skema warna gradasi biru untuk kategori

    }
    public function buildAgeContractLengthPieChart($selectedOption)
    {
        // Rentang usia
        $minAge = 20; // Usia minimum
        $maxAge = 43;  // Usia maksimum
        $intervalAge = ($maxAge - $minAge) / 4;
    
        // Rentang panjang kontrak dalam bulan
        $minContractLength = 0; // Misalnya, kontrak minimal adalah 1 tahun (12 bulan)
        $maxContractLength = 60; // Misalnya, kontrak maksimal adalah 5 tahun (60 bulan)
        $intervalContractLength = ($maxContractLength - $minContractLength) / 4;
    
        // Inisialisasi kategori usia dan kategori panjang kontrak
        $ageCategories = [];
        $contractLengthCategories = [];
    
        $startRange = $minAge;
        for ($i = 0; $i < 5; $i++) {
            $endRange = $startRange + $intervalAge - 1; // Akhiri rentang sebelum menambahkan 1
            $ageCategories[] = 'Kategori Usia ' . ($i + 1) . ' (' . $startRange . ' - ' . $endRange . ' Tahun)';
            $startRange = $endRange + 0.01; // Tambah 1 untuk memulai rentang berikutnya
        }
        $startContractRange = $minContractLength;
        for ($j = 0; $j < 5; $j++) {
            $endContractRange = $startContractRange + $intervalContractLength;
            $contractLengthCategories[] = 'Kategori Kontrak ' . ($j + 1) . ' (' . $startContractRange . ' - ' . $endContractRange . ' Bulan)';
            $startContractRange = $endContractRange + 0.01;
        }
        // Mendapatkan data pemain dari database atau menggunakan metode yang sesuai
        $players = FactPemainSepakBola::all(); // Ubah sesuai dengan model dan kolom pada aplikasi Anda
    
        // Hitung jumlah pemain dalam setiap kategori usia dan kategori panjang kontrak
        $playerCountByAgeCategory = array_fill(0, 5, 0);
        $playerCountByContractLengthCategory = array_fill(0, 5, 0);
    
        foreach ($players as $player) {
            $age = $player->Usia; // Ubah sesuai dengan kolom usia pada model Anda
            
            // Menggabungkan tahun dan bulan kontrak menjadi total bulan
            $currentYear = date('Y'); // Tahun sekarang
            $lastContractYear = $player->Tahun; // Tahun terakhir kontrak pada data
            $lastContractMonth = $player->Bulan; // Tahun terakhir kontrak pada data

            $contractLengthInMonths = ($lastContractYear - $currentYear) * 12 + $lastContractMonth; // Kurangi satu dari bulan sekarang karena belum selesai bulan ini
    
            $ageIndex = min(floor(($age - $minAge) / $intervalAge), 4);
            $contractLengthIndex = min(floor(($contractLengthInMonths - $minContractLength) / $intervalContractLength), 4);

            $playerCountByAgeCategory[$ageIndex]++;
            $playerCountByContractLengthCategory[$contractLengthIndex]++;
        }
    
        // Inisialisasi chart berdasarkan pilihan pengguna
        $chart = $this->chart->pieChart();
        $greenColors = ['#98FB98', '#3CB371', '#2E8B57', '#228B22', '#006400'];

        if ($selectedOption === 'age') {
            // Buat visualisasi pie chart untuk kategori usia
            $chart->setTitle('Distribusi Usia Pemain')
                ->setSubtitle('Berdasarkan Rentang Usia')
                ->addData($playerCountByAgeCategory)
                ->setLabels($ageCategories)
                ->setColors($greenColors);
        } elseif ($selectedOption === 'contract') {
            // Buat visualisasi pie chart untuk kategori panjang kontrak
            $chart->setTitle('Distribusi Panjang Kontrak Pemain (dalam bulan)')
                ->setSubtitle('Berdasarkan Rentang Panjang Kontrak')
                ->addData($playerCountByContractLengthCategory)
                ->setLabels($contractLengthCategories)
                ->setColors($greenColors);
        } else {
            $chart->setTitle('Distribusi Usia Pemain')
            ->setSubtitle('Berdasarkan Rentang Usia')
            ->addData($playerCountByAgeCategory)
            ->setLabels($ageCategories)
            ->setColors($greenColors);
        }
    
        return $chart; // Mengembalikan chart berdasarkan pilihan pengguna
    }
    

}
