<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stat_tim extends Model
{
    protected $table = 'statistik_tim'; // Nama tabel yang sesuai

    protected $primaryKey = 'ID_Statistik_Tim'; // Nama kolom yang berperan sebagai primary key

    protected $fillable = [
        'ID_Tim',
        'Point',
        'Menang',
        'Seri',
        'Kalah',
        'Gol_Memasukkan',
        'Gol_Kemasukkan',
        'Musim',
        'ID_Kompetisi',
    ];
    public $timestamps = false;


    public function tim()
    {
        return $this->belongsTo(Tim::class, 'ID_Tim', 'ID_Tim');
    }

    public function kompetisi()
    {
        return $this->belongsTo(Kompetisi::class, 'ID_Kompetisi', 'ID_Kompetisi');
    }
}
