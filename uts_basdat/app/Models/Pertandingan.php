<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertandingan extends Model
{
    protected $table = 'pertandingan';
    protected $primaryKey = 'ID_Pertandingan';

    protected $fillable = [
        'ID_Kompetisi',
        'Tanggal_Pertandingan',
        'Tim_Tuan_Rumah',
        'Tim_Tamu',
        'Skor_Tuan_Rumah',
        'Skor_Tamu',
        'Jumlah_Penonton',
    ];

    public function kompetisi()
    {
        return $this->belongsTo(Kompetisi::class, 'ID_Kompetisi', 'ID_Kompetisi');
    }

    public function timTuanRumah()
    {
        return $this->belongsTo(Tim::class, 'Tim_Tuan_Rumah', 'ID_Tim');
    }

    public function timTamu()
    {
        return $this->belongsTo(Tim::class, 'Tim_Tamu', 'ID_Tim');
    }
}

