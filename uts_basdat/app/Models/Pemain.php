<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemain extends Model
{
    protected $table = 'pemain'; // Nama tabel yang sesuai

    protected $primaryKey = 'ID_Pemain'; // Nama kolom primary key

    protected $fillable = [
        'Nama_Pemain',
        'Tanggal_Lahir',
        'Tempat_Lahir',
        'Tinggi_Badan',
        'Berat_Badan',
        'Posisi_Pemain',
        'Nomor_Punggung',
        'Usia',
        'ID_Tim',
    ];

    public function tim()
    {
        return $this->belongsTo(Tim::class, 'ID_Tim');
    }
}

