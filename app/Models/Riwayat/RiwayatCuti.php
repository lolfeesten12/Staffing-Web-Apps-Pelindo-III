<?php

namespace App\Models\Riwayat;

use App\Models\MasterData\MasterPegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatCuti extends Model
{
    protected $table = "tb_riwayat_cuti";

    protected $primaryKey = 'id_riwayat_cuti';

    protected $fillable = [
        'id_pegawai',
        'cuti_nomor',
        'cuti_lama',
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan',
        'status_acc',
        'jenis_cuti',
        'status_dilaksanakan'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function Pegawai()
    {
        return $this->belongsTo(MasterPegawai::class, 'id_pegawai', 'id_pegawai');
    }
}
