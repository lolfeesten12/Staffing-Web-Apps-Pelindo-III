<?php

namespace App\Models;

use App\Models\MasterData\MasterHubunganKeluarga;
use App\Models\MasterData\MasterPegawai;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatKeluarga extends Model
{
    protected $table = "tb_riwayat_keluarga";

    protected $primaryKey = 'id_riwayat_keluarga';

    protected $fillable = [
        'id_pegawai', 'id_hub_keluarga', 'kel_nama', 'kel_tempat_lahir', 'kel_tanggal_lahir', 'kel_alamat'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function Hubungan()
    {
        return $this->belongsTo(MasterHubunganKeluarga::class, 'id_hub_keluarga', 'id_hub_keluarga');
    }

    public function Pegawai()
    {
        return $this->belongsTo(MasterPegawai::class, 'id_pegawai', 'id_pegawai');
    }
    
}
