<?php

namespace App\Http\Controllers\Mutasi;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterPenempatan;
use App\Models\MasterData\MasterSubUnit;
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
        if(Auth::user()->Pegawai->role == 'HRD' || Auth::user()->Pegawai->role == 'Kepala HRD'){
            $usulan = UsulanMutasi::with('Pegawai')->where('jenis_mutasi','Mutasi Internal')
            ->orWhere('jenis_mutasi', 'Resign')->orWhere('jenis_mutasi','Mutasi Eksternal')
            ->orWhere('jenis_mutasi','Pemecatan')->get();
        }elseif(Auth::user()->Pegawai->role == 'Kepala Unit'){
            $tes = UsulanMutasi::join('tb_master_pegawai','tb_usulan_mutasi.id_pegawai','tb_master_pegawai.id_pegawai')
            ->where('jenis_mutasi','Mutasi Internal')
            ->orWhere('jenis_mutasi', 'Resign')->orWhere('jenis_mutasi','Mutasi Eksternal')
            ->orWhere('jenis_mutasi','Pemecatan')->get();
            $usulan = $tes->where('id_unit_kerja','=', Auth::user()->Pegawai->id_unit_kerja)->where('id_sub_unit','=', Auth::user()->Pegawai->id_sub_unit);
        }elseif(Auth::user()->Pegawai->role == 'Manager Unit' || Auth::user()->Pegawai->role == 'Direktur Unit'){
            $tes = UsulanMutasi::join('tb_master_pegawai','tb_usulan_mutasi.id_pegawai','tb_master_pegawai.id_pegawai')
            ->where('jenis_mutasi','Mutasi Internal')
            ->orWhere('jenis_mutasi', 'Resign')->orWhere('jenis_mutasi','Mutasi Eksternal')
            ->orWhere('jenis_mutasi','Pemecatan')->get();
            $usulan = $tes->where('id_unit_kerja','=', Auth::user()->Pegawai->id_unit_kerja);
        }else{
            $anjay = UsulanMutasi::join('tb_master_pegawai','tb_usulan_mutasi.id_pegawai','tb_master_pegawai.id_pegawai')
            ->where('jenis_mutasi', 'Resign')->orWhere('jenis_mutasi','Mutasi Eksternal')->get();
            $usulan = $anjay->where('id_pegawai','=', Auth::user()->Pegawai->id_pegawai);
        }
        
        return view('user-views.pages.mutasi.mutasi.usulan.index', compact('usulan'));
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
        if(Auth::user()->Pegawai->role == 'Kepala Unit' || Auth::user()->Pegawai->role == 'Manager Unit' || Auth::user()->Pegawai->role == 'Direktur Unit'){
            $pegawai = MasterPegawai::where('id_unit_kerja', Auth::user()->Pegawai->id_unit_kerja)->get();
            $unit = MasterUnitKerja::where('id_unit_kerja', Auth::user()->Pegawai->id_unit_kerja)->get();
            $sub = MasterSubUnit::where('id_unit_kerja', Auth::user()->Pegawai->id_unit_kerja)->get();
            $unit_tujuan = MasterUnitKerja::get();
            $sub_unit_tujuan = MasterSubUnit::get();
            $penempatan = MasterPenempatan::get();
            return view('user-views.pages.mutasi.mutasi.usulan.create', compact('pegawai','unit','penempatan','sub','unit_tujuan','sub_unit_tujuan'));
        }else{
            $pegawai = MasterPegawai::get();
            $unit = MasterUnitKerja::get();
            $sub = MasterSubUnit::get();
            $penempatan = MasterPenempatan::get();
            return view('user-views.pages.mutasi.mutasi.usulan.create', compact('pegawai','unit','penempatan','sub'));
        }
       
       
       
        
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
            $usulan->id_sub_unit_tujuan = $request->id_sub_unit_tujuan;
        }else if($request->jenis_mutasi == 'Mutasi Eksternal'){
            $usulan->id_penempatan = $request->id_penempatan;
            $usulan->id_divisi_tujuan = $request->id_divisi_tujuan;
            $usulan->id_sub_unit_tujuan = $request->id_sub_unit_tujuan;
        }
        $usulan->id_pengusul = Auth::user()->Pegawai->id_pegawai;
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
       

        if(Auth::user()->Pegawai->role == 'Kepala Unit' || Auth::user()->Pegawai->role == 'Manager Unit' || Auth::user()->Pegawai->role == 'Direktur Unit'){
            $pegawai = MasterPegawai::where('id_unit_kerja', Auth::user()->Pegawai->id_unit_kerja)->get();
            $unit = MasterUnitKerja::where('id_unit_kerja', Auth::user()->Pegawai->id_unit_kerja)->get();
            $sub = MasterSubUnit::where('id_unit_kerja', Auth::user()->Pegawai->id_unit_kerja)->get();
            $unit_tujuan = MasterUnitKerja::get();
            $sub_unit_tujuan = MasterSubUnit::get();
            $penempatan = MasterPenempatan::get();
            $item = UsulanMutasi::with('Pegawai','Penempatan','Pengusul','Unit','SubUnit')->find($id);
            return view('user-views.pages.mutasi.mutasi.usulan.edit', compact('item','pegawai','unit','penempatan','sub','unit_tujuan','sub_unit_tujuan'));
        }else{
            $pegawai = MasterPegawai::get();
            $unit = MasterUnitKerja::get();
            $sub = MasterSubUnit::get();
            $penempatan = MasterPenempatan::get();
            $item = UsulanMutasi::with('Pegawai','Penempatan','Pengusul','Unit','SubUnit')->find($id);
            return view('user-views.pages.mutasi.mutasi.usulan.edit', compact('item','pegawai','unit','penempatan','sub'));
        }

        // $unit = MasterUnitKerja::get();
        // $pegawai = MasterPegawai::get();
        // return view('user-views.pages.mutasi.mutasi.usulan.edit', compact('item','pegawai','unit'));
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
            $usulan->id_sub_unit_tujuan = $request->id_sub_unit_tujuan;
        }elseif($request->jenis_mutasi == 'Mutasi Eksternal'){
            $usulan->id_penempatan = $request->id_penempatan;
            $usulan->id_divisi_tujuan = $request->id_divisi_tujuan;
            $usulan->id_sub_unit_tujuan = $request->id_sub_unit_tujuan;
        }
        $usulan->id_pengusul = Auth::user()->Pegawai->id_pegawai;
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
