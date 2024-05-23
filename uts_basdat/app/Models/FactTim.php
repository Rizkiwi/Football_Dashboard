<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactTim extends Model
{
    use HasFactory;
    protected $connection = 'second_db';

    protected $table = 'fact_tim'; // Sesuaikan dengan nama tabel Anda jika berbeda

    protected $fillable = [
        'Nama_Tim',
        'Kota_Asal',
        'Tahun_Berdiri',
        'Point',
        'Menang',
        'Seri',
        'Kalah',
        'Gol_Memasukkan',
        'Gol_Kemasukkan',
        'Musim',
        'nama_provinsi',
        'nama_negara',
    ];
}
