<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Login;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('Login'); // Ganti 'login' dengan nama view halaman login Anda
    }

    public function login(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials)) {
            // Dapatkan pengguna yang telah login
            $user = Auth::user();
            
            // Periksa nama pengguna dan arahkan ke halaman yang sesuai
            if ($user->username === 'admin1') {
                return redirect('/form');
            } elseif ($user->username === 'admin2') {
                return redirect('/db');
            } 
        }
    
        // Jika login gagal, kembalikan ke halaman login dengan pesan kesalahan
        return back()->with('error','Username atau Password Salah');
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
