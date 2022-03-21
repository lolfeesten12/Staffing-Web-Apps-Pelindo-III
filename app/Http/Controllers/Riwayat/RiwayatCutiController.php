<?php

namespace App\Http\Controllers\Riwayat;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterHubungan;
use App\Models\MasterData\MasterJabatan;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterUnitKerja;
use App\Models\Riwayat\RiwayatCuti;
use App\Models\Riwayat\RiwayatKeluarga;
use App\Models\Riwayat\RiwayatPendidikan;
use App\Models\Riwayat\RiwayatPrestasi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pegawai = MasterPegawai::where('id', Auth::user()->id)->get();
        $riwayat = RiwayatCuti::with('Pegawai')->where('id_pegawai',Auth::user()->id_pegawai )->get();
        // return $riwayat;
        // $hubungan = MasterHubungan::get();

        return view('user-views.pages.riwayat.cuti',compact('riwayat'));
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
        $riwayat = new RiwayatCuti();
        $riwayat->id_pegawai = Auth::user()->id_pegawai;
        $riwayat->cuti_nomor = $request->cuti_nomor;
        $riwayat->cuti_lama = $request->cuti_lama;
        $riwayat->tanggal_mulai = $request->tanggal_mulai;
        $riwayat->tanggal_selesai = $request->tanggal_selesai;
        $riwayat->tanggal = $request->tanggal;
        $riwayat->save();

        return redirect()->route('prestasi.index')->with('messageberhasil','Data Prestasi Berhasil ditambahkan');
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

            $riwayat = RiwayatPrestasi::find($id);
            $riwayat->nama_prestasi = $request->nama_prestasi;
            $riwayat->tingkat = $request->tingkat;
            $riwayat->tanggal = $request->tanggal;

            $riwayat->update();


        return redirect()->route('prestasi.index')->with('messageberhasil','Data Prestasi Berhasil diedit');
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

        $riwayat = RiwayatPrestasi::find($id);
        $riwayat->delete();

        return redirect()->back()->with('messagehapus','Data Prestasi Berhasil dihapus');
    }
}
