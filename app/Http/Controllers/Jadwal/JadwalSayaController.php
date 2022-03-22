<?php

namespace App\Http\Controllers\Jadwal;

use App\Http\Controllers\Controller;
use App\Models\Jadwal\JadwalPegawai;
use App\Models\MasterData\MasterPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalSayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = MasterPegawai::with('Jabatan','UnitKerja')->where('id_pegawai', Auth::user()->Pegawai->id_pegawai)->first();
        return view('user-views.pages.aktivitas.jadwal-saya.jadwal', compact('pegawai'));
    }

    public function JadwalPegawai($id_pegawai)
    {
        $jadwal = JadwalPegawai::where('id_pegawai', $id_pegawai)->leftjoin('tb_master_shift_kerja','tb_jadwal_pegawai.id_shift_kerja','tb_master_shift_kerja.id_shift_kerja')
       ->get();
        return $jadwal;
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
