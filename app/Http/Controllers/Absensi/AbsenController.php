<?php

namespace App\Http\Controllers\Absensi;

use App\Http\Controllers\Controller;
use App\Models\Absensi\Absensi;
use App\Models\Jadwal\JadwalPegawai;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        return view('user-views.pages.aktivitas.qr-absensi.absen');
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
        $date = Carbon::now();
        $sekarang = $date->toTimeString();
        $tanggal = $date->toDateString();


        $absensi = Absensi::find($request->id_absensi);
        if ($request->tipe == 'keluar') {
            $absensi->jam_keluar = $sekarang;
            $absensi->update();
        }
        if ($request->tipe == 'masuk') {
            $absensi = new Absensi();
            $absensi->jam_masuk = $sekarang;
            $absensi->tanggal_absensi = $tanggal;

            $absensi->id_jadwal = $request->id_jadwal;
            if ($sekarang > '08:00:00') {
                $absensi->jenis_absen = 'Terlambat';
            } else {
                $absensi->jenis_absen = 'Masuk';
            }
            $absensi->save();
        }

        return redirect()->route('profile.index')->with('messageberhasil', 'Berhasil Absen');
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
