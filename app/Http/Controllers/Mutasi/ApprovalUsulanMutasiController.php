<?php

namespace App\Http\Controllers\Mutasi;

use App\Http\Controllers\Controller;
use App\Models\Mutasi\UsulanMutasi;
use Illuminate\Http\Request;

class ApprovalUsulanMutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usulan = UsulanMutasi::where('jenis_mutasi','Mutasi Internal')->orWhere('jenis_mutasi','Resign')->get();
        return view('user-views.pages.mutasi.approval.mutasi.index', compact('usulan'));
    }

    public function Status(Request $request, $id)
    {
        // $request->validate([
        //     'status' => 'required|in:Terima,Tolak,Pending'
        // ]);

        $item = UsulanMutasi::find($id);
        $item->status_approval = $request->status_approval;
        $item->keterangan_approval = $request->keterangan_approval;
        $item->save();

        return redirect()->route('approval-mutasi.index');
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
        $item = UsulanMutasi::find($id);
        return view('user-views.pages.mutasi.approval.mutasi.detail', compact('item'));
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
