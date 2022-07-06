<?php

namespace App\Http\Controllers;

use App\Models\MasterData\MasterJabatan;
use App\Models\MasterData\MasterOrientasi;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterShift;
use App\Models\MasterData\MasterUnitKerja;
use App\Models\Pelatihan\ProgramPelatihan;
use App\Models\Riwayat\RiwayatCuti;
use App\Models\WebRequirement\CalonPegawai;
use App\Models\WebRequirement\Orientasi;
use App\Models\WebRequirement\Pengumuman;
use Carbon\Carbon;
use Illuminate\Http\Request;

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


        return view('user-views.pages.dashboardhrd', compact(
            'jumlah_pegawai','jumlah_unit','jumlah_jabatan','jumlah_shift_kerja',
            'jumlah_orientasi_belum','jumlah_orientasi_telah','jumlah_pelatihan_aktif',
            'jumlah_pelatihan_wajib','jumlah_lowongan','jumlah_lowongan_hari',
            'jumlah_pelamar','jumlah_pelamar_hari','hari','haritext',
            'jumlah_cuti','jumlah_cuti_pending','jumlah_cuti_terima','jumlah_cuti_tolak'
        

        ));
    }
}
