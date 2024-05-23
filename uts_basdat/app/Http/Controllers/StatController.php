<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\StatistikPemain; // Sesuaikan dengan model yang digunakan
use App\Models\Pemain; // Sesuaikan dengan model yang digunakan


class StatController extends Controller
{
    public function index()
    {
       return view('/form/stat');
    }

    public function store(Request $request)
    {
        // Validasi input untuk setiap pemain
        $validatedData = $request->validate([
            'Nama.*' => 'nullable|exists:pemain,Nama_Pemain', // Validasi nama untuk setiap pemain
            'Menit_bermain.*' => 'nullable',
            'Gol.*' => 'nullable',
            'Assist.*' => 'nullable',
            'Kartu_Kuning.*' => 'nullable',
            'Kartu_merah.*' => 'nullable',
            'Penyelamatan.*' => 'nullable',
            'Clean_sheet.*' => 'nullable',
        ]);

        // Loop melalui data untuk setiap pemain
        for ($i = 0; $i < count($validatedData['Nama']); $i++) {
            $namaPemain = $validatedData['Nama'][$i];
            
            // Cari ID_Pemain berdasarkan Nama_Pemain
            $pemain = Pemain::where('Nama_Pemain', $namaPemain)->first();
            if ($pemain) {
                $ID_Pemain = $pemain->ID_Pemain;
                
                // Mencari statistik pemain berdasarkan ID_Pemain
                $statistik = StatistikPemain::where('ID_Pemain', $ID_Pemain)->first();
                
                // Buat entri baru dengan data pemain
                StatistikPemain::create([
                    'ID_Pemain' => $ID_Pemain,
                    'Menit_bermain' => $validatedData['Menit_bermain'][$i],
                    'Jumlah_Gol' => $validatedData['Gol'][$i],
                    'Jumlah_Assist' => $validatedData['Assist'][$i],
                    'Kartu_Kuning' => $validatedData['Kartu_Kuning'][$i],
                    'Kartu_Merah' => $validatedData['Kartu_merah'][$i],
                    'Penyelamatan' => $validatedData['Penyelamatan'][$i],
                    'Clean_Sheet' => $validatedData['Clean_sheet'][$i],
                    'Jumlah_Pertandingan' => $statistik ? $statistik->Jumlah_Pertandingan + 1 : 1,
                ]);
            }
                   
          
        }

        return redirect('/Match')->with('success', 'Data pemain berhasil disimpan.');
    }
    public function index2()
    {
        $topPlayers = DB::table('statistik_pemain')
            ->selectRaw('pemain.Nama_Pemain, SUM(statistik_pemain.Jumlah_Gol) as Total_Gol, SUM(statistik_pemain.Jumlah_Assist) as Total_Assist, SUM(statistik_pemain.Jumlah_Pertandingan) as Total_Pertandingan')
            ->join('pemain', 'pemain.ID_Pemain', '=', 'statistik_pemain.ID_Pemain')
            ->groupBy('pemain.Nama_Pemain')
            ->orderByDesc('Total_Gol')
            ->orderByDesc('Total_Assist')
            ->limit(1)
            ->first();
    
        $klasemen = DB::table('statistik_tim')
            ->selectRaw('Tim.Nama_Tim, COUNT(statistik_tim.ID_Tim) as T, SUM(statistik_tim.Menang) as M, SUM(statistik_tim.Seri) as S, SUM(statistik_tim.Kalah) as K, SUM(statistik_tim.Gol_Memasukkan) as GM, SUM(statistik_tim.Gol_Kemasukkan) as GK, SUM(statistik_tim.Point) as Poin')
            ->join('Tim', 'Tim.ID_Tim', '=', 'statistik_tim.ID_Tim')
            ->where('statistik_tim.Musim', '2023-2024')
            ->groupBy('Tim.Nama_Tim')
            ->orderByDesc('Poin')
            ->limit(5)
            ->get();
    
        return view('index', ['topPlayers' => $topPlayers, 'klasemen' => $klasemen]);
    }
    
    
    
    

    
    
    
}

