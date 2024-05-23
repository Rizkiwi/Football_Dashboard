<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tim;
use App\Models\Kompetisi; 
use Illuminate\Support\Facades\Validator;

class TimController extends Controller
{
    public function index()
    {   
        $kompetisiList = Kompetisi::all(); // Mengambil semua data kompetisi dari database
        return view('/form/Team', ['kompetisiList' => $kompetisiList]);
    }
    public function createTim(Request $request)
    {
        $request->validate([
            'Nama_Tim' => 'required|unique:tim,Nama_Tim', // Validasi agar nama tim unik
            'Kota_Asal' => 'nullable',
            'Tahun_Berdiri' => 'nullable|date',
            'Asal_Negara' => 'nullable|max:50',
            'ID_Kompetisi' => 'required|exists:kompetisi,ID_Kompetisi', // Validasi nama kompetisi
        ]);

        // Jika validasi berhasil, simpan tim ke dalam database
        Tim::create([
            'Nama_Tim' => $request->Nama_Tim,
            'Kota_Asal' => $request->Kota_asal,
            'Tahun_Berdiri' => $request->Tahun_berdiri,
            'Asal_Negara' => $request->Asal_negara,
            'ID_Kompetisi' => $request->ID_Kompetisi, // Menggunakan ID kompetisi yang sesuai
        ]);
        
        return redirect('/Team')->with('success', 'Tim berhasil ditambahkan.');
    }
    public function index2()
    {
        $data = DB::table('Tim')->get();
        return view('db/tim_db', ['data' => $data]);
    }

    
    public function edit(string $id)
    {
        $data = Tim::where('ID_Tim',$id)->first();

        return view('db.editTim')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Tim::findOrFail($id);

        $data->update($request->all());

        return redirect()->to('tim_db')->with('succes','updated succesfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Tim::findOrFail($id);
        $data->delete();
        return redirect()->to('tim_db')->with('success', 'Data deleted successfully');

    }
}


