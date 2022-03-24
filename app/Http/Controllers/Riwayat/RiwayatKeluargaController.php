<?php

namespace App\Http\Controllers\Riwayat;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterHubungan;
use App\Models\MasterData\MasterHubunganKeluarga;
use App\Models\MasterData\MasterJabatan;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterUnitKerja;
use App\Models\Riwayat\RiwayatKeluarga;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatKeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pegawai = MasterPegawai::where('id', Auth::user()->id)->get();
        $riwayat = RiwayatKeluarga::with('Pegawai', 'hubungan')->where('id_pegawai',Auth::user()->id_pegawai )->get();
        // return $riwayat;
        $hubungan = MasterHubunganKeluarga::get();

        return view('user-views.pages.riwayat.keluarga',compact('riwayat', 'hubungan'));
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
        $riwayat = new RiwayatKeluarga;
        $riwayat->id_pegawai = Auth::user()->id_pegawai;
        $riwayat->id_hub_keluarga = $request->id_hub_keluarga;
        $riwayat->kel_nama = $request->kel_nama;
        $riwayat->kel_tempat_lahir = $request->kel_tempat_lahir;
        $riwayat->kel_tanggal_lahir = $request->kel_tanggal_lahir;
        $riwayat->kel_alamat = $request->kel_alamat;
        $riwayat->save();

        return redirect()->route('keluarga.index')->with('messageberhasil','Data Keluarga Berhasil ditambahkan');
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

            $riwayat = RiwayatKeluarga::find($id);
            $riwayat->id_hub_keluarga = $request->id_hub_keluarga;
            $riwayat->kel_nama = $request->kel_nama;
            $riwayat->kel_tempat_lahir = $request->kel_tempat_lahir;
            $riwayat->kel_tanggal_lahir = $request->kel_tanggal_lahir;
            $riwayat->kel_alamat = $request->kel_alamat;
            $riwayat->update();


        return redirect()->route('keluarga.index')->with('messageberhasil','Data Keluarga Berhasil diedit');
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

        $riwayat = RiwayatKeluarga::find($id);
        $riwayat->delete();

        return redirect()->back()->with('messagehapus','Data Keluarga Berhasil dihapus');
    }
}
