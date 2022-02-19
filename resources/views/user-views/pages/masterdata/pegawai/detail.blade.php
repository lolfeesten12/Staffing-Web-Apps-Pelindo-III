@extends('user-views.layouts.app')


@section('name')
Detail Master Pegawai
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Master Data</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pegawai
                            {{ $pegawai->nama_pegawai }}</li>
                    </ol>
                </nav>
            </div>

        </div>
        <hr>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header py-3 bg-transparent">
                                <h5 class="mb-0">Profile Picture Pegawai</h5>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    @if (!$pegawai->avatar)
                                        <img src="https://ui-avatars.com/api/?name=Admin" class="rounded-circle" alt="" style="border-radius: 50%">
                                    @else
                                    <img class="rounded-circle" width="450" height="450"
                                        src="{{ asset('/profile/'.$pegawai['avatar']) }}" alt="">
                                    <img src="{{ url($pegawai->avatar) }}" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header py-3 bg-transparent">
                                <h5 class="mb-0">Detail Pegawai</h5>
                            </div>
                            <div class="card-body">
                                <div class="border p-3 rounded">
        
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <label class="form-label mr-1" for="nama_pegawai">Nama Lengkap
                                                Pegawai</label>
                                            <input type="text" class="form-control" 
                                                name="nama_pegawai" value="{{ $pegawai->nama_pegawai }}" readonly>
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label mr-1" for="nama_panggilan">Nama Panggilan</label>
                                            <input type="text" class="form-control" 
                                                name="nama_panggilan" value="{{ $pegawai->nama_panggilan }}" readonly>
                                        </div>
                                        <div class="col-3">
                                            <label class="form-label mr-1" for="nik_pegawai">NIK Pegawai</label>
                                            <input type="text" class="form-control" 
                                                value="{{ $pegawai->nik_pegawai }}" readonly> 
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label mr-1" for="nik_pegawai">Jabatan Pegawai</label>
                                            <input type="text" class="form-control" 
                                                value="{{ $pegawai->Jabatan->nama_jabatan }}" readonly> 
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label mr-1" for="nik_pegawai">Unit Kerja Pegawai</label>
                                            <input type="text" class="form-control" 
                                                value="{{ $pegawai->Unitkerja->unit_kerja }}" readonly> 
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label mr-1" for="nik_pegawai">Tempat Lahir</label>
                                            <input type="text" class="form-control" 
                                                value="{{ $pegawai->tempat_lahir }}" readonly> 
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label mr-1" for="nik_pegawai">Tanggal Lahir</label>
                                            <input type="text" class="form-control" 
                                                value="{{ $pegawai->tanggal_lahir }}" readonly> 
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label mr-1" for="nik_pegawai">Nomor Telephone</label>
                                            <input type="text" class="form-control" 
                                                value="{{ $pegawai->no_telp }}" readonly> 
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label mr-1" for="nik_pegawai">Jenis Kelamin</label>
                                            <input type="text" class="form-control" 
                                                value="{{ $pegawai->jenis_kelamin }}" readonly> 
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label mr-1" for="nik_pegawai">Agama</label>
                                            <input type="text" class="form-control" 
                                                value="{{ $pegawai->agama }}" readonly> 
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label mr-1" for="nik_pegawai">Agama</label>
                                            <textarea type="text" class="form-control" rows="3" cols="4"
                                                value="{{ $pegawai->alamat }}" readonly>{{ $pegawai->alamat }}</textarea>
                                        </div>
                                        
                                        <hr class="mt-5">
                                        <h5 class="mb-0">Data Login Pegawai</h5>
                                        <div class="col-6">
                                            <label class="form-label mr-1" for="nik_pegawai">Role Pegawai</label>
                                            <input type="text" class="form-control" 
                                                value="{{ $pegawai->role }}" readonly> 
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label mr-1" for="nik_pegawai">Email Pegawai</label>
                                            <input type="text" class="form-control" 
                                                value="{{ $pegawai->User->email }}" readonly> 
                                        </div>
                                        <div class="col-12">
                                            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary px-4" type="button">Kembali</a>
                                        </div>
        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</main>




@endsection
