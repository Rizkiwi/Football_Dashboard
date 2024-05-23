<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Login extends Model
{
    use HasFactory;

    protected $table = 'users'; // Nama tabel pada database

    protected $fillable = [
        'username',
        'password',
    ];

    // Menggunakan mutator untuk mengenkripsi password sebelum disimpan ke database
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
