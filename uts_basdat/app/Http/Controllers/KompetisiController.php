<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kompetisi; 
use Illuminate\Support\Facades\Validator;
use App\Models\Tim; // Sesuaikan dengan model yang digunakan


class KompetisiController extends Controller
{
    public function index()
    {
       return view('/form/index');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Nama_Kompetisi' => 'required|unique:kompetisi,Nama_Kompetisi',
            'Tanggal_Mulai' => 'nullable|date',
            'Tanggal_Berakhir' => 'nullable|date',
            'Juara' => 'max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        Kompetisi::create([
            'Nama_Kompetisi' => $request->input('Nama_Kompetisi'),
            'Tanggal_Mulai' => $request->input('Tanggal_Mulai'),
            'Tanggal_Berakhir' => $request->input('Tanggal_Berakhir'),
            'Juara' => $request->input('Juara'),
        ]);

        return redirect('/form')->with('success', 'Kompetisi berhasil ditambahkan.');
    }

    public function index2()
    {
        $data = DB::table('kompetisi')->get();

        return view('db.index_db', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('db.edit');
    }


    public function edit($id)
    {
        // $data = DB::table('Kompetisi');

        $data = kompetisi::where('ID_Kompetisi',$id)->first();
        $timList = Tim::all();
        // dd($timList);
        return view('db.edit', ['data' => $data,'timList' => $timList]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'ID_Kompetisi' => 'required',
        //     'Nama_Kompetisi' => 'required',
        //     'Tanggal_Mulai' => 'required',
        //     'Tanggal_Berakhir' => 'required',
        //     'Juara' => 'required',
        // ],[
        //     'ID_Kompetisi.required' => 'Wajib Diisi',
        //     'Nama_Kompetisi.required' => 'Wajib Diisi',
        //     'Tanggal_Mulai.required' => 'Wajib Diisi',
        //     'Tanggal_Berakhir.required' => 'Wajib Diisi',
        //     'Juara.required' => 'Wajib Diisi',
        // ]);
        $data =[
            'ID_Kompetisi' => $request->ID_Kompetisi,
            'Nama_Kompetisi' => $request->Nama_Kompetisi,
            'Tanggal_Mulai' => $request->Tanggal_Mulai,
            'Tanggal_Berakhir' => $request->Tanggal_Berakhir,
            'Juara' => $request->Juara,
        ];

        kompetisi::where('ID_Kompetisi',$id)->update($data);
        return redirect()->to('db')->with('succes','updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kompetisi::findOrFail($id);
        $data->delete();
        return redirect()->to('db')->with('success', 'Data deleted successfully');




        

    }
}

