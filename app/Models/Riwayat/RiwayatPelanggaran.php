<?php

namespace App\Models\Riwayat;

use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterPelanggaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RiwayatPelanggaran extends Model
{
    protected $table = "tb_riwayat_pelanggaran";

    protected $primaryKey = 'id_riwayat_pelanggaran';

    protected $fillable = [
        'id_pegawai',
        'id_pelanggaran',
        'no_surat',
        'id_pejabat',
        'keterangan',
        'tanggal'
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
    public function Pelanggaran()
    {
        return $this->belongsTo(MasterPelanggaran::class, 'id_pelanggaran', 'id_pelanggaran');
    }
    public function Pejabat()
    {
        return $this->belongsTo(MasterPegawai::class, 'id_pejabat', 'id_pegawai');
    }

    public static function getId()
    {
        $getId = DB::table('tb_riwayat_pelanggaran')->orderBy('id_riwayat_pelanggaran', 'DESC')->take(1)->get();
        if (count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_riwayat_pelanggaran' => 0
            ]
        ];
    }
}
