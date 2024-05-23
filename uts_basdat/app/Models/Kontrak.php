<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    use HasFactory;

    protected $table = 'kontrak'; // Ganti nama_tabel_kontrak dengan nama tabel yang sesuai

    protected $fillable = [
        'Mulai_Kontrak',
        'Akhir_Kontrak',
        'Harga',
        'Gaji',
        'ID_Pemain',
        'Agent',
        'created_at',
        'updated_at',
    ];

    // Definisikan relasi dengan model Pemain jika diperlukan
    public function pemain()
    {
        return $this->belongsTo(Pemain::class, 'ID_Pemain');
    }
}
