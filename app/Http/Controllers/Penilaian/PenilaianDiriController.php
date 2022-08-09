<?php

namespace App\Http\Controllers\Penilaian;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterPegawai;
use App\Models\Penilaian\Nilai;
use App\Models\Penilaian\PeriodePenilaian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilaianDiriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     

    public function index()
    {
       $nilai = Nilai::where('id_pegawai', Auth::user()->Pegawai->id_pegawai)->where('aktif_status','Aktif')->get();
       
       return view('user-views.pages.penilaian.penilaiandiri.index', compact('nilai'));
    }


    public function StorePeriode(Request $request)
    {
      
        $getnilai = Nilai::where('id_pegawai', Auth::user()->Pegawai->id_pegawai)->where('periode', $request->periode)->where('aktif_status', 'Aktif')->first();

        if(empty($getnilai)){
            $nilai = new Nilai;
            $nilai->periode = $request->periode;
            $nilai->id_pegawai = Auth::user()->Pegawai->id_pegawai;
            $nilai->aktif_status = 'Tidak Aktif';
            $nilai->save();
            
            return redirect()->route('penilaian-diri.edit', $nilai->id_penilaian);
        }else{
            return redirect()->back()->with('messagehapus','Error!, Periode Tersebut Sudah Dinilai');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-views.pages.penilaian.penilaiandiri.create');
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
        $nilai = Nilai::with('Pegawai','Penilai','AtasanPenilai')->find($id);
        return view('user-views.pages.penilaian.penilaiandiri.detail', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = MasterPegawai::where('id_pegawai', Auth::user()->Pegawai->id_pegawai)->first();

        // INORDER RANDOM ORDER UNTUK MEMERIKSA NILAI TEMAN SEJAWAT
        if($pegawai->role == 'Pegawai'){
            $penilai = MasterPegawai::where('role','Kepala Unit')->where('id_unit_kerja', $pegawai->UnitKerja->id_unit_kerja)->first();
            $atasanpenilai = MasterPegawai::where('role','Manager Unit')->where('id_unit_kerja', $pegawai->UnitKerja->id_unit_kerja)->first();
        }elseif($pegawai->role == 'Kepala Unit'){
            $penilai = MasterPegawai::where('role','Manager Unit')->where('id_unit_kerja', $pegawai->UnitKerja->id_unit_kerja)->first();
            $atasanpenilai = MasterPegawai::where('role','Direktur Unit')->first();
        }elseif($pegawai->role == 'Manager Unit'){
            $penilai = MasterPegawai::where('role','Manager Unit')->inRandomOrder()->first();
            $atasanpenilai = MasterPegawai::where('role','Direktur Unit')->where('')->first();
        }elseif($pegawai->role == 'HRD'){
            $penilai = MasterPegawai::where('role','Kepala HRD')->first();
            $atasanpenilai = MasterPegawai::where('role','Direktur')->first();
        }elseif($pegawai->role == 'Direktur Unit'){
            $penilai = $penilai = MasterPegawai::where('role','Direktur Unit')->inRandomOrder()->first();
            $atasanpenilai = MasterPegawai::where('role','Direktur')->first();
        }elseif($pegawai->role == 'Kepala HRD'){
            $penilai = $penilai = MasterPegawai::where('role','Direktur Unit')->inRandomOrder()->first();
            $atasanpenilai = MasterPegawai::where('role','Direktur')->first();
        }

        $nilai = Nilai::find($id);
        return view('user-views.pages.penilaian.penilaiandiri.create', compact('nilai', 'penilai','atasanpenilai'));
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

        // FILE SKP
        $imagePath = $request->file('file_skp');
        $files = $imagePath->getClientOriginalName();
        $imagePath->move(public_path().'/Resume/', $files); 
        $data[] = $files;

        // UPDATE
        $nilai = Nilai::find($id);
        $nilai->id_penilai = $request->id_penilai;
        $nilai->id_pengesah = $request->id_pengesah;
    
        $nilai->nilai_tanggung_jawab = $request->nilai_tanggung_jawab;
        $nilai->nilai_integritas = $request->nilai_integritas;
        $nilai->nilai_komitmen = $request->nilai_komitmen;
        $nilai->nilai_disiplin = $request->nilai_disiplin;
        $nilai->nilai_kerjasama = $request->nilai_kerjasama;
        $nilai->nilai_sikap = $request->nilai_sikap;
        $nilai->file_skp = $files;
        $nilai->nilai_skp = $request->nilai_skp;
        $nilai->tanggal_buat = Carbon::now();

        if(Auth::user()->Pegawai->role != 'Pegawai'){
            $nilai->nilai_kepemimpinan = $request->nilai_kepemimpinan;
        }
     
        $nilai->nilai_total = $request->nilai_total;
        $nilai->nilai_rata2 = $request->nilai_rata2;
        $nilai->catatan_penilaian = $request->catatan_penilaian;
        $nilai->status_acc = 'Pending';

        // NO PENILAIAN
        $id = Nilai::getId();
        foreach($id as $value);
        $idlama = $value->id_penilaian;
        $idbaru = $idlama + 1;
        $periode = date("m",strtotime($nilai->periode));
        $no_penilaian = 'PD'.'/'.$periode.'/'.$nilai->Pegawai->id_pegawai.'/'.$idbaru;
        $nilai->no_penilaian = $no_penilaian;
        $nilai->aktif_status = 'Aktif';
        $nilai->update();

        return redirect()->route('penilaian-diri.index')->with('messageberhasil','Data Penilaian Diri Pegawai Berhasil Ditambahkan');
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
