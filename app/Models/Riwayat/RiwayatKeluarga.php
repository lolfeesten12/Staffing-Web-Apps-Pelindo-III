<?php

namespace App\Models\Riwayat;

use App\Models\MasterData\MasterHubungan;
use App\Models\MasterData\MasterHubunganKeluarga;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MasterData\MasterPegawai;


class RiwayatKeluarga extends Model
{
    protected $table = "tb_riwayat_keluarga";

    protected $primaryKey = 'id_riwayat_keluarga';

    protected $fillable = [
        'id_pegawai','hubungan_keluarga', 'kel_nama', 'kel_tempat_lahir', 'kel_tanggal_lahir',
        'kel_alamat', 'id_detail_hub_keluarga'
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
    public function DetailHubungan()
    {
        return $this->belongsTo(DetailRiwayatKeluarga::class, 'id_pegawai', 'id_pegawai');
    }
}
