<?php

namespace App\Http\Controllers\Cuti;

use App\Http\Controllers\Controller;
use App\Models\Riwayat\RiwayatCuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('user-views.pages.aktivitas.cuti.index');
    }

    public function Status(Request $request, $id_riwayat_cuti)
    {
        $request->validate([
            'status_acc' => 'required|in:Terima,Tolak,Diproses'
        ]);

        $item = RiwayatCuti::findOrFail($id_riwayat_cuti);
        $item->status_acc = $request->status_acc;

        $item->save();
        return redirect()->route('approval-cuti.index');
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
        // return $request;

        $cuti = new RiwayatCuti();
        $cuti->jenis_cuti = $request->jenis_cuti;
        $cuti->tanggal_mulai = $request->tanggal_mulai;
        $cuti->tanggal_selesai = $request->tanggal_selesai;
        $cuti->alasan = $request->alasan;
        $cuti->id_pegawai = Auth::user()->id_pegawai;
        $cuti->status_acc = 'Diproses';
        $cuti->cuti_lama = $request->cuti_lama;

        $cuti->save();

        return redirect()->route('cuti.index')->with('messageberhasil', 'Data Cuti Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuti = RiwayatCuti::with('Pegawai')->find($id);
        $riwayat = RiwayatCuti::with('Pegawai')->where('id_riwayat_cuti', $id)->get();

        return view('user-views.pages.aktivitas.approval-cuti.detail', compact('cuti', 'riwayat'));
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
