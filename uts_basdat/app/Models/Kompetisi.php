<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kompetisi extends Model
{
    protected $table = 'kompetisi';

    protected $primaryKey = 'ID_Kompetisi';

    protected $fillable = [
        'Nama_Kompetisi',
        'Tanggal_Mulai',
        'Tanggal_Berakhir',
        'Juara',
    ];

    protected $dates = ['Tanggal_Mulai', 'Tanggal_Berakhir'];
}

