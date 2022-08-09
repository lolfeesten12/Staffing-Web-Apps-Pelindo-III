<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\MasterData\MasterJabatan;
use App\Models\MasterData\MasterPangkat;
use App\Models\MasterData\MasterPegawai;
use App\Models\MasterData\MasterPenempatan;
use App\Models\MasterData\MasterSubUnit;
use App\Models\MasterData\MasterUnitKerja;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = MasterPegawai::with('Jabatan','UnitKerja','Pangkat')->get();
       
        return view('user-views.pages.masterdata.pegawai.index',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = MasterJabatan::get();
        $unit = MasterUnitKerja::get();
        $pangkat = MasterPangkat::get();
        $penempatan = MasterPenempatan::get();
        $sub = MasterSubUnit::get();

        return view('user-views.pages.masterdata.pegawai.create',compact('jabatan','unit','pangkat','penempatan','sub'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('avatar')) {
            $imagePath = $request->file('avatar');
            $avatar = $imagePath->getClientOriginalName();
           
            $imagePath->move(public_path().'/profile/', $avatar); 
            $data[] = $avatar;
        }

        $pegawai = new MasterPegawai;
        $pegawai->id_jabatan = $request->id_jabatan;
        $pegawai->id_unit_kerja = $request->id_unit_kerja;
        $pegawai->id_sub_unit = $request->id_sub_unit;
        $pegawai->id_pangkat = $request->id_pangkat;
        $pegawai->id_penempatan = $request->id_penempatan;
        $pegawai->nama_pegawai = $request->nama_pegawai;
        $pegawai->nama_panggilan = $request->nama_panggilan;
        $pegawai->nik_pegawai = $request->nik_pegawai;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->tempat_lahir = $request->tempat_lahir;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->no_telp = $request->no_telp;
        $pegawai->agama = $request->agama;
        $pegawai->alamat = $request->alamat;
        $pegawai->role = $request->role;
        $pegawai->avatar = $avatar;
        $pegawai->save();

        $user = new User;
        $user->id_pegawai = $pegawai->id_pegawai;
        $user->name = $pegawai->nama_panggilan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->email_verified_at = Carbon::now();
        $user->save();

        event(new Registered($user));

        return redirect()->route('pegawai.index')->with('messageberhasil','Data Pegawai Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = MasterPegawai::with('Jabatan','Unitkerja','User','Pangkat')->find($id);
        return view('user-views.pages.masterdata.pegawai.detail',compact('pegawai'));
    }

    public function GetRiwayat($id_pegawai)
    {
        $pegawai = MasterPegawai::with('Jabatan','Unitkerja','User','RiwayatKeluarga','RiwayatPendidikan','RiwayatPrestasi','RiwayatCuti','RiwayatPelanggaran')->find($id_pegawai);
        return view('user-views.pages.masterdata.pegawai.getriwayat',compact('pegawai'));
    }

    public function GetPangkat($id)
    {
        $pangkat = MasterPangkat::where('id_jabatan', '=', $id)->pluck('nama_pangkat', 'id_pangkat');
        // return $merk;
        return json_encode($pangkat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pegawai = MasterPegawai::with('Jabatan','Unitkerja','User')->find($id);
        $jabatan = MasterJabatan::get();
        $unit = MasterUnitKerja::get();
        $pangkat = MasterPangkat::Get();

        return view('user-views.pages.masterdata.pegawai.edit', compact('pegawai','jabatan','unit','pangkat'));
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
        if ($request->file('avatar')) {
            $imagePath = $request->file('avatar');
            $avatar = $imagePath->getClientOriginalName();
           
            $imagePath->move(public_path().'/profile/', $avatar); 
            $data[] = $avatar;

            $pegawai = MasterPegawai::find($id);
            $pegawai->id_jabatan = $request->id_jabatan;
            $pegawai->id_unit_kerja = $request->id_unit_kerja;
            $pegawai->id_sub_unit = $request->id_sub_unit;
            $pegawai->id_penempatan = $request->id_penempatan;
            $pegawai->id_pangkat = $request->id_pangkat;
            $pegawai->nama_pegawai = $request->nama_pegawai;
            $pegawai->nama_panggilan = $request->nama_panggilan;
            $pegawai->nik_pegawai = $request->nik_pegawai;
            $pegawai->jenis_kelamin = $request->jenis_kelamin;
            $pegawai->tempat_lahir = $request->tempat_lahir;
            $pegawai->tanggal_lahir = $request->tanggal_lahir;
            $pegawai->no_telp = $request->no_telp;
            $pegawai->agama = $request->agama;
            $pegawai->alamat = $request->alamat;
            $pegawai->role = $request->role;
            $pegawai->avatar = $avatar;
            $pegawai->update();
    
            $user = User::where('id_pegawai', '=', $pegawai->id_pegawai)->first();
            $user->name = $pegawai->nama_panggilan;
            $user->email = $request->email;
            $user->update();

        }else{
            $pegawai = MasterPegawai::find($id);
            $pegawai->id_jabatan = $request->id_jabatan;
            $pegawai->id_unit_kerja = $request->id_unit_kerja;
            $pegawai->id_sub_unit = $request->id_sub_unit;
            $pegawai->id_penempatan = $request->id_penempatan;
            $pegawai->id_pangkat = $request->id_pangkat;
            $pegawai->nama_pegawai = $request->nama_pegawai;
            $pegawai->nama_panggilan = $request->nama_panggilan;
            $pegawai->nik_pegawai = $request->nik_pegawai;
            $pegawai->jenis_kelamin = $request->jenis_kelamin;
            $pegawai->tempat_lahir = $request->tempat_lahir;
            $pegawai->tanggal_lahir = $request->tanggal_lahir;
            $pegawai->no_telp = $request->no_telp;
            $pegawai->agama = $request->agama;
            $pegawai->alamat = $request->alamat;
            $pegawai->role = $request->role;
            $pegawai->update();
    
            $user = User::where('id_pegawai', '=', $pegawai->id_pegawai)->first();
            $user->name = $pegawai->nama_panggilan;
            $user->email = $request->email;
            $user->update();
        }

        return redirect()->route('pegawai.index')->with('messageberhasil','Data Pegawai Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id_pegawai', '=', $id)->first();
        $user->delete();

        $pegawai = MasterPegawai::find($id);
        $pegawai->delete(); 

        return redirect()->back()->with('messagehapus','Data Pegawai Berhasil dihapus');
    }
}
