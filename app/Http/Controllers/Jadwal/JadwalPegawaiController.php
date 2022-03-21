<?php

namespace App\Http\Controllers\Jadwal;

use App\Http\Controllers\Controller;
use App\Models\Jadwal\JadwalPegawai;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterShift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = MasterPegawai::get();

        return view('user-views.pages.aktivitas.jadwal.index', compact('pegawai'));
    }

    public function getJadwal(Request $request, $id_pegawai)
    {
      
        $id = MasterPegawai::where('id_pegawai', $id_pegawai)->pluck('id_pegawai')->toArray();
   
        $shift = MasterShift::leftjoin('tb_jadwal_pegawai','tb_master_shift_kerja.id_shift_kerja','tb_jadwal_pegawai.id_shift_kerja')
        ->join('tb_jadwal_pegawai','tb_master_pegawai.id_pegawai','tb_jadwal_pegawai.id_pegawai')
        ->select('tb_shift_kerja.id_shift_kerja', 'jenis_shift','jam_masuk','jam_selesai')
        ->whereIn('tb_master_pegawai.id_pegawai', $id)
        ->whereDate('tanggal_masuk', $request->date);
        
        $shiftlibur = MasterShift::leftjoin('tb_jadwal_pegawai', function($join) use($request){
            $join->on('tanggal_masuk', '=', DB::raw("'".$request->date."'"))->on('tb_jadwal_pegawai.id_shift_kerja','tb_master_shift_kerja.id_shift_kerja');
        })

        ->select('tb_master_shift_kerja.id_shift_kerja', 'jenis_shift','jam_masuk','jam_selesai')
        ->whereIn('tb_master_pegawai.id_pegawai', $id)
        ->get();


        return $shiftlibur;
        // $id_pegawai = MasterPegawai::join('tb_master_jabatan', 'tb_master_pegawai.id_jabatan', 'tb_master_jabatan.id_jabatan')
        // ->where('nama_jabatan', '!=', 'Kepala Unit')->where('nama_jabatan', '!=', 'Kepala Cabang')->pluck('id_pegawai')->toArray();

        // $pegawaimasuk = Pegawai::leftJoin('tb_kepeg_jadwal', 'tb_kepeg_master_pegawai.id_pegawai', 'tb_kepeg_jadwal.id_pegawai')
        // ->join('tb_kepeg_master_jabatan', 'tb_kepeg_master_pegawai.id_jabatan', 'tb_kepeg_master_jabatan.id_jabatan')
        // ->select('tb_kepeg_master_pegawai.id_pegawai', 'nama_pegawai','nama_jabatan','tanggal_jadwal')
        // ->whereIn('tb_kepeg_master_pegawai.id_pegawai', $id_pegawai)
        // ->whereDate('tanggal_jadwal', $request->date);
    }

    public function JadwalPegawai()
    {
        $jadwal = JadwalPegawai::select('tanggal_masuk')->groupBy('tanggal_masuk')->get();
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
        $pegawai = MasterPegawai::with('UnitKerja','Jabatan')->find($id);
        $shift = MasterShift::get();

        return view('user-views.pages.aktivitas.jadwal.kalendar', compact('pegawai','shift'));
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
