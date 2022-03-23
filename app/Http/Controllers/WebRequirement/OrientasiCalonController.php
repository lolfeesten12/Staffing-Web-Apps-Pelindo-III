<?php

namespace App\Http\Controllers\WebRequirement;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterOrientasi;
use App\Models\WebRequirement\CalonPegawai;
use App\Models\WebRequirement\Orientasi;
use Illuminate\Http\Request;

class OrientasiCalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $peserta = CalonPegawai::with('PesertaOrientasi.MasterOrientasi')->where('status_calon', '=', 'Diterima')
        ->get();

        return view('user-views.pages.requirement.orientasi.index', compact('peserta'));
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
        $item = CalonPegawai::with('PesertaOrientasi')->where('status_calon', '=', 'Diterima')
        ->find($id);
        $periode = MasterOrientasi::get();

        return view('user-views.pages.requirement.orientasi.periode', compact('item','periode'));
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
        $peserta = new Orientasi;
        $peserta->id_calon_pegawai = $id;
        $peserta->id_orientasi = $request->id_orientasi;
        $peserta->save();

        return redirect()->route('peserta-orientasi.index')->with('messageberhasil','Periode Orientasi Berhasil Diatur');

    }

    public function Sertifikat(Request $request, $id)
    {
        $peserta = Orientasi::where('id_calon_pegawai', $id)->first();
        $peserta->no_sertifikat = $request->no_sertifikat;
        $peserta->keterangan = $request->keterangan;
        $peserta->save();

        return redirect()->route('peserta-orientasi.index')->with('messageberhasil','Sertifikat Peserta Orientasi Berhasil Ditambahkan');
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
