<?php

namespace App\Http\Controllers\Riwayat;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterHubungan;
use App\Models\MasterData\MasterJabatan;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterUnitKerja;
use App\Models\Riwayat\RiwayatKeluarga;
use App\Models\Riwayat\RiwayatPendidikan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pegawai = MasterPegawai::where('id', Auth::user()->id)->get();
        $riwayat = RiwayatPendidikan::with('Pegawai')->where('id_pegawai',Auth::user()->id_pegawai )->get();
        // return $riwayat;
        // $hubungan = MasterHubungan::get();

        return view('user-views.pages.riwayat.pendidikan',compact('riwayat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = MasterJabatan::get();
        $unit = MasterUnitKerja::get();

        return view('user-views.pages.masterdata.pegawai.create',compact('jabatan','unit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $riwayat = new RiwayatPendidikan();
        $riwayat->id_pegawai = Auth::user()->id_pegawai;
        $riwayat->tipe_pendidikan = $request->tipe_pendidikan;
        $riwayat->nama_sekolah = $request->nama_sekolah;
        $riwayat->jurusan = $request->jurusan;
        $riwayat->no_ijasah = $request->no_ijasah;
        $riwayat->tanggal_ijasah = $request->tanggal_ijasah;
        $riwayat->save();

        return redirect()->route('pendidikan.index')->with('messageberhasil','Data Pendidikan Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = MasterPegawai::with('Jabatan','Unitkerja','User')->find($id);

        return view('user-views.pages.masterdata.pegawai.detail',compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = MasterPegawai::with('Jabatan','Unitkerja','User')->find($id);
        $jabatan = MasterJabatan::get();
        $unit = MasterUnitKerja::get();

        return view('user-views.pages.masterdata.pegawai.edit', compact('pegawai','jabatan','unit'));
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

            $riwayat = RiwayatPendidikan::find($id);
            $riwayat->tipe_pendidikan = $request->tipe_pendidikan;
            $riwayat->nama_sekolah = $request->nama_sekolah;
            $riwayat->jurusan = $request->jurusan;
            $riwayat->no_ijasah = $request->no_ijasah;
            $riwayat->tanggal_ijasah = $request->tanggal_ijasah;
            $riwayat->update();


        return redirect()->route('pendidikan.index')->with('messageberhasil','Data Pendidikan Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $ = User::where('id_pegawai', '=', $id)->first();
        // $user->delete();

        $riwayat = RiwayatPendidikan::find($id);
        $riwayat->delete();

        return redirect()->back()->with('messagehapus','Data Pendidikan Berhasil dihapus');
    }
}
