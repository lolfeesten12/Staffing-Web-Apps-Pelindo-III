<?php

namespace App\Models\Pelatihan;

use App\Models\MasterData\MasterPegawai;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPelatihan extends Model
{
    protected $table = "tb_detail_pelatihan";

    protected $primaryKey = 'id_detail_pelatihan';

    protected $fillable = [
        'id_pegawai',
        'id_pelatihan'
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

    public function Pelatihan()
    {
        return $this->belongsTo(ProgramPelatihan::class, 'id_pelatihan', 'id_pelatihan');
    }
}
