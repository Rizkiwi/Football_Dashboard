<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\FactTim; // Sesuaikan dengan nama model yang benar
use App\Models\Pertandingan; // Sesuaikan dengan nama model yang benar

class TimChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        // Ambil 10 tim teratas berdasarkan poin (Point)
        $topTeams = FactTim::orderByDesc($orderBy = 'Point')->take(10)->get();

        $teamNames = $topTeams->pluck('Nama_Tim')->toArray();
        $wins = $topTeams->pluck('Menang')->toArray();
        $draws = $topTeams->pluck('Seri')->toArray();
        $losses = $topTeams->pluck('Kalah')->toArray();

        return $this->chart->horizontalBarChart()
            ->setTitle('Top 10 Tim Berdasarkan Poin')
            ->setSubtitle('Visualisasi Menang, Seri, dan Kalah')
            ->setColors(['#4CAF50', '#FFC107', '#F44336'])
            ->addData('Menang', $wins)
            ->addData('Seri', $draws)
            ->addData('Kalah', $losses)
            ->setXAxis($teamNames);
    }
    public function buildpie()
    {
        // Ambil data klub sepak bola dari propinsi
        $clubs = FactTim::all();
        
        // Hitung proporsi nama propinsi dari klub-klub tersebut
        $provinceData = $clubs->groupBy('nama_provinsi')->map->count();

        // Ambil nama propinsi dan jumlah klub untuk chart
        $labels = $provinceData->keys()->toArray();
        $data = $provinceData->values()->toArray();
    
        return $this->chart->donutChart()
            ->setTitle('Proporsi Klub Berdasarkan Propinsi')
            ->setSubtitle('Data berdasarkan proporsi nama propinsi setiap klub')
            ->addData($data)
            ->setLabels($labels);
    }
    public function buildheatmap()
    {
        return $this->chart->heatMapChart()
            ->setTitle('Basic radar chart')
            ->addData('Sales', [80, 50, 30, 40, 100, 20])
            ->addHeat('Income', [70, 10, 80, 20, 60, 40])
            ->setMarkers(['#FFA41B', '#4F46E5'], 7, 10)
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
    
}
