<?php

namespace App\Http\Controllers\Penilaian;

use App\Http\Controllers\Controller;
use App\Models\Penilaian\Nilai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilai = Nilai::where('id_penilai', Auth::user()->Pegawai->id_pegawai)->where('aktif_status','Aktif')->get();
        return view('user-views.pages.penilaian.penilaianpegawai.index', compact('nilai'));
    }

    public function getFile($file_skp)
    {
        $file_path = public_path('Resume/'.$file_skp);
        return response()->download($file_path);
    }

    public function Status(Request $request, $id)
    {
        $request->validate([
            'status_acc' => 'required|in:Approved,Not Approved,Pending'
        ]);

        $item = Nilai::findOrFail($id);
        $item->status_acc = $request->status_acc;
        $item->tanggal_tanggapan = Carbon::now();
        $item->tanggapan_penilai = $request->tanggapan_penilai;
        $item->save();
        
        return redirect()->route('penilaian-pegawai.index')->with('messageberhasil','Data Penilaian Diri Pegawai Berhasil Diproses');
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
        $nilai = Nilai::with('Pegawai','Penilai','AtasanPenilai')->find($id);
        return view('user-views.pages.penilaian.penilaianpegawai.detail', compact('nilai'));
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
        //
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
