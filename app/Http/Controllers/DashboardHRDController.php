<?php

namespace App\Http\Controllers;

use App\Models\Jadwal\JadwalPegawai;
use App\Models\MasterData\MasterJabatan;
use App\Models\MasterData\MasterOrientasi;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterShift;
use App\Models\MasterData\MasterUnitKerja;
use App\Models\Mutasi\UsulanMutasi;
use App\Models\Pelatihan\ProgramPelatihan;
use App\Models\Penilaian\Nilai;
use App\Models\Riwayat\RiwayatCuti;
use App\Models\WebRequirement\CalonPegawai;
use App\Models\WebRequirement\Orientasi;
use App\Models\WebRequirement\Pengumuman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardHRDController extends Controller
{
    public function index()
    {
        $hari = Carbon::now();
        $haritext = Carbon::today()->toDayDateTimeString();

        $jumlah_pegawai = MasterPegawai::count();
        $jumlah_unit = MasterUnitKerja::count();
        $jumlah_jabatan = MasterJabatan::count();
        $jumlah_shift_kerja = MasterShift::count();
        $jumlah_orientasi_belum = MasterOrientasi::where('status_orientasi','Belum Terlaksana')->count();
        $jumlah_orientasi_telah = MasterOrientasi::where('status_orientasi','Telah Terlaksana')->count();

        $jumlah_pelatihan_aktif = ProgramPelatihan::where('status','Pending')->count();
        $jumlah_pelatihan_wajib = ProgramPelatihan::where('status','Pending')->where('status_wajib','Wajib')->count();
        
        $jumlah_lowongan = Pengumuman::count();
        $jumlah_lowongan_hari = Pengumuman::where('created_at', '=', $hari)->count();

        $jumlah_pelamar = CalonPegawai::where('status_nilai','Belum dinilai')->count();
        $jumlah_pelamar_hari = CalonPegawai::where('created_at', '=', $hari)->count();

        $jumlah_cuti = RiwayatCuti::where('status_acc','Diproses')->count();
        $jumlah_cuti_pending = RiwayatCuti::where('status_acc','Diproses')->whereMonth('created_at', Carbon::now()->month)->count();
        $jumlah_cuti_terima = RiwayatCuti::where('status_acc','Terima')->whereMonth('created_at', Carbon::now()->month)->count();
        $jumlah_cuti_tolak = RiwayatCuti::where('status_acc','Tolak')->whereMonth('created_at', Carbon::now()->month)->count();

        $internal = UsulanMutasi::where('jenis_mutasi','Mutasi Internal')->count();
        $internal_pending = UsulanMutasi::where('jenis_mutasi','Mutasi Internal')->where('status_approval','Pending')->whereMonth('created_at', Carbon::now()->month)->count();
        $internal_terima = UsulanMutasi::where('jenis_mutasi','Mutasi Internal')->where('status_approval','Terima')->whereMonth('created_at', Carbon::now()->month)->count();
        $internal_tolak = UsulanMutasi::where('jenis_mutasi','Mutasi Internal')->where('status_approval','Tolak')->whereMonth('created_at', Carbon::now()->month)->count();
        $internal_dimutasi = UsulanMutasi::where('jenis_mutasi','Mutasi Internal')->where('status_approval','Dimutasi')->whereMonth('created_at', Carbon::now()->month)->count();

        $promosi = UsulanMutasi::where('jenis_mutasi','Promosi Pangkat')->where('jenis_mutasi','Promosi Jabatan')->where('status_approval','Pending')->count();
        $promosi_pangkat =UsulanMutasi::where('jenis_mutasi','Promosi Pangkat')->where('status_approval','Pending')->whereMonth('created_at', Carbon::now()->month)->count();
        $promosi_jabatan = UsulanMutasi::where('jenis_mutasi','Promosi Jabatan')->where('status_approval','Pending')->whereMonth('created_at', Carbon::now()->month)->count();

        $demosi = UsulanMutasi::where('jenis_mutasi','Demosi Pangkat')->where('jenis_mutasi','Demosi Jabatan')->where('status_approval','Pending')->count();
        $demosi_pangkat = UsulanMutasi::where('jenis_mutasi','Demosi Pangkat')->where('status_approval','Pending')->whereMonth('created_at', Carbon::now()->month)->count();
        $demosi_jabatan = UsulanMutasi::where('jenis_mutasi','Demosi Jabatan')->where('status_approval','Pending')->whereMonth('created_at', Carbon::now()->month)->count();

        $resign = UsulanMutasi::where('jenis_mutasi','Resign')->count();
        $resign_pending = UsulanMutasi::where('jenis_mutasi','Resign')->where('status_approval','Pending')->whereMonth('created_at', Carbon::now()->month)->count();
        $resign_terima = UsulanMutasi::where('jenis_mutasi','Resign')->where('status_approval','Terima')->whereMonth('created_at', Carbon::now()->month)->count();
        $resign_tolak = UsulanMutasi::where('jenis_mutasi','Resign')->where('status_approval','Tolak')->whereMonth('created_at', Carbon::now()->month)->count();
        $resign_dimutasi = UsulanMutasi::where('jenis_mutasi','Resign')->where('status_approval','Dimutasi')->whereMonth('created_at', Carbon::now()->month)->count();


        return view('user-views.pages.dashboardhrd', compact(
            'jumlah_pegawai','jumlah_unit','jumlah_jabatan','jumlah_shift_kerja',
            'jumlah_orientasi_belum','jumlah_orientasi_telah','jumlah_pelatihan_aktif',
            'jumlah_pelatihan_wajib','jumlah_lowongan','jumlah_lowongan_hari',
            'jumlah_pelamar','jumlah_pelamar_hari','hari','haritext',
            'jumlah_cuti','jumlah_cuti_pending','jumlah_cuti_terima','jumlah_cuti_tolak',
            'internal','internal_pending','internal_terima','internal_tolak','internal_dimutasi',
            'promosi','promosi_pangkat','promosi_jabatan','demosi','demosi_pangkat','demosi_jabatan',
            'resign','resign_pending','resign_terima','resign_tolak','resign_dimutasi'
        

        ));
    }

    public function dashboard_pegawai()
    {
        $hari = Carbon::now();
        $haritext = Carbon::today()->toDayDateTimeString();
        $jumlah_pelatihan_wajib = ProgramPelatihan::where('status','Pending')->where('status_wajib','Wajib')->count();
        $jadwal_today = JadwalPegawai::with('ShiftKerja')->where('id_pegawai', Auth::user()->Pegawai->id_pegawai)->where('tanggal_masuk', Carbon::now()->format('Y-m-d'))->get();
        $cuti_proses = RiwayatCuti::where('id_pegawai', Auth::user()->Pegawai->id_pegawai)->where('status_acc','Diproses')->count();
        $cuti_terima = RiwayatCuti::where('id_pegawai', Auth::user()->Pegawai->id_pegawai)->where('status_acc','Terima')->count();
        $cuti_tolak = RiwayatCuti::where('id_pegawai', Auth::user()->Pegawai->id_pegawai)->where('status_acc','Tolak')->count();
        $mutasi = UsulanMutasi::where('id_pegawai', Auth::user()->Pegawai->id_pegawai)->where('status_approval','Dimutasi')->count();
        $nilai = Nilai::where('id_pegawai', Auth::user()->Pegawai->id_pegawai)->where('status_acc','Disahkan')->count();

        $jadwal = JadwalPegawai::where('id_pegawai', Auth::user()->id_pegawai)->where('status','Pending Penukaran')->get();
        $tukarjadwal = JadwalPegawai::where('id_pegawai', Auth::user()->id_pegawai)->where('status','Pending Penukaran')->count();
        if(count($jadwal) > 0){
            Alert::warning('Warning Title', 'Warning Message');
        }

        return view('user-views.pages.dashboardpegawai', compact(
            'jumlah_pelatihan_wajib','jadwal_today','cuti_proses','cuti_terima','cuti_tolak','mutasi',
            'nilai','tukarjadwal','hari','haritext','jadwal'
        ));
    }

    public function indexunit()
    {
        $haritext = Carbon::today()->toDayDateTimeString();
        $jumlah_pegawai = MasterPegawai::where('id_unit_kerja', Auth::user()->Pegawai->UnitKerja->id_unit_kerja)->count();
        $pegawai_unit = MasterPegawai::where('id_unit_kerja', Auth::user()->Pegawai->UnitKerja->id_unit_kerja)->get();

        return view('user-views.pages.dashboardunit', compact('haritext','jumlah_pegawai','pegawai_unit'));
    }

    public function role(Request $request)
    {
        $pegawai = MasterPegawai::where('id_pegawai', Auth::user()->Pegawai->id_pegawai)->first();
        $pegawai->role = $request->role;
        $pegawai->save();

        if($request->role == 'Pegawai'){
            return redirect()->route('profile.index');
        }elseif($request->role == 'Kepala Unit' || $request->role == 'Manager Unit'){
            return redirect()->route('dashboardunit');
        }else{
            return redirect()->route('dashboard');
        }

        
    }
}
