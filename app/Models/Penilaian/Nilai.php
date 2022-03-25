<?php

namespace App\Models\Penilaian;

use App\Models\MasterData\MasterPegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = "tb_penilaian_kerja";

    protected $primaryKey = 'id_penilaian';

    protected $fillable = [
        'no_penilaian',
        'id_pegawai',
        'id_penilai',
        'id_atasan_penilai',
        'periode_mulai',
        'periode_akhir',
        'tanggal_buat',
        'tanggal_terima',
        'nilai_skp',
        'nilai_orientasi_pelayanan',
        'nilai_integritas',
        'nilai_komitmen',
        'nilai_disiplin',
        'nilai_kerjasama',
        'nilai_prakarsa',
        'nilai_kepemimpinan',
        'nilai_jumlah',
        'nilai_rata2',
        'nilai_total',
        'nilai_prestasi_kerja',
        'keberatan',
        'tanggal_keberatan',
        'tanggapan_penilai',
        'tanggal_tanggapan',
        'tanggal_setuju',
        'status_acc',
        'file',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function Pegawai()
    {
        return $this->belongsTo(MasterPegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function Penilai()
    {
        return $this->belongsTo(MasterPegawai::class, 'id_pegawai', 'id_atasan');
    }

    public function AtasanPenilai()
    {
        return $this->belongsTo(MasterPegawai::class, 'id_pegawai', 'id_atasan_penilai');
    }
}
