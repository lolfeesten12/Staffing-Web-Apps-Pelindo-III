<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterShift extends Model
{
    protected $table = "tb_master_shift_kerja";

    protected $primaryKey = 'id_shift_kerja';

    protected $fillable = [
        'jenis_shift',
        'jam_masuk',
        'jam_selesai'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;
}
