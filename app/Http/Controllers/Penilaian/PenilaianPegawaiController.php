<?php

namespace App\Http\Controllers\Penilaian;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterPegawai;
use App\Models\Penilaian\Nilai;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianPegawaiController extends Controller
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
            ->where('nama_jabatan', '=', 'Senior Manager Unit')->get();
        }else{
            $pegawai = MasterPegawai::join('tb_master_jabatan','tb_master_pegawai.id_jabatan','tb_master_jabatan.id_jabatan')
            ->where('id_unit_kerja','=', Auth::user()->Pegawai->id_unit_kerja)->where('nama_jabatan', '=', 'Staff')->get();
        }
       
       
       return view('user-views.pages.penilaian.penilaianpegawai.index', compact('pegawai'));
    }

    public function DetailNilai($id_pegawai)
    {
       $nilai = Nilai::with('Pegawai','Penilai','AtasanPenilai')
       ->join('tb_master_pegawai','tb_penilaian_kerja.id_pegawai','tb_master_pegawai.id_pegawai')
       ->where('tb_penilaian_kerja.id_pegawai','=', $id_pegawai)
       ->get();

       $pegawai = MasterPegawai::where('id_pegawai', '=', $id_pegawai)->first();
   
       return view('user-views.pages.penilaian.penilaianpegawai.list-nilai', compact('nilai','pegawai'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Nilai::where('id_pegawai', $request->id_pegawai)
        ->where('periode_mulai', Carbon::create($request->periode_mulai)->startOfMonth())->first();

        if(empty($data)){
            $id = Nilai::getId();
            foreach($id as $value);
            $idlama = $value->id_penilaian;
            $idbaru = $idlama + 1;
            $mulai = date("m",strtotime($request->periode_mulai));
            $akhir = date("m",strtotime($request->periode_akhir));
    
            $no_penilaian = 'NLP'.'/'.$mulai.'-'.$akhir.'/'.$request->id_pegawai.'/'.$idbaru;
    
            $nilai = new Nilai;
            $nilai->id_penilai = Auth::user()->Pegawai->id_pegawai;
            $nilai->no_penilaian = $no_penilaian;
            $nilai->id_atasan_penilai = $request->id_atasan_penilai;
            $nilai->id_pegawai = $request->id_pegawai;
            $nilai->periode_mulai = Carbon::create($request->periode_mulai)->startOfMonth();
            $nilai->periode_akhir = Carbon::create($request->periode_akhir)->endOfMonth();
            $nilai->nilai_tanggung_jawab = $request->nilai_tanggung_jawab;
            $nilai->nilai_integritas = $request->nilai_integritas;
            $nilai->nilai_komitmen = $request->nilai_komitmen;
            $nilai->nilai_disiplin = $request->nilai_disiplin;
            $nilai->nilai_kerjasama = $request->nilai_kerjasama;
            $nilai->nilai_sikap = $request->nilai_sikap;
            $nilai->nilai_kepemimpinan = $request->nilai_kepemimpinan;
            $nilai->nilai_total = $request->nilai_total;
            $nilai->nilai_rata2 = $request->nilai_rata2;
            $nilai->catatan_penilaian = $request->catatan_penilaian;
            $nilai->status_acc = 'Pending';
            $nilai->tanggal_buat = Carbon::now();
            $nilai->save();
    
            return redirect()->route('penilaian-list', $request->id_pegawai)->with('messageberhasil','Data Nilai Pegawai Berhasil ditambahkan');
        }else{
            return redirect()->back()->with('message','Error! Data Penilaian Pegawai Periode Tersebut Sudah Terdaftar, Inputkan Periode Lain');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Nilai::with('Pegawai','Penilai','AtasanPenilai')->find($id);

        return view('user-views.pages.penilaian.penilaianpegawai.edit', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = MasterPegawai::find($id);
        if(Auth::user()->Pegawai->role == 'HRD'){
            // MASIH ERROR
            $hrd = MasterPegawai::where('role','=','Direktur Unit')->first();
        }elseif(Auth::user()->Pegawai->role == 'Kepala Unit'){
            $hrd = MasterPegawai::where('role','=','Direktur Unit')->where('id_unit_kerja','=', Auth::user()->Pegawai->id_unit_kerja)->first();
        }
       
        
        return view('user-views.pages.penilaian.penilaianpegawai.create', compact('pegawai','hrd'));
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
        $nilai = Nilai::find($id);
        $nilai->periode_mulai = Carbon::create($request->periode_mulai)->startOfMonth();
        $nilai->periode_akhir = Carbon::create($request->periode_akhir)->endOfMonth();
        $nilai->nilai_tanggung_jawab = $request->nilai_tanggung_jawab;
        $nilai->nilai_integritas = $request->nilai_integritas;
        $nilai->nilai_komitmen = $request->nilai_komitmen;
        $nilai->nilai_disiplin = $request->nilai_disiplin;
        $nilai->nilai_kerjasama = $request->nilai_kerjasama;
        $nilai->nilai_sikap = $request->nilai_sikap;
        $nilai->nilai_kepemimpinan = $request->nilai_kepemimpinan;
        $nilai->nilai_total = $request->nilai_total;
        $nilai->nilai_rata2 = $request->nilai_rata2;
        $nilai->catatan_penilaian = $request->catatan_penilaian;
        $nilai->update();

        return redirect()->route('penilaian-list', $request->id_pegawai)->with('messageberhasil','Data Nilai Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = Nilai::find($id);
        $nilai->delete();

        return redirect()->back()->with('messagehapus','Data Penilaian Pegawai Behasil dihapus');
    }
}
