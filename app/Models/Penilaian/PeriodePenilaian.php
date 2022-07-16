<?php

namespace App\Models\Penilaian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodePenilaian extends Model
{
    protected $table = "tb_periode_penilaian";

    protected $primaryKey = 'id_periode';

    protected $fillable = [
        'periode_mulai',
        'periode_akhir'
        
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public $timestamps = true;
}
