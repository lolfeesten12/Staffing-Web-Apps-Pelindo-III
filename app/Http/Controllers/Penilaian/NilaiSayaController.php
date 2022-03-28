<?php

namespace App\Http\Controllers\Penilaian;

use App\Http\Controllers\Controller;
use App\Models\Penilaian\Nilai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiSayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = Nilai::with('Pegawai','Penilai','AtasanPenilai')->where('id_pegawai','=', Auth::user()->Pegawai->id_pegawai)->get();
        return view('user-views.pages.penilaian.nilaisaya.index', compact('nilai'));
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
        //
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
        $nilai = Nilai::find($id);
        $nilai->keberatan = $request->keberatan;
        $nilai->tanggal_keberatan = Carbon::now();
        $nilai->status_acc = 'Keberatan';
        $nilai->update();

        return redirect()->back()->with('messageberhasil','Data Keberatan Berhasil dikirimkan');
    }

    public function Tanggapan(Request $request, $id_penilaian)
    {
        $nilai = Nilai::find($id_penilaian);
        $nilai->tanggapan_penilai = $request->tanggapan_penilai;
        $nilai->tanggal_tanggapan = Carbon::now();
        $nilai->status_acc = 'Ditanggapi';
        $nilai->update();

        return redirect()->back()->with('messageberhasil','Data Tanggapan Keberatan Berhasil dikirimkan');
    }

    public function Sesuai($id_penilaian)
    {
        $nilai = Nilai::find($id_penilaian);
        $nilai->status_acc = 'Ditanggapi';
        $nilai->update();

        return redirect()->back()->with('messageberhasil','Data Nilai Berhasil disesuaikan');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
