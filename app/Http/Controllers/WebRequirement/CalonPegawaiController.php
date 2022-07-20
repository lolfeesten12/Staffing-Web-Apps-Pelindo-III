<?php

namespace App\Http\Controllers\WebRequirement;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterJabatan;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterPenempatan;
use App\Models\MasterData\MasterUnitKerja;
use App\Models\User;
use App\Models\WebRequirement\CalonPegawai;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

class CalonPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calon = CalonPegawai::with('Pengumuman')->get();
        $jabatan = MasterJabatan::get();
        $unit_kerja = MasterUnitKerja::get();
        $penempatan = MasterPenempatan::get();
        return view('user-views.pages.requirement.calonpegawai.index',compact('calon','jabatan','unit_kerja','penempatan'));
    }

    public function HasilSeleksi()
    {
        $calon = CalonPegawai::with('Pengumuman')->where('status_calon','!=','Pending')->get();
        return view('user-views.pages.requirement.hasilseleksi.hasilseleksi',compact('calon'));
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
        $calon = CalonPegawai::with('Pengumuman')->find($id);
        return view('user-views.pages.requirement.calonpegawai.detail',compact('calon'));
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

    public function getFile($file_cv)
    {
        $file_path = public_path('Resume/'.$file_cv);
        return response()->download($file_path);
    }

    public function getFilePendukung($file_pendukung)
    {
        $file_path = public_path('Resume/'.$file_pendukung);
        return response()->download($file_path);
    }

    public function setStatus(Request $request, $id_calon_pegawai)
    {
        if($request->status_calon == 'Diterima'){
            $item = CalonPegawai::find($id_calon_pegawai);
            $item->nilai_psikotes = $request->nilai_psikotes;
            $item->nilai_keahlian = $request->nilai_keahlian;
            $item->nilai_wawancara = $request->nilai_wawancara;
            $item->nilai_total = $request->nilai_total;
            $item->rata_rata = $request->rata_rata;
            $item->status_calon = $request->status_calon;
            $item->status_nilai = 'Sudah dinilai';
            $item->save();

            $tes = new MasterPegawai;
            $tes->nama_pegawai = $item->nama_lengkap;
            $tes->nama_panggilan = $item->nama_panggilan;
            $tes->no_telp = $item->no_telp;
            $tes->alamat = $item->alamat_lengkap;
            $tes->role = $request->role;
            $tes->id_jabatan = $request->id_jabatan;
            $tes->id_unit_kerja = $request->id_unit_kerja;
            $tes->id_penempatan = $request->id_penempatan;
            $tes->save();

            $pass = $item->nama_panggilan . '1234';

            $user = new User;
            $user->email = $item->email;
            $user->id_pegawai = $tes->id_pegawai;
            $user->name = $item->nama_panggilan;
            $user->password = bcrypt($pass);
            $user->email_verified_at = Carbon::now();
            $user->save();

            event(new Registered($user));
            
        }else{
            $item = CalonPegawai::find($id_calon_pegawai);
            $item->nilai_psikotes = $request->nilai_psikotes;
            $item->nilai_keahlian = $request->nilai_keahlian;
            $item->nilai_wawancara = $request->nilai_wawancara;
            $item->nilai_total = $request->nilai_total;
            $item->rata_rata = $request->rata_rata;
            $item->status_calon = $request->status_calon;
            $item->status_nilai = 'Sudah dinilai';
            $item->save();
        }
    
       

        return redirect()->route('calon-pegawai.index')->with('messageberhasil','Data Calon Pegawai berhasil dinilai, Lihat pada hasil seleksi');
    }

  
}
