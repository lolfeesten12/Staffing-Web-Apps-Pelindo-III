<?php

namespace App\Models\Mutasi;

use App\Models\MasterData\MasterJabatan;
use App\Models\MasterData\MasterPangkat;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterUnitKerja;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MutasiPegawai extends Model
{
    protected $table = "tb_mutasi";

    protected $primaryKey = 'id_mutasi';

    protected $fillable = [
        'id_usulan',
        'no_sk',
        'id_pejabat',
        'tanggal_sk',
        'file_sk_mutasi',
        'status_pegawai',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;

    public function Usulan()
    {
        return $this->belongsTo(UsulanMutasi::class, 'id_usulan', 'id_usulan');
    }

    public function Pejabat()
    {
        return $this->belongsTo(MasterPegawai::class, 'id_pejabat', 'id_pegawai');
    }

}
