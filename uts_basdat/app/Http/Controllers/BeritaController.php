<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\News;

class BeritaController extends Controller
{   

    public function index()
    {   
        return view('/form/Berita');
    }
    public function storenews(Request $request)
    {
        $request->validate([
            'penulis' => 'required|max:255',
            'Judul' => 'required|max:255',
            'isi_berita' => 'required',
            'gambar_berita' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);
    
        // Jika terdapat file gambar dalam request
        if ($request->hasFile('gambar_berita')) {
            $image = $request->file('gambar_berita');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('news'), $filename);
        } else {
            $filename = null; // Atur null jika tidak ada gambar yang diunggah
        }
    
        // Simpan data ke dalam database menggunakan model News
        $news = new News();
        $news->penulis = $request->input('penulis');
        $news->Judul = $request->input('Judul');
        $news->isi_berita = $request->input('isi_berita');
        $news->gambar_berita = $filename; // Simpan nama file gambar atau null
        $news->save();
    
        // Redirect ke halaman atau rute yang sesuai setelah data disimpan
        return redirect('/Berita')->with('success', 'Berita berhasil disimpan');
    }
    
    // public function storenews(Request $request)
    // {
    //     $request->validate([
    //         'penulis' => 'required',
    //         'isi_berita' => 'required',
    //         'avatar-file' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
    //     ]);

    //     if ($request->hasFile('avatar-file')) {
    //         $image = $request->file('avatar-file');
    //         $filename = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('news'), $filename);
    //         // Menghapus gambar lama jika ada
    //         if ($news->image && file_exists(public_path('newss/' . $news->image))) {
    //             unlink(public_path('newss/' . $news->image));
    //         }

    //         // Menyimpan nama gambar ke database
    //         $news = new News();
    //         $news->penulis = $request->penulis;
    //         $news->isi_berita = $request->isi_berita;
    //         $news->gambar_berita = $filename;
    //         $news->save();

    //         return redirect('/Berita')->with('success', 'Berita berhasil ditambahkan.');
    //     }
    // }
    // public function storenews(Request $request)
    // {
    //     // Validasi data yang diterima dari form
    //     $validatedData = $request->validate([
    //         'penulis' => 'required|max:255',
    //         'Judul' => 'required|max:255',
    //         'isi_berita' => 'required',
    //         'gambar_berita' => 'required|max:255',
    //     ]);

    //     // Mengambil data dari form
    //     $penulis = $request->input('penulis');
    //     $judul = $request->input('Judul');
    //     $isi_berita = $request->input('isi_berita');
    //     $gambar_berita = $request->input('gambar_berita');

    //     // Simpan data ke dalam database menggunakan model News
    //     $news = new News();
    //     $news->penulis = $penulis;
    //     $news->Judul = $judul;
    //     $news->isi_berita = $isi_berita;
    //     $news->gambar_berita = $gambar_berita;
    //     $news->save();

    //     // Redirect ke halaman atau rute yang sesuai setelah data disimpan
    //     return redirect('/Berita')->with('success', 'Berita berhasil disimpan');
    // }
}




