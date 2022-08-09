<?php

namespace App\Http\Controllers\Pelatihan;

use App\Http\Controllers\Controller;
use App\Models\Pelatihan\DetailPelatihan;
use App\Models\Pelatihan\ProgramPelatihan;
use Illuminate\Http\Request;

class ProgramPelatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelatihan = ProgramPelatihan::get();
        return view('user-views.pages.pelatihan.index', compact('pelatihan'));
        
    }

    public function Peserta($id_pelatihan)
    {
        // $detail = ProgramPelatihan::with('Detail')->where('id_pelatihan', $id_pelatihan)->get();
        $detail = DetailPelatihan::with('Pelatihan','Pegawai')->where('id_pelatihan', $id_pelatihan)->get();
        $tes = ProgramPelatihan::find($id_pelatihan);
       
        return view('user-views.pages.pelatihan.peserta', compact('detail','tes'));
    }

    public function Selesai($id_pelatihan)
    {
        $pelatihan = ProgramPelatihan::find($id_pelatihan);
        $pelatihan->status = 'Selesai';
        $pelatihan->save();

        return redirect()->bacK()->with('messageberhasil','Program Pelatihan Berhasil Dijalankan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-views.pages.pelatihan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = ProgramPelatihan::getId();
        foreach($id as $value);
        $idlama = $value->id_pelatihan;
        $idbaru = $idlama + 1;
        $mulai = date("m",strtotime($request->periode_awal));
        $akhir = date("m",strtotime($request->periode_akhir));
        $no_pelatihan = 'PLTH'.'/'.$mulai.'-'.$akhir.'/'.$idbaru;

        if ($request->file('cover_foto')) {
            $imagePath = $request->file('cover_foto');
            $cover_foto = $imagePath->getClientOriginalName();
           
            $imagePath->move(public_path().'/pelatihan/', $cover_foto); 
            $data[] = $cover_foto;

            $pelatihan = new ProgramPelatihan;
            $pelatihan->no_pelatihan =  $no_pelatihan;
            $pelatihan->nama_pelatihan = $request->nama_pelatihan;
            $pelatihan->jenis_pelatihan = $request->jenis_pelatihan;
            $pelatihan->penyelenggara = $request->penyelenggara;
            $pelatihan->periode_awal = $request->periode_awal;
            $pelatihan->periode_akhir = $request->periode_akhir;
            $pelatihan->biaya = $request->biaya;
            $pelatihan->contact_info = $request->contact_info;
            $pelatihan->status_wajib = $request->status_wajib;
            $pelatihan->keterangan = $request->keterangan;
            $pelatihan->cover_foto = $cover_foto;
            $pelatihan->status = 'Pending';
            $pelatihan->save();
        }else{
            $pelatihan = new ProgramPelatihan;
            $pelatihan->no_pelatihan =  $no_pelatihan;
            $pelatihan->nama_pelatihan = $request->nama_pelatihan;
            $pelatihan->jenis_pelatihan = $request->jenis_pelatihan;
            $pelatihan->penyelenggara = $request->penyelenggara;
            $pelatihan->periode_awal = $request->periode_awal;
            $pelatihan->periode_akhir = $request->periode_akhir;
            $pelatihan->biaya = $request->biaya;
            $pelatihan->contact_info = $request->contact_info;
            $pelatihan->status_wajib = $request->status_wajib;
            $pelatihan->keterangan = $request->keterangan;
            $pelatihan->status = 'Pending';
            $pelatihan->save();
        }


        return redirect()->route('program-pelatihan.index')->with('messageberhasil','Data Pelatihan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = ProgramPelatihan::find($id);
        return view('user-views.pages.pelatihan.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = ProgramPelatihan::find($id);
        return view('user-views.pages.pelatihan.edit', compact('item'));
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
        if ($request->file('cover_foto')) {
            $imagePath = $request->file('cover_foto');
            $cover_foto = $imagePath->getClientOriginalName();
           
            $imagePath->move(public_path().'/pelatihan/', $cover_foto); 
            $data[] = $cover_foto;

            $pelatihan = ProgramPelatihan::find($id);
            $pelatihan->nama_pelatihan = $request->nama_pelatihan;
            $pelatihan->jenis_pelatihan = $request->jenis_pelatihan;
            $pelatihan->penyelenggara = $request->penyelenggara;
            $pelatihan->periode_awal = $request->periode_awal;
            $pelatihan->periode_akhir = $request->periode_akhir;
            $pelatihan->biaya = $request->biaya;
            $pelatihan->contact_info = $request->contact_info;
            $pelatihan->status_wajib = $request->status_wajib;
            $pelatihan->keterangan = $request->keterangan;
            $pelatihan->cover_foto = $cover_foto;
            $pelatihan->update();
        }else{
            $pelatihan = ProgramPelatihan::find($id);
            $pelatihan->nama_pelatihan = $request->nama_pelatihan;
            $pelatihan->jenis_pelatihan = $request->jenis_pelatihan;
            $pelatihan->penyelenggara = $request->penyelenggara;
            $pelatihan->periode_awal = $request->periode_awal;
            $pelatihan->periode_akhir = $request->periode_akhir;
            $pelatihan->biaya = $request->biaya;
            $pelatihan->contact_info = $request->contact_info;
            $pelatihan->status_wajib = $request->status_wajib;
            $pelatihan->keterangan = $request->keterangan;
            $pelatihan->update();
        }

        return redirect()->route('program-pelatihan.index')->with('messageberhasil','Data Pelatihan Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelatihan = ProgramPelatihan::find($id);
        $pelatihan->delete();

        return redirect()->back()->with('messagehapus','Data Pelatihan Berhasil dihapus');
    }
}
