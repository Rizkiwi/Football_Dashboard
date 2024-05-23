<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stat_pemain extends Model
{
    protected $table = 'statistik_pemain'; // Nama tabel yang sesuai

    protected $primaryKey = 'ID_Statistik'; // Nama kolom yang berperan sebagai primary key

    protected $fillable = [
        'ID_Pemain',
        'Jumlah_Pertandingan',
        'Jumlah_Gol',
        'Jumlah_Assist',
        'Kartu_Kuning',
        'Kartu_Merah',
        'Penyelamatan',
        'Clean_Sheet',
        'Tahun',
    ];
    public $timestamps = false;


    public function pemain()
    {
        return $this->belongsTo(Pemain::class, 'ID_Pemain', 'ID_Pemain');
    }
}
