<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    protected $table = 'tim';

    protected $fillable = [
        'Nama_Tim',
        'Kota_Asal',
        'Tahun_Berdiri',
        'Asal_Negara',
        'ID_Kompetisi',
    ];
    protected $dates = ['Tahun_Berdiri'];


    public function kompetisi()
    {
        return $this->belongsTo(Kompetisi::class, 'ID_Kompetisi');
    }
}

