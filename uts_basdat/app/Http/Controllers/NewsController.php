<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\News;

class NewsController extends Controller
{   
    public function show()
    {
        $beritas = News::all(); // Menggunakan ID_Berita untuk mencari berita

        return view('News', [
            'beritas' => $beritas,
        ]);
    }
    public function index()
    {   
        return view('/form/News');
    }
    public function index2()
    {   
        $data = News::all(); // Mengambil semua data kompetisi dari database
        return view('/db/news_db', ['data' => $data]);
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

    //         return redirect('/News_form')->with('success', 'Berita berhasil ditambahkan.');
    //     }
    // }
    public function storenews(Request $request)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'penulis' => 'required|max:255',
            'Judul' => 'required|max:255',
            'isi_berita' => 'required',
            'gambar_berita' => 'required|max:255',
        ]);

        // Mengambil data dari form
        $penulis = $request->input('penulis');
        $judul = $request->input('Judul');
        $isi_berita = $request->input('isi_berita');
        $gambar_berita = $request->input('gambar_berita');

        // Simpan data ke dalam database menggunakan model News
        $news = new News();
        $news->penulis = $penulis;
        $news->Judul = $judul;
        $news->isi_berita = $isi_berita;
        $news->gambar_berita = $gambar_berita;
        $news->save();

        // Redirect ke halaman atau rute yang sesuai setelah data disimpan
        return redirect('/News_form')->with('success', 'Berita berhasil disimpan');
    }
}




