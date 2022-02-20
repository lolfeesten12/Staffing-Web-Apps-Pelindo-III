<?php

namespace App\Http\Controllers\WebRequirement;

use App\Http\Controllers\Controller;
use App\Models\WebRequirement\CalonPegawai;
use Illuminate\Http\Request;

class CalonPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calon = CalonPegawai::with('Pengumuman')->where('status_calon','=','Pending')->get();

        return view('user-views.pages.requirement.calonpegawai.index',compact('calon'));
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
        $calon = CalonPegawai::with('Pengumuman')->find($id);
        return view('user-views.pages.requirement.calonpegawai.detail',compact('calon'));
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

    public function getFile($file_cv)
    {
        $file_path = public_path('Resume/'.$file_cv);
        return response()->download($file_path);
    }

    public function getFilePendukung($file_pendukung)
    {
        $file_path = public_path('Resume/'.$file_pendukung);
        return response()->download($file_path);
    }

  
}
