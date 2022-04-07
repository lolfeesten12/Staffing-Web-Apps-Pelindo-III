@extends('user-views.layouts.app')


@section('name')
Edit Master Pegawai
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
                        <li class="breadcrumb-item active" aria-current="page">Edit Pegawai {{ $pegawai->nama_pegawai }}</li>
                    </ol>
                </nav>
            </div>

        </div>
        <hr>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Lengkapi Form Berikut</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <form action="{{ route('pegawai.update', $pegawai->id_pegawai) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="nama_pegawai">Nama Lengkap
                                            Pegawai</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Nama Lengkap Pegawai"
                                            name="nama_pegawai" value="{{ $pegawai->nama_pegawai }}" required>
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label mr-1" for="nama_panggilan">Nama Panggilan</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Nama Panggilan Pegawai"
                                            name="nama_panggilan" value="{{ $pegawai->nama_panggilan }}" required>
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label mr-1" for="nik_pegawai">NIK Pegawai</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="NIK Pegawai"
                                            name="nik_pegawai" value="{{ $pegawai->nik_pegawai }}" required>
                                        <div class="small">
                                            <span class="text-muted">16 Digit Number </span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="small mb-1 mr-1" for="id_jabatan">Jabatan</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-select" name="id_jabatan" id="id_jabatan"
                                            value="{{ $pegawai->Jabatan->id_jabatan }}" required> 
                                            <option value="{{ $pegawai->Jabatan->id_jabatan }}">{{ $pegawai->Jabatan->nama_jabatan }}</option>
                                            @foreach ($jabatan as $item)
                                            <option value="{{ $item->id_jabatan }}">{{ $item->nama_jabatan }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="small mb-1 mr-1" for="id_unit_kerja">Unit kerja</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-select" name="id_unit_kerja" id="id_unit_kerja"
                                            value="{{ old('id_unit_kerja') }}" required>
                                            <option value="{{ $pegawai->Unitkerja->id_unit_kerja }}">{{ $pegawai->Unitkerja->unit_kerja }}</option>
                                            @foreach ($unit as $units)
                                            <option value="{{ $units->id_unit_kerja }}">{{ $units->unit_kerja }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="tempat_lahir">Tempat Lahir</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="tempat_lahir" type="text" name="tempat_lahir"
                                            placeholder="Input Tempat Lahir" value="{{ $pegawai->tempat_lahir }}" required>
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="tanggal_lahir">Tanggal Lahir</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="tanggal_lahir" type="date" name="tanggal_lahir"
                                            placeholder="Input Tanggal Lahir" value="{{ $pegawai->tanggal_lahir }}" required>
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="no_telp">Nomor Telephone</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="no_telp" type="number" minlength="13"
                                            maxlength="13" name="no_telp" placeholder="Input Nomor Telephone"
                                            value="{{ $pegawai->no_telp }}" required>
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="jenis_kelamin">Jenis
                                            Kelamin</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select"
                                            value="{{ $pegawai->jenis_kelamin }}" required>
                                            <option value="{{ $pegawai->jenis_kelamin }}">{{ $pegawai->jenis_kelamin }}</option>
                                            <option value="Laki-Laki">Laki Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="agama">Agama</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <select name="agama" id="agama" class="form-select" value="{{ $pegawai->agama }}" required>
                                            <option value="{{ $pegawai->agama }}">{{ $pegawai->agama }}</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Konghucu">Konghucu</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Protestan">Protestan</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1" for="avatar">Profile Picture</label>
                                        <input class="form-control" id="avatar" type="file" name="avatar"
                                            value="{{ $pegawai->avatar }}" accept="image/*" multiple="multiple">
                                        <div class="small">
                                            <span class="text-muted">Accept Picture in PNG, JPG, JPEG Format </span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="small mb-1 mr-1" for="alamat">Alamat Lengkap</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <textarea class="form-control" id="alamat" type="text" rows="3" cols="4"
                                            name="alamat" placeholder="Input Alamat Pegawai" value="{{ $pegawai->alamat }}" required>{{ $pegawai->alamat }}</textarea>
                                    </div>
                                    <hr class="mt-5">
                                    <h5 class="mb-0">Data Login Pegawai</h5>
                                    <div class="col-6">
                                        <label class="small mb-1 mr-1" for="role">Role Pegawai</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select name="role" id="role" class="form-select" value="{{ $pegawai->role }}" required>
                                            <option value="{{ $pegawai->role }}">{{ $pegawai->role }}</option>
                                            <option value="Pegawai">Pegawai Uni</option>
                                            <option value="HRD">HRD</option>
                                            <option value="Kepala Unit">Senior Manager Unit</option>
                                            <option value="Direktur Unit">Direktur Unit</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="small mb-1 mr-1" for="email">Email</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">@</span>
                                            <input class="form-control" id="email" type="email" name="email"
                                                placeholder="Input Email Pegawai" value="{{ $pegawai->User->email }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Data yang Anda inputkan sudah sesuai
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary px-4" type="submit">Edit Data</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>




@endsection
