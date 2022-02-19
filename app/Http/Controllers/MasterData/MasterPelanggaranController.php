<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterPelanggaran;
use App\Models\MasterData\MasterSanksi;
use Illuminate\Http\Request;

class MasterPelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggaran = MasterPelanggaran::with('Sanksi')->get();
        $sanksi = MasterSanksi::get();

        return view('user-views.pages.masterdata.pelanggaran',compact('pelanggaran','sanksi'));
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
        $pelanggaran = new MasterPelanggaran;
        $pelanggaran->id_sanksi = $request->id_sanksi;
        $pelanggaran->pelanggaran = $request->pelanggaran;
        $pelanggaran->save();

        return redirect()->back()->with('messageberhasil','Data Pelanggaran Berhasil ditambahkan');
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
        $pelanggaran = MasterPelanggaran::find($id);
        $pelanggaran->id_sanksi = $request->id_sanksi;
        $pelanggaran->pelanggaran = $request->pelanggaran;
        $pelanggaran->update();

        return redirect()->back()->with('messageberhasil','Data Pelanggaran Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggaran = MasterPelanggaran::find($id);
        $pelanggaran->delete();

        return redirect()->back()->with('messagehapus','Data Pelanggaran Berhasil dihapus');
    }
}
