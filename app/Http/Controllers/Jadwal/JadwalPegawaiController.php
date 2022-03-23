<?php

namespace App\Http\Controllers\Jadwal;

use App\Http\Controllers\Controller;
use App\Models\Jadwal\JadwalPegawai;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterShift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::user()->Pegawai->role == 'HRD'){
            $pegawai = MasterPegawai::join('tb_master_jabatan','tb_master_pegawai.id_jabatan','tb_master_jabatan.id_jabatan')
            ->where('nama_jabatan','!=','HRD')
            ->where('role','=','Kepala Unit')
            ->get();
        }else{
            $pegawai = MasterPegawai::join('tb_master_jabatan','tb_master_pegawai.id_jabatan','tb_master_jabatan.id_jabatan')
            ->where('nama_jabatan', '!=' ,'Kepala Unit')
            ->where('id_unit_kerja','=', Auth::user()->Pegawai->id_unit_kerja)
            ->get();
        }
    

        return view('user-views.pages.aktivitas.jadwal.index', compact('pegawai'));
    }

    public function getJadwal(Request $request, $id_pegawai)
    {
      
        $id = MasterPegawai::where('id_pegawai', $id_pegawai)->pluck('id_pegawai')->toArray();
        $id_shift = MasterShift::pluck('id_shift_kerja')->toArray();
        
        $shiftlibur = MasterShift::leftjoin('tb_jadwal_pegawai', function($join) use($request){
            $join->on('tanggal_masuk', '=', DB::raw("'".$request->date."'"))->on('tb_jadwal_pegawai.id_shift_kerja','tb_master_shift_kerja.id_shift_kerja');
        })
        ->select('tb_master_shift_kerja.id_shift_kerja', 'jenis_shift','jam_masuk','jam_selesai','tanggal_masuk')
        ->get();


        return $shiftlibur;
    }

    public function JadwalMasuk(Request $request)
    {
     
        $jadwal = new JadwalPegawai;
        $jadwal->id_pegawai = $request->id_pegawai;
        $jadwal->id_shift_kerja = $request->id_shift_kerja;
        $jadwal->tanggal_masuk = $request->date;
        $jadwal->id_atasan = Auth::user()->Pegawai->id_pegawai;
        $jadwal->save();
    }

    public function JadwalLibur(Request $request)
    {
        $jadwal = JadwalPegawai::where('id_pegawai', $request->id_pegawai)->where('id_shift_kerja', $request->id_shift_kerja)->whereDate('tanggal_masuk', $request->date)->first();
        $jadwal->delete();
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
