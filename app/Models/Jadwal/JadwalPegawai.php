<?php

namespace App\Models\Jadwal;

use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterShift;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPegawai extends Model
{
    protected $table = "tb_jadwal_pegawai";

    protected $primaryKey = 'id_jadwal';

    protected $fillable = [
        'id_pegawai',
        'id_shift_kerja',
        'id_atasan',
        'tanggal_masuk',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function ShiftKerja()
    {
        return $this->belongsTo(MasterShift::class, 'id_shift_kerja', 'id_shift_kerja');
    }

    public function Pegawai()
    {
        return $this->belongsTo(MasterPegawai::class, 'id_pegawai', 'id_pegawai');
    }

    public function id_atasan()
    {
        return $this->belongsTo(MasterPegawai::class, 'id_pegawai', 'id_atasan');
    }
}
