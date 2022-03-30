<?php

namespace App\Http\Controllers\Absensi;

use App\Http\Controllers\Controller;
use App\Models\Absensi\Absensi;
use App\Models\Jadwal\JadwalPegawai;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Carbon\Carbon;

class QrAbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $date = Carbon::now();
        $sekarang = $date->toDateString();
        $tanggal = $date->isoFormat('D MMMM Y');
        $random = rand(11111111, 99999999);
        $token = $sekarang . '-' . $random;
        $link = 'http://127.0.0.1:8000/absen/' . $token;

        $jumlah_jadwal = JadwalPegawai::where('tanggal_masuk', $sekarang)->count();
        $jumlah_masuk = Absensi::where('tanggal_absensi', $sekarang)->count();

        $jadwal = JadwalPegawai::where('tanggal_masuk', $sekarang)->first();

        $data = QrCode::size(500)->generate($link);
        // return $data;

        // return $jumlah_masuk;



        // return $token;


        // $absensi = Absensi::with([
        //     'Jadwal.ShiftKerja','Jadwal.Pegawai'
        // ]);
        // if($request->from){
        //     $absensi->where('tanggal_absensi', '>=', $request->from);
        // }
        // if($request->to){
        //     $absensi->where('tanggal_absensi', '<=', $request->to);
        // }

        // $absensi = $absensi->get();



        return view('user-views.pages.aktivitas.qr-absensi.index', compact('tanggal', 'jumlah_jadwal', 'jumlah_masuk', 'jadwal', 'data'));
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
        $date = Carbon::now();
        $sekarang = $date->toDateString();
        $tanggal = $date->isoFormat('D MMMM Y');
        $random = rand(11111111, 99999999);
        $token = $sekarang . '-' . $random;

        $jadwals = JadwalPegawai::where('tanggal_masuk', $sekarang)->get();
        foreach ($jadwals as $jadwal) {
            $jadwal->qrcode = $token;
            $jadwal->update();
        }

        // return 'aman';
        return redirect()->route('Qr-absensi.index')->with('messageberhasil', 'QR Code Berhasil Dibuat');
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
