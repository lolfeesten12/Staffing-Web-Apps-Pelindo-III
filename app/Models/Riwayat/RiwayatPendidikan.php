<?php

namespace App\Models\Riwayat;

use App\Models\MasterData\MasterPegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    protected $table = "tb_riwayat_pendidikan";

    protected $primaryKey = 'id_riwayat_pendidikan';

    protected $fillable = [
        'id_pegawai',
        'tipe_pendidikan',
        'nama_sekolah',
        'jurusan',
        'no_ijasah',
        'tanggal_ijasah',
        'file_ijasah'
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
