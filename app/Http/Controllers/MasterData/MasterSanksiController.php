<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterSanksi;
use Illuminate\Http\Request;

class MasterSanksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanksi = MasterSanksi::get();

        return view('user-views.pages.masterdata.sanksi', compact('sanksi'));
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
        $sanksi = new MasterSanksi;
        $sanksi->nama_sanksi = $request->nama_sanksi;
        $sanksi->keterangan = $request->keterangan;
        $sanksi->save();

        return redirect()->back()->with('messageberhasil','Data Sanksi Berhasil ditambahkan');
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
        $sanksi = MasterSanksi::find($id);
        $sanksi->nama_sanksi = $request->nama_sanksi;
        $sanksi->keterangan = $request->keterangan;
        $sanksi->update();

        return redirect()->back()->with('messageberhasil','Data Sanksi Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanksi = MasterSanksi::find($id);
        $sanksi->delete();

        return redirect()->back()->with('messagehapus',' Data Sanksi Berhasil dihapus');
    }
}
