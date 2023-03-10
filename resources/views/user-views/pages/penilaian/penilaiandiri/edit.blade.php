@extends('user-views.layouts.app')


@section('name')
Edit Penilaian Diri 
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Penilaian</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Penilaian Diri Pegawai Periode
                            {{ $item->periode }}</li>
                    </ol>
                </nav>
            </div>

        </div>
        <hr>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                @if(session('message'))
                <div
                    class="alert border-0 border-danger border-start border-4 bg-light-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-danger"><i class="lni lni-close"></i>
                        </div>
                        <div class="ms-3">
                            <div class="text-danger"> {{ session('message') }}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Penilai dan Pengesah</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('penilaian-diri-update', $item->id_penilaian) }}" method="POST"
                            id="form1" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="border p-3 rounded">
                                <h5>Data Diri Pegawai</h5>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="col-sm-3 ">Nama</label>
                                            <div class="col-sm-9">: {{ Auth::user()->Pegawai->nama_pegawai }}</div>
                                            <input type="hidden" value="{{ Auth::user()->Pegawai->role  }}" id="role_pegawai">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="col-sm-3 ">Jabatan</label>
                                            <div class="col-sm-9">: {{ Auth::user()->Pegawai->Jabatan->nama_jabatan }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="col-sm-3 ">Unit Kerja</label>
                                            <div class="col-sm-9">: {{ Auth::user()->Pegawai->UnitKerja->unit_kerja }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="col-sm-3 ">Pangkat</label>
                                            <div class="col-sm-9">:
                                                {{ Auth::user()->Pegawai->Pangkat->nama_pangkat }}/{{ Auth::user()->Pegawai->Pangkat->golongan }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border p-3 rounded mt-4">
                                <h5>Penilai Nilai Pegawai</h5>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="col-sm-3 ">Nama</label>
                                            <div class="col-sm-9">: {{ $item->Penilai->nama_pegawai }}</div>
                                            <input style="display: none" class="form-control" id="id_penilai"
                                                type="number" name="id_penilai" value="{{ $item->Penilai->nama_pegawai }}" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="col-sm-3 ">Jabatan</label>
                                            <div class="col-sm-9">: {{ $item->Penilai->Jabatan->nama_jabatan }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="col-sm-3 ">Unit Kerja</label>
                                            <div class="col-sm-9">: {{ $item->Penilai->UnitKerja->unit_kerja }}
                                            </div>
                                        </div>
                                    </div>
                                    @if (Auth::user()->Pegawai->role == 'Pegawai')
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="col-sm-3 ">Sub Unit</label>
                                            <div class="col-sm-9">: {{ $item->Penilai->SubUnit->nama_sub_unit }}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="col-sm-3 ">Pangkat</label>
                                            <div class="col-sm-9">:
                                                {{ $item->Penilai->Pangkat->nama_pangkat }}/{{ $item->Penilai->Pangkat->golongan }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border p-3 rounded mt-4">
                                <h5>Pengesah Nilai Pegawai</h5>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="col-sm-3 ">Nama</label>
                                            <div class="col-sm-9">: {{ $item->AtasanPenilai->nama_pegawai }}</div>
                                            <input style="display: none" class="form-control" id="id_pengesah"
                                                type="number" name="id_pengesah"
                                                value="{{ $item->AtasanPenilai->id_pegawai }}" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="col-sm-3 ">Jabatan</label>
                                            <div class="col-sm-9">: {{ $item->AtasanPenilai->Jabatan->nama_jabatan }}
                                            </div>
                                        </div>
                                    </div>
                                    @if ($item->AtasanPenilai->role != 'Direktur')
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="col-sm-3 ">Unit Kerja</label>
                                            <div class="col-sm-9">: {{ $item->AtasanPenilai->UnitKerja->unit_kerja }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="col-sm-3 ">Pangkat</label>
                                            <div class="col-sm-9">:
                                                {{ $item->AtasanPenilai->Pangkat->nama_pangkat }}/{{ $item->AtasanPenilai->Pangkat->golongan }}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Lengkapi Form Berikut</h5>
                    </div>
                    <div class="card-body">

                        <div class="border p-3 rounded mt-4">
                            <div class="row">
                                <div class="col-4">
                                    <h5>Nilai Pegawai</h5><hr>
                                </div>
                                <div class="col-5">

                                </div>
                                <div class="col-3">
                                    Keterangan:<br><span style="color: grey">Skala Nilai 1 - 100</span></br>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-3">
                                    <label class="small mb-1 mr-1" for="nilai_tanggung_jawab">Tanggung
                                        Jawab</label><span class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_tanggung_jawab" type="number"
                                        name="nilai_tanggung_jawab" placeholder="Input Nilai Orientasi Pelayanan"
                                        value="{{ number_format($item->nilai_tanggung_jawab) }}" min="1" max="100">
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1" for="nilai_integritas">Integritas</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_integritas" type="number"
                                        name="nilai_integritas" placeholder="Input Nilai Integritas"
                                        value="{{ number_format($item->nilai_integritas) }}" min="1" max="100">
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1" for="nilai_komitmen">Komitmen</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_komitmen" type="number" name="nilai_komitmen"
                                        placeholder="Input Nilai Komitmen" value="{{ number_format($item->nilai_komitmen) }}" min="1"
                                        max="100">
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1" for="nilai_disiplin">Disiplin</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_disiplin" type="number" name="nilai_disiplin"
                                        placeholder="Input Nilai Disiplin" value="{{ number_format($item->nilai_disiplin) }}" min="1"
                                        max="100">
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1" for="nilai_kerjasama">Kerjasama</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_kerjasama" type="number"
                                        name="nilai_kerjasama" placeholder="Input Nilai Kerjasama"
                                        value="{{ number_format($item->nilai_kerjasama) }}" min="1" max="100">
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1" for="nilai_sikap">Nilai Sikap</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_sikap" type="number" name="nilai_sikap"
                                        placeholder="Input Nilai Prakarsa" value="{{ number_format($item->nilai_sikap) }}" min="1"
                                        max="100">
                                </div>
                                @if (Auth::user()->Pegawai->role == 'Pegawai' || Auth::user()->Pegawai->role == 'HRD')
                               
                                @else
                                <div class="col-3">
                                    <label class="small mb-1 mr-1" for="nilai_kepemimpinan">Kepemimpinan</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_kepemimpinan" type="number"
                                        name="nilai_kepemimpinan" placeholder="Input Nilai Kepemimpinan"
                                        value="{{ number_format($item->nilai_kepemimpinan ?? '') }}" min="1" max="100">
                                </div>
                                @endif

                                <div class="col-3">
                                    <label class="small mb-1 mr-1">Klik menjumlahkan nilai</label><span
                                        class="mr-4 mb-3" style="color: red">*</span><br>
                                    <button class="btn btn-sm btn-primary" onclick="hitung()" type="button"
                                        id="button_nilai">Mulai Penilaian</button></br>

                                </div>
                                <div class="col-6">
                                    <label class="small mb-1 mr-1" for="nilai_total">Nilai Total</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_total" type="number" name="nilai_total"
                                        placeholder="Otomatis Terhitung" value="{{ number_format($item->nilai_total) }}">
                                </div>
                                <div class="col-6">
                                    <label class="small mb-1 mr-1" for="nilai_rata2">Rata-Rata</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_rata2" type="number" name="nilai_rata2"
                                        placeholder="Otomatis Terhitung" value="{{ number_format($item->nilai_rata2) }}">
                                </div>
                                <div class="col-12">
                                    <label class="small mb-1 mr-1" for="catatan_penilaian">Catatan
                                        Penilaian</label><span class="mr-4 mb-3" style="color: red">*</span>
                                    <textarea class="form-control" id="catatan_penilaian" type="text"
                                        name="catatan_penilaian" placeholder="input Catatan Penilaian untuk Pegawai"
                                        value="{{ old('catatan_penilaian') }}">{{ $item->catatan_penilaian }}</textarea>
                                </div>
                                <div class="col-6">
                                    <label class="small mb-1 mr-1" for="nilai_skp">Nilai SKP</label><span class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="nilai_skp" type="number"
                                        name="nilai_skp" placeholder="Input Nilai SKP"
                                        value="{{ $item->nilai_skp }}" min="1" max="100">
                                </div>
                                <div class="col-6">
                                    <label class="small mb-1 mr-1" for="file_skp">File SKP</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="file_skp" type="file" name="file_skp"
                                        placeholder="input Catatan Penilaian untuk Pegawai"
                                        value="{{ old('file_skp') }}">
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
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
    function hitung() {
        var form = $('#form1')
        var nilai_tanggung_jawab = $('#nilai_tanggung_jawab').val()
        var nilai_integritas = $('#nilai_integritas').val()
        var nilai_komitmen = $('#nilai_komitmen').val()
        var nilai_disiplin = $('#nilai_disiplin').val()
        var nilai_kerjasama = $('#nilai_kerjasama').val()
        var nilai_sikap = $('#nilai_sikap').val()
        var nilai_kepemimpinan = $('#nilai_kepemimpinan').val()
        var role_pegawai = $('#role_pegawai').val()

        if (nilai_kepemimpinan == undefined) {
            if (nilai_tanggung_jawab == null | nilai_tanggung_jawab == 0 | nilai_integritas == null |
                nilai_integritas == 0 | nilai_komitmen == null | nilai_komitmen == 0 | nilai_disiplin == null |
                nilai_disiplin == 0 | nilai_kerjasama == null | nilai_kerjasama == 0 | nilai_sikap == null |
                nilai_sikap == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terdapat Field Nilai Kosong',
                })
            } else if (nilai_tanggung_jawab > 100 | nilai_integritas > 100 | nilai_komitmen > 100 | nilai_disiplin >
                100 | nilai_kerjasama > 100 | nilai_sikap > 100) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Nilai Tidak Boleh Melebihi Skala Nilai',
                })
            } else {

                var nilai_total = parseInt(nilai_tanggung_jawab) + parseInt(nilai_integritas) + parseInt(
                        nilai_komitmen) +
                    parseInt(nilai_disiplin) + parseInt(nilai_kerjasama) + parseInt(nilai_sikap)
                $('#nilai_total').val(nilai_total);

                if(role_pegawai == 'Pegawai' || role_pegawai == 'HRD'){
                    var rata = nilai_total / 6;
                }else{
                    var rata = nilai_total / 7;
                }
                var rata_rata = rata.toFixed(2)
                $('#nilai_rata2').val(parseInt(rata_rata));

            }
        }else{
            if (nilai_tanggung_jawab == null | nilai_tanggung_jawab == 0 | nilai_integritas == null |
                nilai_integritas == 0 | nilai_komitmen == null | nilai_komitmen == 0 | nilai_disiplin == null |
                nilai_disiplin == 0 | nilai_kerjasama == null | nilai_kerjasama == 0 | nilai_sikap == null |
                nilai_sikap == 0 | nilai_kepemimpinan == null | nilai_kepemimpinan == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terdapat Field Nilai Kosong',
                })
            } else if (nilai_tanggung_jawab > 100 | nilai_integritas > 100 | nilai_komitmen > 100 | nilai_disiplin >
                100 |
                nilai_kerjasama > 100 | nilai_sikap > 100 | nilai_kepemimpinan > 100) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Nilai Tidak Boleh Melebihi Skala Nilai',
                })
            } else {

                var nilai_total = parseInt(nilai_tanggung_jawab) + parseInt(nilai_integritas) + parseInt(
                        nilai_komitmen) +
                    parseInt(nilai_disiplin) + parseInt(nilai_kerjasama) + parseInt(nilai_sikap) + parseInt(
                        nilai_kepemimpinan)
                $('#nilai_total').val(nilai_total);

                if(role_pegawai == 'Pegawai' || role_pegawai == 'HRD'){
                    var rata = nilai_total / 6;
                }else{
                    var rata = nilai_total / 7;
                }
                var rata_rata = rata.toFixed(2)
                $('#nilai_rata2').val(parseInt(rata_rata));

            }
        }


    }

</script>
@endsection
