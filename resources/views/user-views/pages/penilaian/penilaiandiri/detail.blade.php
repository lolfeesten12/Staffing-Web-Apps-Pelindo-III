@extends('user-views.layouts.app')


@section('name')
Detail Penilaian Diri Pegawai
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
                        <li class="breadcrumb-item active" aria-current="page">Detail Penilaian Diri Pegawai Periode
                            {{ $nilai->periode }}</li>
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
                        <div class="border p-3 rounded">
                            <h5>Data Diri Pegawai</h5>
                            <hr>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="row">
                                        <label class="col-sm-3 ">Nama</label>
                                        <div class="col-sm-9">: {{ Auth::user()->Pegawai->nama_pegawai }}</div>
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
                                        <label class="col-sm-3 ">Pangkat dan Golongan</label>
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
                                        <div class="col-sm-9">: {{ $nilai->Penilai->nama_pegawai }}</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <label class="col-sm-3 ">Jabatan</label>
                                        <div class="col-sm-9">: {{ $nilai->Penilai->Jabatan->nama_jabatan }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <label class="col-sm-3 ">Unit Kerja</label>
                                        <div class="col-sm-9">: {{ $nilai->Penilai->UnitKerja->unit_kerja }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <label class="col-sm-3 ">Pangkat dan Golongan</label>
                                        <div class="col-sm-9">:
                                            {{ $nilai->Penilai->Pangkat->nama_pangkat }}/{{ $nilai->Penilai->Pangkat->golongan }}
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
                                        <div class="col-sm-9">: {{ $nilai->AtasanPenilai->nama_pegawai }}</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <label class="col-sm-3 ">Jabatan</label>
                                        <div class="col-sm-9">: {{ $nilai->AtasanPenilai->Jabatan->nama_jabatan }}
                                        </div>
                                    </div>
                                </div>
                                @if ($nilai->AtasanPenilai->role != 'Direktur')
                                <div class="col-12">
                                    <div class="row">
                                        <label class="col-sm-3 ">Unit Kerja</label>
                                        <div class="col-sm-9">: {{ $nilai->AtasanPenilai->UnitKerja->unit_kerja }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <label class="col-sm-3 ">Pangkat dan Golongan</label>
                                        <div class="col-sm-9">:
                                            {{ $nilai->AtasanPenilai->Pangkat->nama_pangkat }}/{{ $nilai->AtasanPenilai->Pangkat->golongan }}
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
                                <div class="col-2">
                                    <h5>Nilai Pegawai</h5>
                                    <hr>
                                </div>
                                <div class="col-8">

                                </div>
                                <div class="col-2">
                                    Keterangan:<br><span style="color: grey">Skala Nilai 1 - 100</span></br>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-3">
                                    <label class="small mb-1 mr-1">Tanggung
                                        Jawab</label>
                                    <input class="form-control" type="text" value="{{ $nilai->nilai_tanggung_jawab }}"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1">Integritas</label>
                                    <input class="form-control" type="text" value="{{ $nilai->nilai_integritas }}"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1">Komitmen</label>
                                    <input class="form-control" type="text" value="{{ $nilai->nilai_komitmen }}"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1">Disiplin</label>
                                    <input class="form-control" type="text" value="{{ $nilai->nilai_disiplin }}"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1">Kerjasama</label>
                                    <input class="form-control" type="text" value="{{ $nilai->nilai_kerjasama }}"
                                        readonly>
                                </div>
                                <div class="col-3">
                                    <label class="small mb-1 mr-1">Nilai Sikap</label>
                                    <input class="form-control" type="text" value="{{ $nilai->nilai_sikap }}" min="1"
                                        readonly>
                                </div>
                                @if (Auth::user()->Pegawai->role != 'Pegawai')
                                <div class="col-3">
                                    <label class="small mb-1 mr-1">Kepemimpinan</label>
                                    <input class="form-control" type="text" value="{{ $nilai->nilai_kepemimpinan }}"
                                        readonly>
                                </div>
                                @else

                                @endif

                                <div class="col-6">
                                    <label class="small mb-1 mr-1">Nilai Total</label>
                                    <input class="form-control" type="text" value="{{ $nilai->nilai_total }}" readonly>
                                </div>
                                <div class="col-6">
                                    <label class="small mb-1 mr-1">Rata-Rata</label>
                                    <input class="form-control" type="text" value="{{ $nilai->nilai_rata2 }}" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="small mb-1 mr-1" >Catatan
                                        Penilaian</label>
                                    <textarea class="form-control" type="text" readonly>{{ $nilai->catatan_penilaian }}</textarea>
                                </div>
                                <div class="col-12">
                                    <a href="{{ route('penilaian-diri.index') }}" class="btn btn-primary px-4" type="button">Kembali</a>
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
