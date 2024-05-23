<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Login;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Data pengguna dengan username dan password
        Login::create([
            'username' => 'admin1',
            'password' => '123456', // Password akan di-hash oleh model
        ]);

        Login::create([
            'username' => 'admin2',
            'password' => 'abcdef', // Password akan di-hash oleh model
        ]);

        // Tambahkan data pengguna lain di sini sesuai kebutuhan
    }
}
