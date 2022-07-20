<?php

namespace App\Http\Controllers\Mutasi;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterPenempatan;
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
        $usulan = UsulanMutasi::with('Pegawai')->where('jenis_mutasi','Mutasi Internal')->orWhere('jenis_mutasi', 'Resign')->orWhere('jenis_mutasi','Mutasi Eksternal')->get();
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
        $penempatan = MasterPenempatan::get();

        return view('user-views.pages.mutasi.mutasi.usulan.create', compact('pegawai','unit','penempatan'));
        
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
        if($request->jenis_mutasi == 'Mutasi Internal'){
            $usulan->id_divisi_tujuan = $request->id_divisi_tujuan;
        }else if($request->jenis_mutasi == 'Mutasi Eksternal'){
            $usulan->id_penempatan = $request->id_penempatan;
        }
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
        $unit = MasterUnitKerja::get();
        $pegawai = MasterPegawai::get();
        return view('user-views.pages.mutasi.mutasi.usulan.edit', compact('item','pegawai','unit'));
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
        $usulan->alasan_usulan = $request->alasan_usulan;
        if($request->jenis_mutasi == 'Mutasi Internal'){
            $usulan->id_divisi_tujuan = $request->id_divisi_tujuan;
        }elseif($request->jenis_mutasi == 'Mutasi Eksternal'){
            $usulan->id_penempatan = $request->id_penempatan;
        }
        $usulan->nomor_surat = $request->nomor_surat;
        $usulan->tanggal_surat = $request->tanggal_surat;
        if($request->file){
            $imagePath = $request->file('file');
            $file_surat = $imagePath->getClientOriginalName();
            $imagePath->move(public_path().'/Resume/', $file_surat); 
            $data[] = $file_surat;
            $usulan->file = $file_surat;
        }
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
