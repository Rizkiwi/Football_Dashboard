<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'ID_Berita'; // Nama kolom primary key

    protected $fillable = [
        'penulis','Judul', 'isi_berita', 'gambar_berita',
    ];
}
