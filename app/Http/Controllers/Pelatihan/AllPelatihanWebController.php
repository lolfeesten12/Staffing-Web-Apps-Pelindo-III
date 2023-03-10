<?php

namespace App\Http\Controllers\Pelatihan;

use App\Http\Controllers\Controller;
use App\Models\Pelatihan\DetailPelatihan;
use App\Models\Pelatihan\ProgramPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllPelatihanWebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelatihan = ProgramPelatihan::get();

        return view('user-views.pages.requirement.webrequirement.pelatihan.index', compact('pelatihan'));
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
        $pelatihan = ProgramPelatihan::find($id);
        return view('user-views.pages.requirement.webrequirement.pelatihan.detail', compact('pelatihan'));
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
        if(DetailPelatihan::where('id_pelatihan', $id)->where('id_pegawai', Auth::user()->Pegawai->id_pegawai)->exists()){
            return redirect()->back()->with('gagal','Error! Maaf Anda Telah Terdaftar pada Program Pelatihan');
        }else{
            $pelatihan = new DetailPelatihan;
            $pelatihan->id_pelatihan = $id;
            $pelatihan->id_pegawai = Auth::user()->Pegawai->id_pegawai;
            $pelatihan->save();
    
            return redirect()->back()->with('messageberhasil','Berhasil! Anda Telah Terdaftar pada Program');
        }

        
        
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
