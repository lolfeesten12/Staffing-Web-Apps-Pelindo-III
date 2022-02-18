<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterJabatan;
use Illuminate\Http\Request;

class MasterJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = MasterJabatan::get();

        return view('user-views.pages.masterdata.jabatan', compact('jabatan'));
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
        $jabatan = new MasterJabatan;
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->save();
        
        return redirect()->back()->with('messageberhasil','Data Jabatan Berhasil ditambahkan');
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
    public function update(Request $request, $id)
    {
        $jabatan = MasterJabatan::find($id);
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->update();

        return redirect()->back()->with('messageberhasil','Data Jabatan Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jabatan = MasterJabatan::find($id);
        $jabatan->delete();

        return redirect()->back()->with('messagehapus','Data Jabatan Berhasil dihapus');
    }
}
