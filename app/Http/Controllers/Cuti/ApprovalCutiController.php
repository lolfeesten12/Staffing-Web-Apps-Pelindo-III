<?php

namespace App\Http\Controllers\Cuti;

use App\Http\Controllers\Controller;
use App\Models\Riwayat\RiwayatCuti;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApprovalCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuti = RiwayatCuti::with('Pegawai')->get();
        return view('user-views.pages.aktivitas.approval-cuti.index', compact('cuti'));
    }

    public function Status(Request $request, $id_riwayat_cuti)
    {
        $request->validate([
            'status_acc' => 'required|in:Terima,Tolak,Diproses'
        ]);
        $item = RiwayatCuti::findOrFail($id_riwayat_cuti);

        $id = RiwayatCuti::getId();
        foreach($id as $value);
        $idlama = $value->id_riwayat_cuti;
        $idbaru = $idlama + 1;
        // $blt = date('y-m');
        $jenis = $item->jenis_cuti;
        

        if($jenis == 'Sakit'){
            $tes = 'S';
        }elseif($jenis == 'Tahunan'){
            $tes = 'THN';
        }elseif($jenis == 'Melahirkan'){
            $tes = 'LHR';
        }elseif($jenis == 'Alasan Penting'){
            $tes = 'AP';
        }

        $cuti_nomor = 'CT.'.$idbaru.'/CT.05.04/'.$tes.'/RBNT-2022';
      
        $item->status_acc = $request->status_acc;
        $item->status_dilaksanakan = 'Belum Dilaksanakan';

        if($item->status_acc == 'Tolak'){
            $item->cuti_nomor = 'Ditolak';
        }else{
            $item->cuti_nomor = $cuti_nomor;
        }

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
        $cuti = RiwayatCuti::with('Pegawai')->find($id);
        $riwayat = RiwayatCuti::with('Pegawai')->where('id_riwayat_cuti', $id)->get();

        return view('user-views.pages.aktivitas.approval-cuti.detail', compact('cuti','riwayat'));
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
