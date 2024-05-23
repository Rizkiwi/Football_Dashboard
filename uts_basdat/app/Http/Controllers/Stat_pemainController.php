<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\StatistikPemain;
use Illuminate\Support\Facades\DB;


class Stat_pemainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('statistik_pemain')->get();
        return view('db/stat_pemain_db', ['data' => $data]);
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = StatistikPemain::where('ID_Statistik',$id)->first();

        return view('db.editStatpemain')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = StatistikPemain::findOrFail($id);

        $data->update($request->all());

        return redirect()->to('stat_pemain_db')->with('succes','updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = StatistikPemain::findOrFail($id);
        $data->delete();
        return redirect()->to('stat_pemain_db')->with('success', 'Data deleted successfully');

    }
}
