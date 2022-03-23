<?php

namespace App\Models\Absensi;

use App\Models\Jadwal\JadwalPegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = "tb_absensi";

    protected $primaryKey = 'id_absensi';

    protected $fillable = [
        'id_jadwal',
        'jam_masuk',
        'jam_keluar',
        'keterangan',
        'jenis_absen',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function Jadwal()
    {
        return $this->belongsTo(JadwalPegawai::class, 'id_jadwal', 'id_jadwal');
    }

}
