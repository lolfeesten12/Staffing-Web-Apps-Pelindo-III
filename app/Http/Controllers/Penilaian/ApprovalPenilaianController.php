<?php

namespace App\Http\Controllers\Penilaian;

use App\Http\Controllers\Controller;
use App\Models\Penilaian\Nilai;
use Illuminate\Http\Request;

class ApprovalPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $nilai = Nilai::with('Pegawai','Penilai','AtasanPenilai')->get();
        $nilai = Nilai::with('Pegawai','Penilai','AtasanPenilai')->groupBy('periode_mulai','periode_akhir','status_acc')->selectRaw('periode_mulai, periode_akhir, status_acc, COUNT(id_penilaian) as jumlah_pegawai')->get();
        return view('user-views.pages.penilaian.approvalnilai.index', compact('nilai'));
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
    public function show($periode_mulai)
    {
        $nilai = Nilai::with('Pegawai','Penilai','AtasanPenilai')->where('periode_mulai', $periode_mulai)->get();
        // return $nilai
        return view('user-views.pages.penilaian.approvalnilai.detail', compact('nilai'));


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
       
    }

    public function Status(Request $request, $id)
    {
        $request->validate([
            'status_acc' => 'required|in:Approved,Not Approved,Pending'
        ]);

        $item = Nilai::findOrFail($id);
        $item->status_acc = $request->status_acc;
        $item->save();
        
        return redirect()->route('approval-penilaian.show', $item->periode_mulai);
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
