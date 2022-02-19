<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPelanggaran extends Model
{
    protected $table = "tb_master_pelanggaran";

    protected $primaryKey = 'id_pelanggaran';

    protected $fillable = [
        'pelanggaran',
        'id_sanksi',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function Sanksi()
    {
        return $this->belongsTo(MasterSanksi::class, 'id_sanksi', 'id_sanksi');
    }
}
