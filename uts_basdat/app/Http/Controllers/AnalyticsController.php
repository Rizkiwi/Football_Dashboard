<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Charts\PemainChart;
use App\Charts\TimChart;
use App\Models\FactPeminSepakbola;


use ArielMejiaDev\LarapexCharts\LarapexChart;


class AnalyticsController extends Controller
{
    public function index(Request $request, LarapexChart $larapexChart)
    {
        $pemainChart = new PemainChart($larapexChart);
        $TimChart = new TimChart($larapexChart);

        // Mendapatkan nilai dari dropdown untuk pengurutan
        $orderBy = $request->input('order_by', 'jumlah__Gol');
        // Membangun grafik pertama berdasarkan nilai yang dipilih dari dropdown
        $chart = $pemainChart->build($orderBy);

        // Mendapatkan nilai dari dropdown untuk grup pie chart
        $groupBy = $request->input('group_by'); // Mendapatkan nilai dari dropdown 'group_by'

        // Set nilai default untuk $groupBy jika tidak ada nilainya
        $groupBy = $groupBy ?: 'Gaji'; // Ganti 'default_value' dengan nilai default yang sesuai

        $selectedOption = $request->input('Tahun'); // Ambil nilai dari dropdown atau input pengguna
        $selectedOption = $selectedOption ?: 'Usia'; // Ganti 'default_value' dengan nilai default yang sesuai

        // Membangun grafik pie berdasarkan grup yang dipilih
        $chartpie = $pemainChart->buildPieChart($groupBy);
        $chartpie2 = $pemainChart->buildAgeContractLengthPieChart($selectedOption);

        // Tim
        $MKS = $TimChart->build();
        $Asal = $TimChart->buildpie();
        $Heatmap = $TimChart->buildheatmap();

        return view('Analytics', compact('chart', 'chartpie', 'chartpie2','MKS','Asal','Heatmap'));
    }
    public function update(Request $request)
    {
        // Ambil data dari permintaan formulir
        $sumbuX = $request->input('SumbuX');
        $sumbuY = $request->input('SumbuY');

        // Query database sesuai dengan sumbu X dan Y yang dipilih
        $data = FactPeminSepakbola::select($sumbuX, $sumbuY)->get();

        // Format data ke dalam bentuk yang dapat digunakan oleh Chart.js
        $formattedData = [];
        foreach ($data as $item) {
            $formattedData[] = [
                'x' => $item->$sumbuX,
                'y' => $item->$sumbuY,
            ];
        }

        // Kembalikan data dalam format JSON
        return response()->json(['data' => $formattedData]);
    }
    
}

