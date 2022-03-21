<?php

namespace App\Models\Riwayat;

use App\Models\MasterData\MasterPegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPrestasi extends Model
{
    protected $table = "tb_riwayat_prestasi";

    protected $primaryKey = 'id_riwayat_prestasi';

    protected $fillable = [
        'id_pegawai',
        'nama_prestasi',
        'tingkat',
        'tanggal',
        'file'
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
