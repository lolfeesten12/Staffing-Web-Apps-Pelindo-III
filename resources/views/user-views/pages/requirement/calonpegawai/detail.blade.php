@extends('user-views.layouts.app')


@section('name')
Detail Calon Pegawai
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
                        <li class="breadcrumb-item active" aria-current="page">Calon Pegawai</li>
                    </ol>
                </nav>
            </div>
        </div>
        <hr>
        @if(session('messageberhasil'))
        <div
            class="alert border-0 border-success border-start border-4 bg-light-success alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-success"><i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-success"> {{ session('messageberhasil') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('messagehapus'))
        <div
            class="alert border-0 border-danger border-start border-4 bg-light-danger alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-danger"><i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-danger"> {{ session('messagehapus') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    <div class="container-fluid">
        <div class="mt-5">


            <div class="row">
                <div class="col-4">
                    <div class="card border-end p-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <h3>Pengumuman Job</h3>
                                </div>
                                <div class="col-5 text-right">
                                    <div class="small">
                                        Posted {{ $calon->pengumuman->tanggal_mulai }}
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h5 class="card-title">{{ $calon->pengumuman->nama_pengumuman }}</h5>
                            <p class="card-text">
                                Dibutuhkan <span class="text-purple"> {{ $calon->pengumuman->Jabatan->nama_jabatan }}
                                </span>,
                                Pengalaman selama
                                <span class="text-purple"> {{ $calon->pengumuman->job_years_experience }} Tahun </span>,
                                Tipe Job
                                <span class="text-purple">{{ $calon->pengumuman->job_type }}</span>
                            </p>
                            <p>
                                Penempatan <span class="text-purple">{{ $calon->pengumuman->penempatan }}</span>,
                                IDR <span class="text-purple">{{ number_format($calon->pengumuman->kisaran_gaji) }}
                                </span>Monthly
                            </p>
                            <p>
                                Qualification <span class="text-purple">{{ $calon->pengumuman->qualification }}</span>,
                            </p>
                            <h6 class="mt-2">Berkas CV Peserta Lengkap!</h6>
                            <div class="col-4">
                                <hr>
                            </div>
                            <div class="text-center">
                                <img src="{{ asset('assets/images/resume-2.png') }}" width="300" alt="...">
                            </div>
                            <div class="col-12">
                                <a href="{{ route('calon-pegawai.index') }}" class="btn btn-secondary px-4"
                                    type="button">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-header py-3 bg-transparent">
                            <h5 class="mb-0">Formulir Lamaran Peserta</h5>
                        </div>
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label mr-1" for="nama_lengkap">Nama Lengkap Pelamar
                                            Pegawai</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Nama Lengkap Pelamar"
                                            name="nama_lengkap" value="{{ $calon->nama_lengkap }}" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="nama_panggilan">Nama Panggilan
                                            Pelamar</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Nama Panggilan Pelamar"
                                            name="nama_panggilan" value="{{ $calon->nama_panggilan }}" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="no_telp">No. Telphone</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="no_telp" class="form-control"
                                            placeholder="Input Nomor Telephone Pelamar" name="no_telp"
                                            value="{{ $calon->no_telp }}" readonly>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label mr-1" for="email">Email</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <input type="email" class="form-control" placeholder="Input Email Pelamar"
                                            name="email" value="{{ $calon->email }}" readonly>
                                    </div>

                                    <div class="col-12">
                                        <label class="small mb-1 mr-1" for="alamat_lengkap">AlamatLengkap</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <textarea class="form-control" id="alamat_lengkap" type="text" rows="3" cols="4"
                                            name="alamat_lengkap" placeholder="Input Alamat Pelamar"
                                            value="{{ $calon->alamat_lengkap }}"
                                            readonly>{{ $calon->alamat_lengkap }}</textarea>
                                    </div>
                                    @if ($calon->file_cv != null)
                                    <div class="col-4">
                                        <a href="{{ route('calon-pegawai-cv',$calon->file_cv) }}" class="btn btn-primary px-5 mr-2"><i class="bi bi-cloud-arrow-down-fill"></i>Downloads File CV</a>
                                    </div>
                                    @endif
                                    @if ($calon->file_pendukung != null)
                                    <div class="col-4">
                                        <a href="{{ route('calon-pegawai-pendukung',$calon->file_pendukung) }}" class="btn btn-primary px-5 mr-2"><i class="bi bi-cloud-arrow-down-fill"></i>Downloads File CV</a>
                                    </div>
                                    @endif
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
