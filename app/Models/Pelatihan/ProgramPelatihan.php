<?php

namespace App\Models\Pelatihan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProgramPelatihan extends Model
{
    protected $table = "tb_pelatihan";

    protected $primaryKey = 'id_pelatihan';

    protected $fillable = [
        'nama_pelatihan',
        'no_pelatihan',
        'penyelenggara',
        'jenis_pelatihan',
        'periode_awal',
        'periode_akhir',
        'biaya',
        'status_wajib',
        'contact_info',
        'keterangan',
        'cover_foto'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public static function getId()
    {
        $getId = DB::table('tb_pelatihan')->orderBy('id_pelatihan', 'DESC')->take(1)->get();
        if (count($getId) > 0) return $getId;
        return (object)[
            (object)[
                'id_pelatihan' => 0
            ]
        ];
    }
}
