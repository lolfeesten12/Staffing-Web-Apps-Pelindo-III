<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterShift;
use Illuminate\Http\Request;

class MasterShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shift = MasterShift::get();

        return view('user-views.pages.masterdata.shiftkerja',compact('shift'));
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
        $shift = new MasterShift;
        $shift->jenis_shift = $request->jenis_shift;
        $shift->jam_masuk = $request->jam_masuk;
        $shift->jam_selesai = $request->jam_selesai;
        $shift->save();

        return redirect()->back()->with('messageberhasil','Data Master Shift Berhasil ditambahkan');
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
        $shift = MasterShift::find($id);
        $shift->jenis_shift = $request->jenis_shift;
        $shift->jam_masuk = $request->jam_masuk;
        $shift->jam_selesai = $request->jam_selesai;
        $shift->update();

        return redirect()->bacK()->with('messageberhasil','Data Master Shift Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shift = MasterShift::find($id);
        $shift->delete();

        return redirect()->back()->with('messagehapus','Data Master Shift Berhasil dihapus');
    }
}
