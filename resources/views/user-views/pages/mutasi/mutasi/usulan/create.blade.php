@extends('user-views.layouts.app')


@section('name')
Tambah Data Usulan
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Usulan Mutasi Pegawai</div>
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
                            <form action="{{ route('usulan-mutasi.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row g-3">
                                    <label class="small mb-1">Pilih Jenis Mutasi Terlebih Dahulu</label>
                                    <hr>
                                    </hr>
                                    <div class="row mb-1 mt-2" id="radio1">
                                        <div class="col-md-3">
                                            <input class="mr-1" value="Resign" type="radio" name="jenis_mutasi" checked> Resign
                                        </div>
                                        <div class="col-md-3">
                                            <input class="mr-1" value="Mutasi Internal" type="radio" name="jenis_mutasi"> Mutasi Internal
                                        </div>
                                        <div class="col-md-3">
                                            <input class="mr-1" value="Mutasi Eksternal" type="radio" name="jenis_mutasi"> Mutasi Eksternal
                                        </div>       
                                        <div class="col-md-3">
                                            <input class="mr-1" value="Pemecatan" type="radio" name="jenis_mutasi"> Pemecatan
                                        </div>        
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="nomor_surat">Nomor Surat</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Input Nomor Surat" name="nomor_surat"
                                            value="{{ old('nomor_surat') }}" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="tanggal_surat">Tanggal Surat</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="date" class="form-control" placeholder="Input Tanggal Surat"
                                            name="tanggal_surat" value="{{ old('tanggal_surat') }}" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="small mb-1 mr-1" for="id_unit_kerja">Unit Kerja</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-select" name="id_unit_kerja" id="id_unit_kerja"
                                            value="{{ old('id_unit_kerja') }}"
                                            class="form-control @error('id_unit_kerja') is-invalid @enderror">
                                            <option>Pilih Unit Kerja</option>
                                            @foreach ($unit as $item)
                                            <option value="{{ $item->id_unit_kerja }}">{{ $item->unit_kerja }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('id_unit_kerja')<div class="text-danger small mb-1">{{ $message }}
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


                                    <div id="Internal" style="display:none">
                                        <div class="col-12">
                                            <label class="small mb-1 mr-1" for="id_divisi_tujuan">Unit Kerja Tujuan</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <select class="form-select" name="id_divisi_tujuan" id="id_divisi_tujuan"
                                                value="{{ old('id_divisi_tujuan') }}"
                                                class="form-control @error('id_divisi_tujuan') is-invalid @enderror">
                                                <option>Pilih Unit Kerja Tujuan</option>
                                                @foreach ($unit as $item)
                                                <option value="{{ $item->id_unit_kerja }}">{{ $item->unit_kerja }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_divisi_tujuan')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>

                                    <div id="Eksternal" style="display:none">
                                        <div class="col-12">
                                            <label class="small mb-1 mr-1" for="id_penempatan">Penempatan Tujuan</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <select class="form-select" name="id_penempatan" id="id_penempatan"
                                                value="{{ old('id_penempatan') }}"
                                                class="form-control @error('id_penempatan') is-invalid @enderror">
                                                <option>Pilih Penempatan Tujuan</option>
                                                @foreach ($penempatan as $tempat)
                                                <option value="{{ $tempat->id_penempatan }}">{{ $tempat->nama_penempatan }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_penempatan')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
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
 
         $('select[name="id_unit_kerja"]').on('change', function () {
             var id_unit_kerja = $(this).val();
             if (id_unit_kerja) {
                 $.ajax({
                     url: 'getpegawai/' + id_unit_kerja,
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


        $("#radio1").change(function () {
            var value = $("input[name='jenis_mutasi']:checked").val();

            if (value == 'Resign') {
                $('#Internal').hide()
                $('#Eksternal').hide()
            } else if(value == 'Mutasi Internal') {
                $('#Internal').show()
                $('#Eksternal').hide()
            } else if(value == 'Mutasi Eksternal'){
                $('#Eksternal').show()
                $('#Internal').hide()
            } else if(value == 'Pemecatan'){
                $('#Eksternal').hide()
                $('#Internal').hide()
            }


        });

 
     });
 
 </script>


@endsection
