<?php

namespace App\Http\Controllers\Mutasi;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterJabatan;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterUnitKerja;
use App\Models\Mutasi\UsulanMutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsulanJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->Pegawai->role == 'HRD' || Auth::user()->Pegawai->role == 'Kepala HRD'){
            $usulan = UsulanMutasi::with('Pegawai')->where('jenis_mutasi','Promosi Jabatan')->orWhere('jenis_mutasi', 'Demosi Jabatan')->get();
        }elseif(Auth::user()->Pegawai->role == 'Kepala Unit'){
            $tes1 = UsulanMutasi::with('Pegawai')->join('tb_master_pegawai','tb_usulan_mutasi.id_pegawai','tb_master_pegawai.id_pegawai')
            ->where('jenis_mutasi','Promosi Jabatan')->orWhere('jenis_mutasi', 'Demosi Jabatan')->get();
            $usulan = $tes1->where('id_unit_kerja','=', Auth::user()->Pegawai->id_unit_kerja)->where('id_sub_unit','=', Auth::user()->Pegawai->id_sub_unit);
        }elseif(Auth::user()->Pegawai->role == 'Manager Unit' || Auth::user()->Pegawai->role == 'Direktur Unit'){
            $tes1 = UsulanMutasi::with('Pegawai')->join('tb_master_pegawai','tb_usulan_mutasi.id_pegawai','tb_master_pegawai.id_pegawai')
            ->where('jenis_mutasi','Promosi Jabatan')->orWhere('jenis_mutasi', 'Demosi Jabatan')->get();
            $usulan = $tes1->where('id_unit_kerja','=', Auth::user()->Pegawai->id_unit_kerja);
        }else{
            $anjay1 = UsulanMutasi::with('Pegawai')->join('tb_master_pegawai','tb_usulan_mutasi.id_pegawai','tb_master_pegawai.id_pegawai')
            ->where('jenis_mutasi','Promosi Jabatan')->orWhere('jenis_mutasi', 'Demosi Jabatan')->get();
            $usulan = $anjay1->where('id_unit_kerja','=', Auth::user()->Pegawai->id_unit_kerja);
        }

        return view('user-views.pages.mutasi.mutasi-jabatan.usulan.index', compact('usulan'));
    }
    public function GetJabatan($id)
    {
        if(Auth::user()->Pegawai->role == 'Kepala Unit' || Auth::user()->Pegawai->role == 'Manager Unit' || Auth::user()->Pegawai->role == 'Direktur Unit'){
            $pegawai = MasterPegawai::where('id_jabatan', '=', $id)->where('id_unit_kerja', Auth::user()->Pegawai->id_unit_kerja)->pluck('nama_pegawai', 'id_pegawai');
            // return $merk;
            
        }else{
            $pegawai = MasterPegawai::where('id_jabatan', '=', $id)->pluck('nama_pegawai', 'id_pegawai');
        }
        return json_encode($pegawai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->Pegawai->role == 'Kepala Unit' || Auth::user()->Pegawai->role == 'Manager Unit' || Auth::user()->Pegawai->role == 'Direktur Unit'){
            $pegawai = MasterPegawai::where('id_unit_kerja', Auth::user()->Pegawai->id_unit_kerja)->get();
            $jabatan = MasterJabatan::where('nama_jabatan', '!=', 'Direktur')->get();
            $unit = MasterUnitKerja::where('id_unit_kerja', Auth::user()->Pegawai->id_unit_kerja)->get();
        }else{
            $pegawai = MasterPegawai::get();
            $jabatan = MasterJabatan::where('nama_jabatan', '!=', 'Direktur')->get();
            $unit = MasterUnitKerja::get();
        }
       

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
        $usulan->id_pengusul = $request->id_pengusul;
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
