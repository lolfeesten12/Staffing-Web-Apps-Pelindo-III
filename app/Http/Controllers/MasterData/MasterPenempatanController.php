<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterPenempatan;
use Illuminate\Http\Request;

class MasterPenempatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penempatan = MasterPenempatan::get();
        return view('user-views.pages.masterdata.penempatan', compact('penempatan'));
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
        $penempatan = new MasterPenempatan();
        $penempatan->nama_penempatan = $request->nama_penempatan;
        $penempatan->regional = $request->regional;
        $penempatan->jenis_kantor = $request->jenis_kantor;
        $penempatan->save();

        return redirect()->back()->with('messageberhasil','Data Penempatan Berhasil Ditambahkan');
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
        $penempatan = MasterPenempatan::find($id);
        $penempatan->nama_penempatan = $request->nama_penempatan;
        $penempatan->regional = $request->regional;
        $penempatan->jenis_kantor = $request->jenis_kantor;
        $penempatan->update();

        return redirect()->back()->with('messageberhasil','Data Penempatan Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penempatan = MasterPenempatan::find($id);
        $penempatan->delete();

        return redirect()->back()->with('messagehapus','Data Penempatan Berhasil dihapus');
    }
}
