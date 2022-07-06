<?php

namespace App\Http\Controllers\Mutasi;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterUnitKerja;
use App\Models\Mutasi\UsulanMutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsulanMutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usulan = UsulanMutasi::with('Pegawai')->where('jenis_mutasi','Mutasi Internal')->orWhere('jenis_mutasi', 'Resign')->get();
        $pegawai = MasterPegawai::get();
        $unit = MasterUnitKerja::get();

        return view('user-views.pages.mutasi.mutasi.usulan.index', compact('usulan','pegawai','unit'));
    }

    public function GetUnit($id)
    {
        $pegawai = MasterPegawai::where('id_unit_kerja', '=', $id)->pluck('nama_pegawai', 'id_pegawai');
        // return $merk;
        return json_encode($pegawai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = MasterPegawai::get();
        $unit = MasterUnitKerja::get();

        return view('user-views.pages.mutasi.mutasi.usulan.create', compact('pegawai','unit'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $imagePath = $request->file('file');
        $file_surat = $imagePath->getClientOriginalName();
        $imagePath->move(public_path().'/Resume/', $file_surat); 
        $data[] = $file_surat;

        $usulan = new UsulanMutasi();
        $usulan->id_pegawai = $request->id_pegawai;
        $usulan->jenis_mutasi = $request->jenis_mutasi;
        $usulan->id_divisi_tujuan = $request->id_divisi_tujuan;
        $usulan->nomor_surat = $request->nomor_surat;
        $usulan->tanggal_surat = $request->tanggal_surat;
        $usulan->alasan_usulan = $request->alasan_usulan;
        $usulan->file = $file_surat;
        $usulan->status_approval = 'Pending';
        $usulan->save();

        return redirect()->route('usulan-mutasi.index')->with('messageberhasil','Data Usulan Berhasil Dikirim, Mohon tunggu info berikutnya');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = UsulanMutasi::find($id);
        return view('user-views.pages.mutasi.mutasi.usulan.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = UsulanMutasi::with('Pegawai')->find($id);
        $pegawai = MasterPegawai::get();
        return view('user-views.pages.mutasi.mutasi.usulan.edit', compact('item','pegawai'));
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
        $usulan = UsulanMutasi::find($id);
        $usulan->id_pegawai = $request->id_pegawai;
        $usulan->alasan_usulan = $request->alasan_usulan;
        $usulan->jenis_mutasi = $request->jenis_mutasi;
        $usulan->update();

        return redirect()->route('usulan-mutasi.index')->with('messageberhasil','Data Usulan Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usulan = UsulanMutasi::find($id);
        $usulan->delete();

        return redirect()->route('usulan-mutasi.index')->with('messagehapus','Data Usulan Berhasil dihapus');
    }
}
