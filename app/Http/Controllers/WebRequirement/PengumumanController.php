<?php

namespace App\Http\Controllers\WebRequirement;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterJabatan;
use App\Models\MasterData\MasterUnitKerja;
use App\Models\WebRequirement\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::with('Jabatan')->get();
        return view('user-views.pages.requirement.pengumuman.index',compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = MasterJabatan::get();

        return view('user-views.pages.requirement.pengumuman.create',compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengumuman = new Pengumuman;
        $pengumuman->id_jabatan = $request->id_jabatan;
        $pengumuman->nama_pengumuman = $request->nama_pengumuman;
        $pengumuman->job_description = $request->job_description;
        $pengumuman->job_requirement = $request->job_requirement;
        $pengumuman->job_type = $request->job_type;
        $pengumuman->penempatan = $request->penempatan;
        $pengumuman->kisaran_gaji = $request->kisaran_gaji;
        $pengumuman->job_years_experience = $request->job_years_experience;
        $pengumuman->tanggal_mulai = $request->tanggal_mulai;
        $pengumuman->tanggal_selesai = $request->tanggal_selesai;
        $pengumuman->qualification = $request->qualification;
        $pengumuman->save();

        return redirect()->route('pengumuman.index')->with('messageberhasil','Data Pengumuman Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengumuman = Pengumuman::with('Jabatan')->find($id);

        return view('user-views.pages.requirement.pengumuman.detail',compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengumuman = Pengumuman::with('Jabatan')->find($id);
        $jabatan = MasterJabatan::get();

        return view('user-views.pages.requirement.pengumuman.edit',compact('pengumuman','jabatan'));
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
        $pengumuman = Pengumuman::find($id);
        $pengumuman->id_jabatan = $request->id_jabatan;
        $pengumuman->nama_pengumuman = $request->nama_pengumuman;
        $pengumuman->job_description = $request->job_description;
        $pengumuman->job_requirement = $request->job_requirement;
        $pengumuman->job_type = $request->job_type;
        $pengumuman->penempatan = $request->penempatan;
        $pengumuman->kisaran_gaji = $request->kisaran_gaji;
        $pengumuman->job_years_experience = $request->job_years_experience;
        $pengumuman->tanggal_mulai = $request->tanggal_mulai;
        $pengumuman->tanggal_selesai = $request->tanggal_selesai;
        $pengumuman->qualification = $request->qualification;
        $pengumuman->update();

        return redirect()->route('pengumuman.index')->with('messageberhasil','Data Pengumuman Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();
        return redirect()->back()->with('messagehapus','Data Pengumuman Berhasil dihapus');
    }
}
