<?php

namespace App\Models\Riwayat;

use App\Models\MasterData\MasterPegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailRiwayatKeluarga extends Model
{
    protected $table = "tb_detail_hub_keluarga";

    protected $primaryKey = 'id_detail_hub_keluarga';

    protected $fillable = [
        'id_pegawai','nama_hubungan'
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
