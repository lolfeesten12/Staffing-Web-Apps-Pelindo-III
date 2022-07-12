<?php

namespace App\Http\Controllers\Mutasi;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterPegawai;
use App\Models\Mutasi\UsulanMutasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MutasiJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mutasi = UsulanMutasi::active()->Jabatan()->get();

        return view('user-views.pages.mutasi.mutasi-jabatan.jabatan.index', compact('mutasi'));
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
        if($request->file_sk){
            $imagePath = $request->file('file_sk');
            $file_surat = $imagePath->getClientOriginalName();
            $imagePath->move(public_path().'/Resume/', $file_surat); 
            $data[] = $file_surat; 
        }

        $item = UsulanMutasi::find($id);
        $item->nomor_sk = $request->nomor_sk;
        $item->tanggal_sk = $request->tanggal_sk;
        $item->id_pejabat = Auth::user()->Pegawai->id_pegawai;
        $item->file_sk = $file_surat;
        $item->status_approval = 'Dimutasi';
        $item->save();

        $pegawai = MasterPegawai::where('id_pegawai', $item->id_pegawai)->first();
        $pegawai->id_jabatan = $item->id_jabatan_tujuan;
        $pegawai->save();

        return redirect()->back()->with('messageberhasil','SK Pegawai Berhasil Diproses, Pegawai telah Dimutasi');
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
