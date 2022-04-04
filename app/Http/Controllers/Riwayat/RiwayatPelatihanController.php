<?php

namespace App\Http\Controllers\Riwayat;

use App\Http\Controllers\Controller;
use App\Models\Pelatihan\DetailPelatihan;
use App\Models\Pelatihan\ProgramPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatPelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $riwayat = ProgramPelatihan::where('status_wajib', '=', 'Wajib')->where('status', '=', 'Selesai')->get();
        $detail = DetailPelatihan::with('Pegawai','Pelatihan')->join('tb_riwayat_pelatihan','tb_detail_pelatihan.id_pelatihan','tb_riwayat_pelatihan.id_pelatihan')
        ->where('id_pegawai', Auth::user()->Pegawai->id_pegawai)
        ->where('status','=', 'Selesai')
        ->get();

        return view('user-views.pages.riwayat.riwayatpelatihan', compact('riwayat','detail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
