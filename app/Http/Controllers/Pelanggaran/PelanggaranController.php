<?php

namespace App\Http\Controllers\Pelanggaran;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterPelanggaran;
use App\Models\Riwayat\RiwayatPelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->Pegawai->role == 'HRD' || Auth::user()->Pegawai->role == 'Kepala HRD'){
            $pelanggaran = RiwayatPelanggaran::with('Pegawai','Pelanggaran')->get();
            $pegawai = MasterPegawai::get();
        }elseif(Auth::user()->Pegawai->role == 'Kepala Unit'){
            $pelanggaran = RiwayatPelanggaran::with('Pegawai','Pelanggaran')->join('tb_master_pegawai','tb_riwayat_pelanggaran.id_pegawai','tb_master_pegawai.id_pegawai')
            ->where('id_unit_kerja','=', Auth::user()->Pegawai->id_unit_kerja)->where('id_sub_unit', Auth::user()->Pegawai->id_sub_unit)->where('role', '=', 'Pegawai')->get();

            $pegawai = MasterPegawai::where('id_unit_kerja','=', Auth::user()->Pegawai->id_unit_kerja)->where('id_sub_unit', Auth::user()->Pegawai->id_sub_unit)->get();
        }else{
            $pelanggaran = RiwayatPelanggaran::with('Pegawai','Pelanggaran')->leftjoin('tb_master_pegawai','tb_riwayat_pelanggaran.id_pegawai','tb_master_pegawai.id_pegawai')
            ->where('id_unit_kerja','=', Auth::user()->Pegawai->id_unit_kerja)->where('role', '!=', 'Direktur')->OrWhere('role', '!=', 'Kepala HRD')->get();

            $pegawai = MasterPegawai::where('id_unit_kerja', Auth::user()->Pegawai->id_unit_kerja)->get();
        }

        $masterdata = MasterPelanggaran::get();

        return view('user-views.pages.pelanggaran&sanksi.pelanggaran.index', compact('pelanggaran','pegawai','masterdata'));
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
        $id = RiwayatPelanggaran::getId();
        foreach($id as $value);
        $idlama = $value->id_riwayat_pelanggaran;
        $idbaru = $idlama + 1;
        $mulai = date("m",strtotime($request->tanggal));

        $no_surat = 'PLG'.'/'.$mulai.'/'.$request->id_pegawai.'/'.$idbaru;

        $pelanggaran = new RiwayatPelanggaran;
        $pelanggaran->id_pegawai = $request->id_pegawai;
        $pelanggaran->id_pelanggaran = $request->id_pelanggaran;
        $pelanggaran->tanggal = $request->tanggal;
        $pelanggaran->keterangan = $request->keterangan;
        $pelanggaran->no_surat = $no_surat;
        $pelanggaran->id_pejabat = Auth::user()->Pegawai->id_pegawai;
        $pelanggaran->save();

        return redirect()->back()->with('messageberhasil','Data Pelanggaran Berhasil ditambahkan');
        
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
        $pelanggaran = RiwayatPelanggaran::find($id);
        $pelanggaran->id_pegawai = $request->id_pegawai;
        $pelanggaran->id_pelanggaran = $request->id_pelanggaran;
        $pelanggaran->tanggal = $request->tanggal;
        $pelanggaran->keterangan = $request->keterangan;
        $pelanggaran->update();

        return redirect()->back()->with('messageberhasil','Data Pelanggaran berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggaran = RiwayatPelanggaran::find($id);
        $pelanggaran->delete();

        return redirect()->back()->with('messagehapus','Data Pelanggaran Berhasil dihapus');
    }
}
