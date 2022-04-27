<?php

namespace App\Http\Controllers\Absensi;

use App\Http\Controllers\Controller;
use App\Models\Absensi\Absensi;
use App\Models\Jadwal\JadwalPegawai;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Carbon\Carbon;

class AbsenManualController extends Controller
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

        $pegawai_tidak_masuk = Absensi::where('tanggal_absensi', $sekarang)->where('jam_masuk', NULL)->count();
        $pegawai_masuk = Absensi::where('tanggal_absensi', $sekarang)->whereNotNull('jam_masuk')->count();




        $jadwal = JadwalPegawai::where('tanggal_masuk', $sekarang)->first();
        $jadwal_pegawai = JadwalPegawai::with(['ShiftKerja', 'Pegawai', 'Absen'])->where('tanggal_masuk', $sekarang)->get();

        $data = QrCode::size(500)->generate($link);
        // return $jadwal_pegawai;

        // return $jumlah_masuk;



        // return $token;


        $absensi = Absensi::with([
            'Jadwal.ShiftKerja', 'Jadwal.Pegawai'
        ]);
        if ($request->from) {
            $absensi->where('tanggal_absensi', '>=', $request->from);
        }
        if ($request->to) {
            $absensi->where('tanggal_absensi', '<=', $request->to);
        }

        $absensi = $absensi->get();



        return view('user-views.pages.aktivitas.absen-manual.index', compact('pegawai_masuk', 'pegawai_tidak_masuk', 'tanggal', 'jumlah_jadwal', 'jumlah_masuk', 'jadwal', 'data', 'jadwal_pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function absen()
    {
        return 'ads';
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
        $jam = $request->jam;
        $jenis = $request->tipe;

        $absen = new Absensi();
        $absen->tanggal_absensi = $tanggal;
        $absen->id_jadwal = $request->id_jadwal;
        if ($jenis == 'masuk') {
            $absen->jam_masuk = $sekarang;

            $absen->jenis_absen = 'Sakit';
            if ($sekarang > $jam) {
                $absen->jenis_absen = 'Terlambat';
            } else {
                $absen->jenis_absen = 'Masuk';
            }
        } else {
            $absen->jenis_absen = $request->jenis_absen;
            $absen->keterangan = $request->keterangan;
        }


        $absen->save();



        return redirect()->back();
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
        $date = Carbon::now();
        $sekarang = $date->toTimeString();
        $tanggal = $date->toDateString();
        $jam = $request->jam;
        $jenis = $request->tipe;


        if ($jenis == 'keluar') {
            $absen = Absensi::find($id);
            $absen->jam_keluar = $sekarang;
            $absen->update();
        } elseif ($jenis == 'masuk') {
            $absen = new Absensi();
            $absen->jam_masuk = $sekarang;
            $absen->tanggal_absensi = $tanggal;

            $absen->id_jadwal = $request->id_jadwal;
            if ($sekarang > $jam) {
                $absen->jenis_absen = 'Terlambat';
            } else {
                $absen->jenis_absen = 'Masuk';
            }
            $absen->save();
        }



        return redirect()->back();
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
