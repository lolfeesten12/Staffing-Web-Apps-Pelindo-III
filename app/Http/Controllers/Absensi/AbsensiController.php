<?php

namespace App\Http\Controllers\Absensi;

use App\Http\Controllers\Controller;
use App\Models\Absensi\Absensi;
use App\Models\Jadwal\JadwalPegawai;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $date = Carbon::now();
        $sekarang = $date->toDateString();

        $jadwal = JadwalPegawai::where('id_pegawai', Auth::user()->id_pegawai)->where('tanggal_masuk', $sekarang)->get();
        if (sizeof($jadwal) == 0) {
            return redirect()->route('profile.index')->with('tidakjadwal', 'tidak');
        }

        $absensi = Absensi::where('id_jadwal', $jadwal[0]->id_jadwal)->get();
        if (sizeof($absensi) != 0) {

            if ($absensi[0]->jenis_absen == 'Cuti' || $absensi[0]->jenis_absen == 'Izin' || $absensi[0]->jenis_absen == 'Sakit') {
                return redirect()->route('profile.index')->with('tidakmasuk', $absensi[0]->jenis_absen);
            }

            if ($absensi[0]->jam_keluar) {
                return redirect()->route('profile.index')->with('sudahkeluar', $absensi[0]->jam_keluar);
            }

            if ($absensi[0]->jam_masuk) {
                return redirect()->route('profile.index')->with('absenkeluar', $absensi[0]->id_absensi);
            }
        }


        // return $absensi;
        return redirect()->route('profile.index')->with('absenmasuk', $jadwal[0]->id_jadwal);

        // return $id;
        // $date = Carbon::now();
        // $sekarang = $date->toDateString();
        // $tanggal = $date->isoFormat('D MMMM Y');
        // $random = rand(11111111, 99999999);
        // $token = $sekarang . '-' . $random;

        // $jumlah_jadwal = JadwalPegawai::where('tanggal_masuk', $sekarang)->count();
        // $jumlah_masuk = Absensi::where('tanggal_absensi', $sekarang)->count();

        // $jadwal = JadwalPegawai::where('tanggal_masuk', $sekarang)->first();

        // $data = QrCode::generate('halo');
        // return $data;

        // return $jumlah_masuk;



        // return $token;


        // $absensi = Absensi::with([
        //     'Jadwal.ShiftKerja', 'Jadwal.Pegawai'
        // ]);
        // if ($request->from) {
        //     $absensi->where('tanggal_absensi', '>=', $request->from);
        // }
        // if ($request->to) {
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
