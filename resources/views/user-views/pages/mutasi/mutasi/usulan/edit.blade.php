@extends('user-views.layouts.app')


@section('name')
Edit Data Usulan
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
                        <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
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
                            <form action="{{ route('usulan-mutasi.update', $item->id_usulan) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="nomor_surat">Nomor Surat</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Input Nomor Surat" name="nomor_surat"
                                            value="{{ $item->nomor_surat }}">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="tanggal_surat">Tanggal Surat</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="date" class="form-control" placeholder="Input Tanggal Surat"
                                            name="tanggal_surat" value="{{ $item->tanggal_surat }}">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="unit_kerja">Unit Kerja</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Input Tanggal Surat"
                                            name="unit_kerja" value="{{ $item->Pegawai->UnitKerja->unit_kerja }}" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="id_pegawai">Pegawai</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Input Tanggal Surat"
                                            name="id_pegawai" value="{{ $item->Pegawai->nama_pegawai }}" readonly>
                                    </div>
                                    
                                    @if ($item->jenis_mutasi != 'Resign')
                                    <div class="col-12">
                                        <label class="small mb-1 mr-1" for="id_divisi_tujuan">Unit Kerja Tujuan</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-select" name="id_divisi_tujuan" id="id_divisi_tujuan"
                                            value="{{ old('id_divisi_tujuan') }}"
                                            class="form-control @error('id_divisi_tujuan') is-invalid @enderror">
                                            <option value="{{ $item->id_divisi_tujuan }}">{{ $item->Unit->unit_kerja }}</option>
                                            @foreach ($unit as $item)
                                            <option value="{{ $item->id_unit_kerja }}">{{ $item->unit_kerja }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('id_divisi_tujuan')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    @endif
                                    <div class="col-4">
                                        <label class="small mb-1" for="file">File</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <input class="form-control" id="file" type="file" name="file"
                                            value="{{ $item->file }}" accept="application/pdf" multiple="multiple">
                                        <div class="small">
                                            <span class="text-muted">Accept File in PDF Format, File Size Max 2 MB</span>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <label class="small mb-1" for="alasan_usulan">Alasan Usulan</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <textarea class="form-control" id="text" type="alasan_usulan" name="alasan_usulan"
                                            value="{{ old('alasan_usulan') }}" rows="5">{{ $item->alasan_usulan }}</textarea>
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
