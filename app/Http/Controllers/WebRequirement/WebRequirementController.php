<?php

namespace App\Http\Controllers\WebRequirement;

use App\Http\Controllers\Controller;
use App\Models\WebRequirement\CalonPegawai;
use App\Models\WebRequirement\Pengumuman;
use Illuminate\Http\Request;

class WebRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::with('Jabatan')->get();
        return view('user-views.pages.requirement.webrequirement.list', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $pengumuman = Pengumuman::find($id);

        return view('user-views.pages.requirement.webrequirement.detail',compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengumuman = Pengumuman::find($id);

        return view('user-views.pages.requirement.webrequirement.lamar',compact('pengumuman'));
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
        if ($request->file('file_pendukung')) {
            $imagePath = $request->file('file_pendukung');
            $file_pendukung = $imagePath->getClientOriginalName();
            $imagePath->move(public_path().'/Resume/', $file_pendukung); 
            $data[] = $file_pendukung;

            $Path = $request->file('file_cv');
            $file_cv = $Path->getClientOriginalName();
            $Path->move(public_path().'/Resume/', $file_cv); 
            $data2[] = $file_cv;

            $calon = new CalonPegawai;
            $calon->id_pengumuman = $id;
            $calon->nama_lengkap = $request->nama_lengkap;
            $calon->nama_panggilan = $request->nama_panggilan;
            $calon->email = $request->email;
            $calon->no_telp = $request->no_telp;
            $calon->alamat_lengkap = $request->alamat_lengkap;
            $calon->status_calon = 'Pending';
            $calon->file_pendukung = $file_pendukung;
            $calon->file_cv = $file_cv;
            $calon->pendidikan_terakhir = $request->pendidikan_terakhir;
            $calon->jurusan = $request->jurusan;    
            $calon->status_nilai = 'Belum dinilai';
            $calon->save();

        }else{
            $Path = $request->file('file_cv');
            $file_cv = $Path->getClientOriginalName();
            $Path->move(public_path().'/Resume/', $file_cv); 
            $data2[] = $file_cv;

            $calon = new CalonPegawai;
            $calon->id_pengumuman = $id;
            $calon->nama_lengkap = $request->nama_lengkap;
            $calon->nama_panggilan = $request->nama_panggilan;
            $calon->email = $request->email;
            $calon->no_telp = $request->no_telp;
            $calon->alamat_lengkap = $request->alamat_lengkap;
            $calon->pendidikan_terakhir = $request->pendidikan_terakhir;
            $calon->jurusan = $request->jurusan;
            $calon->status_calon = 'Pending';
            $calon->file_cv = $file_cv;
            $calon->status_nilai = 'Belum dinilai';
            $calon->save();
        }

        return redirect()->route('web-requirement.show', $id)->with('messageberhasil','Data Lamaran Anda Berhasil Tersimpan, Mohon Tunggu Info Selanjutnya');
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
