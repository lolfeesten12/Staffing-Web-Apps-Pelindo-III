<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterJabatan;
use App\Models\MasterData\MasterPangkat;
use Illuminate\Http\Request;

class MasterPangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pangkat = MasterPangkat::with('Jabatan')->get();
        $jabatan = MasterJabatan::get();

        return view('user-views.pages.masterdata.pangkat', compact('pangkat','jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pangkat = new MasterPangkat;
        $pangkat->nama_pangkat = $request->nama_pangkat;
        $pangkat->id_jabatan = $request->id_jabatan;
        $pangkat->golongan = $request->golongan;
        $pangkat->save();
        
        return redirect()->back()->with('messageberhasil','Data Pangkat dan Golongan Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pangkat)
    {
        $pangkat = MasterPangkat::find($id_pangkat);
        $pangkat->nama_pangkat = $request->nama_pangkat;
        $pangkat->id_jabatan = $request->id_jabatan;
        $pangkat->golongan = $request->golongan;
        $pangkat->update();
        
        return redirect()->back()->with('messageberhasil','Data Pangkat dan Golongan Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pangkat)
    {
        $pangkat = MasterPangkat::find($id_pangkat);
        $pangkat->delete();

        return redirect()->back()->with('messagehapus','Data Pangkat Berhasil dihapus');
    }
}
