<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Stat_tim;
use Illuminate\Support\Facades\DB;


class Stat_timController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('statistik_tim')->get();
        return view('db/stat_tim_db', ['data' => $data]);
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
        $data = Stat_tim::where('ID_Statistik_Tim',$id)->first();

        return view('db.editStattim')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Stat_tim::findOrFail($id);

        $data->update($request->all());

        return redirect()->to('stat_tim_db')->with('succes','updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Stat_tim::findOrFail($id);
        $data->delete();
        return redirect()->to('stat_tim_db')->with('success', 'Data deleted successfully');

    }
}
