<?php

namespace App\Http\Controllers\Mutasi\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Mutasi\UsulanMutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PegumumanMutasiController extends Controller
{
    public function pegawai()
    {
        $mutasi = UsulanMutasi::where('id_pegawai', '=', Auth::user()->Pegawai->id_pegawai)->Active()->get();
        return view('user-views.pages.mutasi.mutasi.pengumuman.index', compact('mutasi'));
    }
}
