<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterUnitKerja;
use Illuminate\Http\Request;

class MasterUnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = MasterUnitKerja::get();

        return view('user-views.pages.masterdata.unitkerja', compact('unit'));
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
        $unit = new MasterUnitKerja;
        $unit->unit_kerja = $request->unit_kerja;
        $unit->save();

        return redirect()->back()->with('messageberhasil','Data Unit kerja Berhasil Tersimpan');
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
        $unit = MasterUnitKerja::find($id);
        $unit->unit_kerja = $request->unit_kerja;
        $unit->update();

        return redirect()->back()->with('messageberhasil','Data Unit Kerja Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = MasterUnitKerja::find($id);
        $unit->delete();

        return redirect()->back()->with('messagehapus','Data Unit Kerja Berhasil dihapus');
    }
}
