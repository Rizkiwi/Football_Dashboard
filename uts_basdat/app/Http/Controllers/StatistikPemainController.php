<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Statistik;

class StatistikPemainController extends Controller
{
    public function indexSorting()
    {
        $data = [
            'statistic' => Statistik::sortable()->paginate(10)->onEachSide(2)->fragment('statistic'),
        ];
        return view('Statistics', $data);
    }

    public function Statistics(Request $request)
    {   
        $minWeight = $request->input('minWeight');
        $maxWeight = $request->input('maxWeight');

        $minAge = $request->input('minAge');
        $maxAge = $request->input('maxAge');
        
        $minHeight = $request->input('minHeight');
        $maxHeight = $request->input('maxHeight');

        $selectedPosition = $request->input('position'); 

        $minGol = $request->input('minGol');
        $maxGol = $request->input('maxGol');

        $minAssist = $request->input('minAssist');
        $maxAssist = $request->input('maxAssist');

        $minTekel = $request->input('minTekel');
        $maxTekel = $request->input('maxTekel');

        $minSaves = $request->input('minSaves');
        $maxSaves = $request->input('maxSaves');

        $minCleanSheets = $request->input('minCleanSheets');
        $maxCleanSheets = $request->input('maxCleanSheets');

        $query = DB::table('pemain')
            ->select(
                'pemain.ID_Pemain',
                'pemain.Nama_Pemain',
                DB::raw('YEAR(NOW()) - YEAR(pemain.Tanggal_Lahir) as Usia'), // Calculate age here
                'pemain.Tinggi_Badan',
                'pemain.Berat_Badan',
                'pemain.Posisi_Pemain',
                'statistik_pemain_total.Jumlah_Gol',
                'statistik_pemain_total.Jumlah_Assist',
                'statistik_pemain_total.Tekel',
                'statistik_pemain_total.Penyelamatan',
                'statistik_pemain_total.Clean_Sheet'
            )
            ->join('statistik_pemain_total', 'pemain.ID_Pemain', '=', 'statistik_pemain_total.ID_Pemain');
    
        if ($minAge) {
            $query->whereRaw("YEAR(NOW()) - YEAR(pemain.Tanggal_Lahir) >= ?", [$minAge]);
        }
    
        if ($maxAge) {
            $query->whereRaw("YEAR(NOW()) - YEAR(pemain.Tanggal_Lahir) <= ?", [$maxAge]);
        }

        if ($minHeight) {
            $query->whereRaw("(pemain.Tinggi_Badan) >= ?", [$minHeight]);
        }
    
        if ($maxHeight) {
            $query->whereRaw("(pemain.Tinggi_Badan) <= ?", [$maxHeight]);
        }
    
        if ($minWeight) {
            $query->whereRaw("(pemain.Berat_Badan) >= ?", [$minWeight]);
        }
    
        if ($maxWeight) {
            $query->whereRaw("(pemain.Berat_Badan) <= ?", [$maxWeight]);
        }

        if ($selectedPosition) {
            // Menambahkan kondisi untuk memfilter berdasarkan Posisi
            $query->where('pemain.Posisi_Pemain', $selectedPosition);
        }

        if ($minGol) {
            $query->whereRaw("(statistik_pemain_total.Jumlah_Gol) >= ?", [$minGol]);
        }
    
        if ($maxGol) {
            $query->whereRaw("(statistik_pemain_total.Jumlah_Gol) <= ?", [$maxGol]);
        }

        if ($minAssist) {
            $query->whereRaw("(statistik_pemain_total.Jumlah_Assist) >= ?", [$minAssist]);
        }
    
        if ($maxAssist) {
            $query->whereRaw("(statistik_pemain_total.Jumlah_Assist) <= ?", [$maxAssist]);
        }
        if ($minTekel) {
            $query->whereRaw("(statistik_pemain_total.Tekel) >= ?", [$minTekel]);
        }
    
        if ($maxTekel) {
            $query->whereRaw("(statistik_pemain_total.Tekel) <= ?", [$maxTekel]);
        }

        if ($minSaves) {
            $query->whereRaw("(statistik_pemain_total.Penyelamatan) >= ?", [$minSaves]);
        }
    
        if ($maxSaves) {
            $query->whereRaw("(statistik_pemain_total.Penyelamatan) <= ?", [$maxSaves]);
        }

        if ($minCleanSheets) {
            $query->whereRaw("(statistik_pemain_total.Clean_Sheet) >= ?", [$minCleanSheets]);
        }
    
        if ($maxCleanSheets) {
            $query->whereRaw("(statistik_pemain_total.Clean_Sheet) <= ?", [$maxCleanSheets]);
        }
        $statistics = $query->paginate(20); // Mengganti 10 dengan jumlah item per halaman yang Anda inginkan
    
        return view('Statistics', ['statistics' => $statistics]);
    }

}