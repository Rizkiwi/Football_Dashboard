<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Statistik extends Model
{
    use HasFactory, Sortable;

    protected $table = 'statistics';
     
    protected $primaryKey = 'ID_Pemain';

    public $sortable = ['ID_Pemain', 'Nama_Pemain', 'Usia', 'Tinggi_Badan', 'Berat_Badan', 'Posisi_Pemain', 'Jumlah_Gol', 'Jumlah_Assist', 'Penyelamatan', 'Clean_Sheet'];

    #public function pemain()
    #{
    #    return $this->belongsTo(Pemain::class, 'ID_Pemain', 'ID_Pemain');
    #}
}
