<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterHubunganKeluarga;
use App\Models\MasterData\MasterPegawai;
use App\Models\RiwayatKeluarga;
use App\Models\User;
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
        $pegawai = User::with('Pegawai')->where('id', Auth::user()->id)->first();
        $riwayat = RiwayatKeluarga::with('Hubungan')->where('id_pegawai', $pegawai->id_pegawai)->get();
        $hubungan = MasterHubunganKeluarga::get();
        // return $riwayat;
                return view('user-views.pages.riwayat-keluarga', compact('riwayat', 'hubungan'));

        // $user = User::with('Pegawai')->where('id', Auth::user()->id)->first();
        // // return $user;
        // return view('user-views.pages.profile', compact('user'));
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
        // return $request;
        $riwayat = new RiwayatKeluarga();
        $riwayat->id_hub_keluarga = $request->id_hub_keluarga;
        $riwayat->id_pegawai = Auth::user()->id_pegawai;
        $riwayat->kel_nama = $request->kel_nama;
        $riwayat->kel_tempat_lahir = $request->kel_tempat_lahir;
        $riwayat->kel_tanggal_lahir = $request->kel_tanggal_lahir;
        $riwayat->kel_alamat = $request->kel_alamat;
       
        $riwayat->save();

        return redirect()->route('riwayat-keluarga.index')->with('messageberhasil','Data Keluarga Berhasil ditambahkan');
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
        // return "aa";
        $user = User::find(Auth::user()->id);
        $user->email = $request->email;
        $user->update();

        $pegawai = MasterPegawai::find($user->id_pegawai);
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->tempat_lahir = $request->tempat_lahir;
        $pegawai->agama = $request->agama;
        $pegawai->alamat = $request->alamat;
        $pegawai->no_telp = $request->no_telp;
        $pegawai->update();

        return redirect()->back()->with('messageberhasil','Profile Berhasil Diperbahrui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $riwayat = RiwayatKeluarga::where('id_riwayat_keluarga', '=', $id)->first();
        $riwayat->delete();


        return redirect()->back()->with('messagehapus','Data Keluarga Berhasil dihapus');
    }
}
