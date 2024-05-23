<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikPemain extends Model
{
    protected $table = 'statistik_pemain';
    protected $primaryKey = 'ID_Statistik';

    protected $fillable = [
        'ID_Pemain',
        'Menit_bermain',
        'Jumlah_Gol',
        'Jumlah_Assist',
        'Kartu_Kuning',
        'Kartu_Merah',
        'Penyelamatan',
        'Clean_Sheet',
    ];

    public function pemain()
    {
        return $this->belongsTo(Pemain::class, 'ID_Pemain', 'ID_Pemain');
    }
}

