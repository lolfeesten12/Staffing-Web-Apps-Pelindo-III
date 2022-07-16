<?php

namespace App\Http\Controllers\Penilaian;

use App\Http\Controllers\Controller;
use App\Models\Penilaian\PeriodePenilaian;
use Illuminate\Http\Request;

class PeriodePenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = PeriodePenilaian::get();

        return view('user-views.pages.penilaian.periode.index', compact('periode'));
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
        $periode = new PeriodePenilaian;
        $periode->periode_mulai = $request->periode_mulai;
        $periode->periode_akhir = $request->periode_akhir;
        $periode->save();

        return redirect()->back()->with('messageberhasil','Data Periode Penilaian Berhasil Ditambahkan');
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
        $periode = PeriodePenilaian::find($id);
        $periode->periode_mulai = $request->periode_mulai;
        $periode->periode_akhir = $request->periode_akhir;
        $periode->update();

        return redirect()->back()->with('messageberhasil','Data Periode Penilaian Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periode = PeriodePenilaian::find($id);
        $periode->delete();

        return redirect()->back()->with('messagehapus','Data Periode Penilaian Berhasil dihapus');
    }
}
