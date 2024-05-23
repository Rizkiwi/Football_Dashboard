<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pertandingan; // Sesuaikan dengan model yang digunakan
use App\Models\Kompetisi; // Sesuaikan dengan model yang digunakan
use App\Models\Tim; // Sesuaikan dengan model yang digunakan
use App\Models\Stat_tim; // Sesuaikan dengan model yang digunakan

class MatchController extends Controller
{
    public function index()
    {   
        $kompetisiList = Kompetisi::all(); // Mengambil semua data kompetisi dari database
        $timList = Tim::all();
        return view('/form/Match', ['kompetisiList' => $kompetisiList, 'timList' => $timList]);
    }

    public function submitForm(Request $request)
    {   
        // Ambil input dari request sesuai dengan nama yang sesuai
        $kompetisi = $request->input('kompetisi');
        $tanggal = $request->input('tanggal');
        $jumlahPenonton = $request->input('jumlahPenonton');
        $tuanRumah = $request->input('TimTuanRumah'); // Pastikan nama atribut sesuai
        $skorTuanRumah = $request->input('skorTuanRumah');
        $tamu = $request->input('timTamu'); // Pastikan nama atribut sesuai
        $skorTamu = $request->input('skorTamu');
    
        // Ekstrak tahun dari tanggal
        $tahun = date('Y', strtotime($tanggal));

        // Hitung musim berdasarkan tahun
        $musim = $tahun . '-' . ($tahun + 1);
    
        // Simpan data ke dalam model Pertandingan
        Pertandingan::create([
            'ID_Kompetisi' => $kompetisi,
            'Tanggal_Pertandingan' => $tanggal,
            'Jumlah_Penonton' => $jumlahPenonton,
            'Tim_Tuan_Rumah' => $tuanRumah,
            'Skor_Tuan_Rumah' => $skorTuanRumah,
            'Tim_Tamu' => $tamu,
            'Skor_Tamu' => $skorTamu,
        ]);
         // Hitung hasil pertandingan
        if ($skorTuanRumah > $skorTamu) {
            $hasilPertandingan = 'menang_tuan_rumah';
        } elseif ($skorTamu > $skorTuanRumah) {
            $hasilPertandingan = 'menang_tamu';
        } else {
            $hasilPertandingan = 'seri';
        }
            
        // Simpan hasil pertandingan ke dalam tabel statistik_tim untuk tim tuan rumah
        Stat_tim::create([
            'ID_Tim' => $tuanRumah,
            'ID_Kompetisi' => $kompetisi,
            'Point' => ($hasilPertandingan === 'menang_tuan_rumah') ? 3 : (($hasilPertandingan === 'seri') ? 1 : 0),
            'Menang' => ($hasilPertandingan === 'menang_tuan_rumah') ? 1 : 0,
            'Seri' => ($hasilPertandingan === 'seri') ? 1 : 0,
            'Kalah' => ($hasilPertandingan === 'menang_tamu') ? 1 : 0,
            'Gol_Memasukkan' => $skorTuanRumah,
            'Gol_Kemasukkan' => $skorTamu,
            'Musim' => $musim,
        ]);

        // Simpan hasil pertandingan ke dalam tabel statistik_tim untuk tim tamu
        Stat_tim::create([
            'ID_Tim' => $tamu,
            'ID_Kompetisi' => $kompetisi,
            'Point' => ($hasilPertandingan === 'menang_tamu') ? 3 : (($hasilPertandingan === 'seri') ? 1 : 0),
            'Menang' => ($hasilPertandingan === 'menang_tamu') ? 1 : 0,
            'Seri' => ($hasilPertandingan === 'seri') ? 1 : 0,
            'Kalah' => ($hasilPertandingan === 'menang_tuan_rumah') ? 1 : 0,
            'Gol_Memasukkan' => $skorTamu,
            'Gol_Kemasukkan' => $skorTuanRumah,
            'Musim' => $musim,
        ]);
   
            // Setelah operasi selesai, Anda dapat mengembalikan tampilan atau melakukan pengalihan
        return redirect('/Stat')->with('success', 'Data berhasil disimpan.');
    }
}
