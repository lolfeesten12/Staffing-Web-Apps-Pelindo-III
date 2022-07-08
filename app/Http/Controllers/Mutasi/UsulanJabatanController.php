<?php

namespace App\Http\Controllers\Mutasi;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterJabatan;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterUnitKerja;
use App\Models\Mutasi\UsulanMutasi;
use Illuminate\Http\Request;

class UsulanJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usulan = UsulanMutasi::with('Pegawai')->where('jenis_mutasi','Promosi Jabatan')->orWhere('jenis_mutasi', 'Demosi Jabatan')->get();
        $pegawai = MasterPegawai::get();
        $unit = MasterUnitKerja::get();

        return view('user-views.pages.mutasi.mutasi-jabatan.usulan.index', compact('usulan','pegawai','unit'));
    }
    public function GetJabatan($id)
    {
        $pegawai = MasterPegawai::where('id_jabatan', '=', $id)->pluck('nama_pegawai', 'id_pegawai');
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
        $jabatan = MasterJabatan::where('nama_jabatan', '!=', 'Direktur')->get();
        $unit = MasterUnitKerja::get();

        return view('user-views.pages.mutasi.mutasi-jabatan.usulan.create', compact('pegawai','jabatan','unit'));
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

        $usulan = new UsulanMutasi;
        $usulan->id_pegawai = $request->id_pegawai;
        $usulan->nomor_surat = $request->nomor_surat;
        $usulan->tanggal_surat = $request->tanggal_surat;
        $usulan->id_jabatan_tujuan = $request->id_jabatan_tujuan;
        $usulan->jenis_mutasi = $request->jenis_mutasi;
        $usulan->status_approval = 'Pending';
        $usulan->alasan_usulan = $request->alasan_usulan;
        $usulan->file = $file_surat;
        $usulan->save();

        return redirect()->route('usulan-jabatan.index')->with('messageberhasil','Data Usulan Jabatan Berhasil ditambahkan');
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
        return view('user-views.pages.mutasi.mutasi-jabatan.usulan.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = UsulanMutasi::find($id);
        $pegawai = MasterPegawai::get();
        $jabatan = MasterJabatan::where('nama_jabatan', '!=', 'Direktur')->get();
        $unit = MasterUnitKerja::get();

        return view('user-views.pages.mutasi.mutasi-jabatan.usulan.edit', compact('item','pegawai','jabatan','unit'));
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
        $usulan->nomor_surat = $request->nomor_surat;
        $usulan->tanggal_surat = $request->tanggal_surat;
        $usulan->id_jabatan_tujuan = $request->id_jabatan_tujuan;
        $usulan->jenis_mutasi = $request->jenis_mutasi;
        $usulan->alasan_usulan = $request->alasan_usulan;
        if($request->file){
            $imagePath = $request->file('file');
            $file_surat = $imagePath->getClientOriginalName();
            $imagePath->move(public_path().'/Resume/', $file_surat); 
            $data[] = $file_surat;
            $usulan->file = $file_surat;
        }
        $usulan->save();

        return redirect()->route('usulan-jabatan.index')->with('messageberhasil','Data Usulan Jabatan Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = UsulanMutasi::find($id);
        $item->delete();

        return redirect()->back()->with('messagehapus','Data Usulan Mutasi Jabatan Berhasil dihapus');
    }
}
