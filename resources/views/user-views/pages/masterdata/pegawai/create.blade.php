@extends('user-views.layouts.app')


@section('name')
Create Master Pegawai
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
                        <li class="breadcrumb-item active" aria-current="page">Tambah Pegawai</li>
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
                            <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="nama_pegawai">Nama Lengkap
                                            Pegawai</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Nama Lengkap Pegawai"
                                            name="nama_pegawai" value="{{ old('nama_pegawai') }}"
                                            class="form-control @error('nama_pegawai') is-invalid @enderror">
                                        @error('nama_pegawai')<div class="invalid-feedback">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label mr-1" for="nama_panggilan">Nama Panggilan</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Nama Panggilan Pegawai"
                                            name="nama_panggilan" value="{{ old('nama_panggilan') }}"
                                            class="form-control @error('nama_panggilan') is-invalid @enderror">
                                        @error('nama_panggilan')<div class="invalid-feedback">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label mr-1" for="nik_pegawai">NIK Pegawai</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="NIK Pegawai"
                                            name="nik_pegawai" value="{{ old('nik_pegawai') }}"
                                            class="form-control @error('nik_pegawai') is-invalid @enderror">
                                        @error('nik_pegawai')<div class="invalid-feedback">{{ $message }}
                                        </div> @enderror
                                        <div class="small">
                                            <span class="text-muted">16 Digit Number </span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="id_jabatan">Jabatan</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-select" name="id_jabatan" id="id_jabatan"
                                            value="{{ old('id_jabatan') }}"
                                            class="form-control @error('id_jabatan') is-invalid @enderror">
                                            <option>Pilih Jabatan</option>
                                            @foreach ($jabatan as $item)
                                            <option value="{{ $item->id_jabatan }}">{{ $item->nama_jabatan }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('id_jabatan')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                   
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="id_pangkat">Pangkat dan Golongan</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-select" name="id_pangkat" id="id_pangkat"
                                            value="{{ old('id_pangkat') }}"
                                            class="form-control @error('id_pangkat') is-invalid @enderror">
                                            <option value="" holder>Pilih Pangkat dan Golongan</option>
                                        </select>
                                            <span class="small" style="font-size: 13px"
                                            style="color: rgb(117, 114, 114)">(Pilih Jabatan terlebih dahulu)</span>
                                        @error('id_pangkat')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    {{-- <div class="col-4">
                                        <label class="small mb-1 mr-1" for="id_pangkat">Pangkat dan Golongan</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-select" name="id_pangkat" id="id_pangkat"
                                            value="{{ old('id_pangkat') }}"
                                            class="form-control @error('id_pangkat') is-invalid @enderror">
                                            <option>Pilih Pangkat dan Golongan</option>
                                            @foreach ($pangkat as $item)
                                            <option value="{{ $item->id_pangkat }}">{{ $item->nama_pangkat }}, {{ $item->golongan }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('id_pangkat')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div> --}}
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="id_unit_kerja">Unit kerja</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-select" name="id_unit_kerja" id="id_unit_kerja"
                                            value="{{ old('id_unit_kerja') }}"
                                            class="form-control @error('id_unit_kerja') is-invalid @enderror">
                                            <option>Pilih Unit Kerja</option>
                                            @foreach ($unit as $units)
                                            <option value="{{ $units->id_unit_kerja }}">{{ $units->unit_kerja }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('id_unit_kerja')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="tempat_lahir">Tempat Lahir</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="tempat_lahir" type="text" name="tempat_lahir"
                                            placeholder="Input Tempat Lahir" value="{{ old('tempat_lahir') }}"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror" />
                                        @error('tempat_lahir')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="tanggal_lahir">Tanggal Lahir</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="tanggal_lahir" type="date" name="tanggal_lahir"
                                            placeholder="Input Tanggal Lahir" value="{{ old('tanggal_lahir') }}"
                                            class="form-control @error('tanggal_lahir') is-invalid @enderror" />
                                        @error('tanggal_lahir')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="no_telp">Nomor Telephone</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="no_telp" type="number" minlength="13"
                                            maxlength="13" name="no_telp" placeholder="Input Nomor Telephone"
                                            value="{{ old('no_telp') }}"
                                            class="form-control @error('no_telp') is-invalid @enderror" />
                                        @error('no_telp')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="jenis_kelamin">Jenis
                                            Kelamin</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select"
                                            value="{{ old('jenis_kelamin') }}"
                                            class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                            <option value="{{ old('jenis_kelamin')}}"> Pilih Jenis Kelamin</option>
                                            <option value="Laki-Laki">Laki Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="agama">Agama</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <select name="agama" id="agama" class="form-select" value="{{ old('agama') }}"
                                            class="form-control @error('agama') is-invalid @enderror">
                                            <option value="{{ old('agama')}}"> Pilih Agama</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Konghucu">Konghucu</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Protestan">Protestan</option>
                                        </select>
                                        @error('agama')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1" for="avatar">Profile Picture</label>
                                        <input class="form-control" id="avatar" type="file" name="avatar"
                                            value="{{ old('avatar') }}" accept="image/*" multiple="multiple"
                                            class="form-control @error('avatar') is-invalid @enderror">
                                        @error('avatar')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                        <div class="small">
                                            <span class="text-muted">Accept Picture in PNG, JPG, JPEG Format </span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="small mb-1 mr-1" for="alamat">Alamat Lengkap</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <textarea class="form-control" id="alamat" type="text" rows="3" cols="4"
                                            name="alamat" placeholder="Input Alamat Pegawai" value="{{ old('alamat') }}"
                                            class="form-control @error('alamat') is-invalid @enderror"></textarea>
                                        @error('alamat')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <hr class="mt-5">
                                    <h5 class="mb-0">Data Login Pegawai</h5>
                                    <div class="col-6">
                                        <label class="small mb-1 mr-1" for="role">Role Pegawai</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select name="role" id="role" class="form-select" value="{{ old('role') }}"
                                            class="form-control @error('role') is-invalid @enderror">
                                            <option value="{{ old('role')}}">Pilih Role</option>
                                            <option value="Pegawai">Pegawai Unit</option>
                                            <option value="HRD">HRD</option>
                                            <option value="Kepala Unit">Senior Manager Unit</option>
                                            <option value="Direktur Unit">Direktur Unit</option>
                                        </select>
                                        @error('role')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-6">
                                        <label class="small mb-1 mr-1" for="email">Email</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <div class="input-group mb-3"> <span class="input-group-text"
                                                id="basic-addon1">@</span>
                                            <input class="form-control" id="email" type="email" name="email"
                                                placeholder="Input Email Pegawai" value="{{ old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror" required />
                                            @error('email')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Input Password" name="password" required
                                            autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <label for="password-confirm" class="d-block">Password Confirmation</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                            placeholder="Konfirmasi Password" name="password_confirmation" required
                                            autocomplete="new-password">
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
                                        <button class="btn btn-primary px-4" type="submit">Tambah Data</button>
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

<script>
    $(document).ready(function () {
        $('#validasierror').click();

        $('select[name="id_jabatan"]').on('change', function () {
            var id_jabatan = $(this).val();
            if (id_jabatan) {
                $.ajax({
                    url: 'getpangkat/' + id_jabatan,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="id_pangkat"]').empty();
                        $('select[name="id_pangkat"]').append(
                            '<option value="" holder>Pilih Pangkat dan Golongan</option>')
                        $.each(data, function (key, value) {
                            $('select[name="id_pangkat"]').append(
                                '<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                    error: function (response) {
                        console.log(response)
                    }
                });
            } else {
                $('select[name="id_pangkat"]').empty();
            }
        });
    });

</script>



@endsection
