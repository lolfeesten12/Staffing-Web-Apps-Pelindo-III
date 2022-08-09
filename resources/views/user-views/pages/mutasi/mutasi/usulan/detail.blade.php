@extends('user-views.layouts.app')


@section('name')
Detail Data Usulan
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
                        <li class="breadcrumb-item active" aria-current="page">Detail Data</li>
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
                        <h5 class="mb-0">Form Usulan Mutasi</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded">
                                <div class="row g-3">
                                    <div class="col-4">
                                        <label class="form-label mr-1">Jenis Mutasi</label>
                                        <input type="text" class="form-control" value="{{ $item->jenis_mutasi }}"
                                            readonly>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label mr-1">Nomor Surat</label>
                                        <input type="text" class="form-control" value="{{ $item->nomor_surat }}"
                                            readonly>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label mr-1">Tanggal Surat</label>
                                        <input type="text" class="form-control" value="{{ $item->tanggal_surat }}"
                                            readonly>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label mr-1">Pegawai</label>
                                        <input type="text" class="form-control" value="{{ $item->Pegawai->nama_pegawai }}"
                                            readonly>
                                    </div>
                                   
                                    <div class="col-4">
                                        <label class="form-label mr-1">Unit Kerja</label>
                                        <input type="text" class="form-control" value="{{ $item->Pegawai->UnitKerja->unit_kerja }}"
                                            readonly>
                                    </div>
                                    @if ($item->jenis_mutasi == 'Mutasi Internal' || $item->jenis_mutasi == 'Mutasi Eksternal')
                                    <div class="col-4">
                                        <label class="form-label mr-1">Unit Kerja Tujuan</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <input type="text" class="form-control" value="{{ $item->Unit->unit_kerja }}"
                                            readonly>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label mr-1">Sub Unit Kerja Tujuan</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <input type="text" class="form-control" value="{{ $item->SubUnit->nama_sub_unit ?? '' }}"
                                            readonly>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label mr-1">Penempatan</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <input type="text" class="form-control" value="{{ $item->Penempatan->nama_penempatan ?? $item->Pegawai->Penempatan->nama_penempatan }}"
                                            readonly>
                                    </div>
                                    @endif
                                   

                                    <div class="col-12">
                                        <label class="form-label mr-1">Alasan Usulan</label>
                                        <textarea type="text" class="form-control" value="{{ $item->alasan_usulan }}"
                                            readonly> {{ $item->alasan_usulan }} </textarea>
                                    </div>
                                    <div class="col-12">
                                        <a href="{{ route('usulan-mutasi.index') }}" class="btn btn-primary px-4" >Kembali</a>
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
