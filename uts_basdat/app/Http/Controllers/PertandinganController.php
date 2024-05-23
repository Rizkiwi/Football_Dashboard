<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pertandingan;
use Illuminate\Support\Facades\DB;


class PertandinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('Pertandingan')->get();
        return view('db/pertandingan_db', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pertandingan::where('ID_Pertandingan',$id)->first();

        return view('db.editPertandingan')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Pertandingan::findOrFail($id);

        $data->update($request->all());

        return redirect()->to('pertandingan_db')->with('succes','updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pertandingan::findOrFail($id);
        $data->delete();
        return redirect()->to('pertandingan_db')->with('success', 'Data deleted successfully');

    }
}
