<?php

namespace App\Http\Controllers\Jadwal;

use App\Http\Controllers\Controller;
use App\Models\Jadwal\JadwalPegawai;
use App\Models\MasterData\MasterPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalSayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = MasterPegawai::with('Jabatan','UnitKerja')->where('id_pegawai', Auth::user()->Pegawai->id_pegawai)->first();
        return view('user-views.pages.aktivitas.jadwal-saya.jadwal', compact('pegawai'));
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
    public function create(Request $request)
    {

        $getjadwal = JadwalPegawai::where('id_pegawai', Auth::user()->pegawai->id_pegawai)->where('tanggal_masuk', $request->tanggal)->first();

        if(empty($getjadwal)){
            return redirect()->back()->with('tukargagal', 'Error! Gagal Menukar, Jadwal Anda belum ditentukan pada tanggal tersebut');
        }else{
            if(Auth::user()->pegawai->role == 'Kepala Unit'){
                $jadwal = JadwalPegawai::leftjoin('tb_master_pegawai','tb_jadwal_pegawai.id_pegawai','tb_master_pegawai.id_pegawai')
                ->where('tanggal_masuk', $request->tanggal)->where('tb_jadwal_pegawai.id_pegawai','!=', Auth::user()->pegawai->id_pegawai )
                ->get();
            }else{
                $jadwal = JadwalPegawai::leftjoin('tb_master_pegawai','tb_jadwal_pegawai.id_pegawai','tb_master_pegawai.id_pegawai')
                ->where('id_unit_kerja','=', Auth::user()->pegawai->id_unit_kerja)->where('tanggal_masuk', $request->tanggal)->where('tb_jadwal_pegawai.id_pegawai','!=', Auth::user()->pegawai->id_pegawai )
                ->get();
            }
            
    
            return view('user-views.pages.aktivitas.jadwal-saya.tukar-jadwal', compact('jadwal'));
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
        $jadwal = JadwalPegawai::where('id_jadwal', $request->id_jadwal)->first();
        $jadwal->id_penukar = Auth::user()->Pegawai->id_pegawai;
        $jadwal->status = 'Pending Penukaran';
        $jadwal->update();

        return redirect()->route('jadwal-saya.index')->with('berhasil','Berhasil Menukar, Mohon tunggu persetujuan dari pihak terkait');
    }

    public function ApprovalTukar(Request $request, $id_jadwal)
    {
        $request->validate([
            'status' => 'required|in:Setuju Penukaran,Tolak Penukaran'
        ]);

        $item = JadwalPegawai::findOrFail($id_jadwal);
        $item->status = $request->status;
        
        if($item->status == 'Setuju Penukaran'){
            $item->id_pegawai = $item->id_penukar;
        }

        $item->save();
        
        return redirect()->route('jadwal-saya.show', Auth::user()->Pegawai->id_pegawai);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal = JadwalPegawai::where('id_pegawai',$id)->where('status','Pending Penukaran')->get();
        
        return view('user-views.pages.aktivitas.jadwal-saya.list-tukar', compact('jadwal'));
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
