@extends('user-views.layouts.app')


@section('name')
Tambah Data Usulan Jabatan
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Usulan Jabatan Pegawai</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                    </ol>
                </nav>
            </div>

        </div>
        <hr>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Lengkapi Form Berikut</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <form action="{{ route('usulan-jabatan.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="jenis_mutasi">Jenis Mutasi</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <select name="jenis_mutasi" id="jenis_mutasi" class="form-select" value="{{ old('jenis_mutasi') }}"
                                            class="form-control @error('jenis_mutasi') is-invalid @enderror">
                                            <option value="{{ old('jenis_mutasi')}}">Pilih Jenis Mutasi</option>
                                            <option value="Promosi Jabatan">Promosi Jabatan</option>
                                            <option value="Demosi Jabatan">Demosi Jabatan</option>
                                        </select>
                                        @error('jenis_mutasi')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label mr-1" for="nomor_surat">Nomor Surat</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Input Nomor Surat" name="nomor_surat"
                                            value="{{ old('nomor_surat') }}" required>
                                    </div>
                                    <div class="col-3">
                                        <label class="form-label mr-1" for="tanggal_surat">Tanggal Surat</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="date" class="form-control" placeholder="Input Tanggal Surat"
                                            name="tanggal_surat" value="{{ old('tanggal_surat') }}" required>
                                    </div>
                                    <div class="col-6">
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
                                    <div class="col-6">
                                        <label class="small mb-1 mr-1" for="id_pegawai">Pegawai</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-select" name="id_pegawai" id="id_pegawai"
                                            value="{{ old('id_pegawai') }}"
                                            class="form-control @error('id_pegawai') is-invalid @enderror">
                                            <option value="" holder>Pilih Pegawai</option>
                                        </select>
                                            <span class="small" style="font-size: 13px"
                                            style="color: rgb(117, 114, 114)">(Pilih Unit Kerja terlebih dahulu)</span>
                                        @error('id_pegawai')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                   
                                    <div class="col-12">
                                        <label class="small mb-1 mr-1" for="id_jabatan_tujuan">Jabatan Tujuan</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-select" name="id_jabatan_tujuan" id="id_jabatan_tujuan"
                                            value="{{ old('id_jabatan_tujuan') }}"
                                            class="form-control @error('id_jabatan_tujuan') is-invalid @enderror">
                                            <option>Pilih Jabatan</option>
                                            @foreach ($jabatan as $tes)
                                            <option value="{{ $tes->id_jabatan }}">{{ $tes->nama_jabatan }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('id_jabatan_tujuan')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>  
                                    <div class="col-4">
                                        <label class="small mb-1" for="file">File</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <input class="form-control" id="file" type="file" name="file"
                                            value="{{ old('file') }}" accept="application/pdf" multiple="multiple"
                                            required>
                                        <div class="small">
                                            <span class="text-muted">Accept File in PDF Format, File Size Max 2 MB</span>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <label class="small mb-1" for="alasan_usulan">Alasan Usulan</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <textarea class="form-control" id="text" type="alasan_usulan" name="alasan_usulan"
                                            value="{{ old('alasan_usulan') }}" rows="5" required></textarea>
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
                     url: 'getpegawai-jabatan/' + id_jabatan,
                     type: "GET",
                     dataType: "json",
                     success: function (data) {
                         $('select[name="id_pegawai"]').empty();
                         $('select[name="id_pegawai"]').append(
                             '<option value="" holder>Pilih Pegawai</option>')
                         $.each(data, function (key, value) {
                             $('select[name="id_pegawai"]').append(
                                 '<option value="' +
                                 key + '">' + value + '</option>');
                         });
                     },
                     error: function (response) {
                         console.log(response)
                     }
                 });
             } else {
                 $('select[name="id_pegawai"]').empty();
             }
         });


 
     });
 
 </script>


@endsection
