<?php

namespace App\Http\Controllers\Mutasi;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterPangkat;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterUnitKerja;
use App\Models\Mutasi\UsulanMutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsulanPangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->Pegawai->role == 'HRD' || Auth::user()->Pegawai->role == 'Kepala HRD'){
            $usulan = UsulanMutasi::with('Pegawai')->where('jenis_mutasi','Promosi Pangkat')->orWhere('jenis_mutasi', 'Demosi Pangkat')->get();
        }elseif(Auth::user()->Pegawai->role == 'Kepala Unit'){
            $tes = UsulanMutasi::with('Pegawai')->join('tb_master_pegawai','tb_usulan_mutasi.id_pegawai','tb_master_pegawai.id_pegawai')
            ->where('jenis_mutasi','Promosi Pangkat')->orWhere('jenis_mutasi', 'Demosi Pangkat')->get();

            $usulan = $tes->where('id_unit_kerja','=', Auth::user()->Pegawai->id_unit_kerja)
            ->where('id_sub_unit', '=', Auth::user()->Pegawai->id_sub_unit);

        }else{
            $tes = UsulanMutasi::with('Pegawai')->join('tb_master_pegawai','tb_usulan_mutasi.id_pegawai','tb_master_pegawai.id_pegawai')
            ->where('jenis_mutasi','Promosi Pangkat')->orWhere('jenis_mutasi', 'Demosi Pangkat')->get();

            $usulan = $tes->where('id_unit_kerja','=', Auth::user()->Pegawai->id_unit_kerja);
        }


        
        $pegawai = MasterPegawai::get();
        $unit = MasterUnitKerja::get();

        return view('user-views.pages.mutasi.mutasi-pangkat.usulan.index', compact('usulan','pegawai','unit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = MasterPegawai::get();
        $pangkat = MasterPangkat::get();
        $unit = MasterUnitKerja::get();

        return view('user-views.pages.mutasi.mutasi-pangkat.usulan.create', compact('pegawai','pangkat','unit'));
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
        $usulan->id_pangkat_tujuan = $request->id_pangkat_tujuan;
        $usulan->jenis_mutasi = $request->jenis_mutasi;
        $usulan->status_approval = 'Pending';
        $usulan->alasan_usulan = $request->alasan_usulan;
        $usulan->file = $file_surat;
        $usulan->save();

        return redirect()->route('usulan-pangkat.index')->with('messageberhasil','Data Usulan Pangkat Berhasil ditambahkan');
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
      
        return view('user-views.pages.mutasi.mutasi-pangkat.usulan.detail', compact('item'));
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
        $pangkat = MasterPangkat::get();
        return view('user-views.pages.mutasi.mutasi-pangkat.usulan.edit', compact('pegawai','item','pangkat'));
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
        $usulan->id_pangkat_tujuan = $request->id_pangkat_tujuan;
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

        return redirect()->route('usulan-pangkat.index')->with('messageberhasil','Data Usulan Pangkat Berhasil diedit');
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

        return redirect()->back()->with('messagehapus','Data Usulan Mutasi Pangkat Berhasil Dihapus');
    }
}
