<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterPegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = User::with('Pegawai')->where('id', Auth::user()->id)->first();
        // return $user;
        return view('user-views.pages.password');

        // return redirect()->back()->with('messagegagal', 'Data Orientasi Berhasil dihapus');
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
        $user = User::find(Auth::user()->id);
        if ($request->password == $request->password_confirmation) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('profile.index')->with('messageberhasil', 'Password Berhasil Diubah');
        }
        return redirect()->back()->with('messagegagal', 'Konfirmasi Password Harus Sama');
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

        return redirect()->back()->with('messageberhasil', 'Profile Berhasil Diperbahrui');
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
