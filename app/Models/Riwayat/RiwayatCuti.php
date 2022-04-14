<?php

namespace App\Models\Riwayat;

use App\Models\MasterData\MasterPegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function getId()
    {
        $getId = DB::table('tb_riwayat_cuti')->orderBy('id_riwayat_cuti', 'DESC')->take(1)->get();
        if (count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_riwayat_cuti' => 0
            ]
        ];
    }
}
