<?php

namespace App\Models\Penilaian;

use App\Models\MasterData\MasterPegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        'nilai_tanggung_jawab',
        'nilai_integritas',
        'nilai_komitmen',
        'nilai_disiplin',
        'nilai_kerjasama',
        'nilai_sikap',
        'nilai_kepemimpinan',
        'nilai_rata2',
        'nilai_total',
        'catatan_penilaian',
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
        return $this->belongsTo(MasterPegawai::class, 'id_penilai', 'id_pegawai');
    }

    public function AtasanPenilai()
    {
        return $this->belongsTo(MasterPegawai::class, 'id_atasan_penilai', 'id_pegawai');
    }

    public static function getId()
    {
        $getId = DB::table('tb_penilaian_kerja')->orderBy('id_penilaian', 'DESC')->take(1)->get();
        if (count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_penilaian' => 0
            ]
        ];
    }
}
