@extends('user-views.layouts.app')


@section('name')
Detail Pengumuman
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Requirement</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pengumuman</li>
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
                        <h5 class="mb-0">Form Detail</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label mr-1" for="nama_pengumuman">Nama Pengumuman</label>
                                    <input type="text" class="form-control"
                                        placeholder="Input Nama Pengumuman Requirement" name="nama_pengumuman"
                                        value="{{ $pengumuman->nama_pengumuman }}" readonly>
                                </div>
                                <div class="col-6">
                                    <label class="form-label mr-1" for="nama_pengumuman">Jabatan</label>
                                    <input type="text" class="form-control"
                                        placeholder="Input Nama Pengumuman Requirement" name="nama_pengumuman"
                                        value="{{ $pengumuman->Jabatan->nama_jabatan }}" readonly>
                                </div>
                           
                                <div class="col-6">
                                    <label class="form-label mr-1" for="nama_pengumuman">Tipe Job</label>
                                    <input type="text" class="form-control"
                                        placeholder="Input Nama Pengumuman Requirement" name="nama_pengumuman"
                                        value="{{ $pengumuman->job_type }}" readonly>
                                </div>
                                <div class="col-4">
                                    <label class="form-label mr-1" for="nama_pengumuman">Qualification</label>
                                    <input type="text" class="form-control"
                                        placeholder="Input Nama Pengumuman Requirement" name="nama_pengumuman"
                                        value="{{ $pengumuman->qualification }}" readonly>
                                </div>
                                <div class="col-4">
                                    <label class="form-label mr-1" for="nama_pengumuman">Tanggal Mulai</label>
                                    <input type="text" class="form-control"
                                        placeholder="Input Nama Pengumuman Requirement" name="nama_pengumuman"
                                        value="{{ $pengumuman->tanggal_mulai }}" readonly>
                                </div>
                                <div class="col-4">
                                    <label class="form-label mr-1" for="nama_pengumuman">Tanggal Selesai</label>
                                    <input type="text" class="form-control"
                                        placeholder="Input Nama Pengumuman Requirement" name="nama_pengumuman"
                                        value="{{ $pengumuman->tanggal_selesai }}" readonly>
                                </div>
                                <div class="col-4">
                                    <label class="form-label mr-1" for="nama_pengumuman">Penempatan</label>
                                    <input type="text" class="form-control"
                                        placeholder="Input Nama Pengumuman Requirement" name="nama_pengumuman"
                                        value="{{ $pengumuman->penempatan }}" readonly>
                                </div>
                                <div class="col-4">
                                    <label class="form-label mr-1" for="nama_pengumuman">Years of
                                        Experience</label><span class="mr-4 mb-3" style="color: red">*</span>
                                    <input type="text" class="form-control"
                                        placeholder="Input Nama Pengumuman Requirement" name="nama_pengumuman"
                                        value="{{ $pengumuman->job_years_experience }}" readonly>
                                </div>
                                <div class="col-4">
                                    <label class="form-label mr-1" for="nama_pengumuman">Kisaran Gaji</label>
                                    <input type="text" class="form-control"
                                        placeholder="Input Nama Pengumuman Requirement" name="nama_pengumuman"
                                        value="{{ number_format($pengumuman->kisaran_gaji) }}" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label mr-1" for="nama_pengumuman">Job Description</label>
                                    <textarea type="text" class="form-control"
                                        placeholder="Input Nama Pengumuman Requirement" rows="5" cols="5"
                                        name="nama_pengumuman" value="{{ $pengumuman->job_description }}"
                                        readonly>{{ $pengumuman->job_description }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label class="form-label mr-1" for="nama_pengumuman">Job Requirement</label>
                                    <textarea type="text" class="form-control"
                                        placeholder="Input Nama Pengumuman Requirement" rows="5" cols="5"
                                        name="nama_pengumuman" value="{{ $pengumuman->job_requirement }}"
                                        readonly>{{ $pengumuman->job_requirement }}</textarea>
                                </div>
                                <div class="col-12">
                                    <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary px-4"
                                        type="button">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>



@endsection
