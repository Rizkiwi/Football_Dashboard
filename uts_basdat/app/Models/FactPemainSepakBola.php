<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactPemainSepakBola extends Model
{
    protected $connection = 'second_db';

    protected $table = 'fact_pemain_sepak_bola'; // Sesuaikan dengan nama tabel yang benar

    protected $fillable = [
        'ID_Pemain',
        'Posisi_Pemain',
        'Nama_Pemain',
        'Tempat_Lahir',
        'jumlah_Menit_bermain',
        'jumlah_Gol',
        'jumlah_Assist',
        'jumlah_Kartu_Kuning',
        'jumlah_Kartu_Merah',
        'jumlah_Penyelamatan',
        'jumlah_Clean_Sheet',
        'jumlah_Pertandingan',
        'Gaji',
        'Harga',
        'Tahun',
        'Bulan',
        'Agent',
        'Nama_Kompetisi',
        'Nama_Tim',
        'nama_kota',
        'nama_provinsi',
        'nama_negara',
        'Usia',
        'jumlah_Tekel'
    ];

    // Tambahkan relasi ke tabel-tabel terkait di sini jika diperlukan
}

