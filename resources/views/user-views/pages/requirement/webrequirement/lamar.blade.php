@extends('user-views.pages.requirement.webrequirement.layout.layoutwebreq')


@section('name')
Apply Lamaran {{ $pengumuman->nama_pengumuman }}
@endsection

@section('content')

<div class="container">
    <div class="mt-5">
        <div class="row">
            <div class="col-4">
                <div class="card border-end p-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h3>PT. Pelabuhan Indonesia</h3>
                            </div>
                            <div class="col-3 text-right">
                                <div class="small">
                                    Posted {{ $pengumuman->tanggal_mulai }}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="card-title">{{ $pengumuman->nama_pengumuman }}</h5>
                        <p class="card-text">
                            Dibutuhkan <span class="text-purple"> {{ $pengumuman->Jabatan->nama_jabatan }} </span>,
                            Pengalaman selama
                            <span class="text-purple"> {{ $pengumuman->job_years_experience }} Tahun </span>, Tipe Job
                            <span class="text-purple">{{ $pengumuman->job_type }}</span>
                        </p>
                        <p>
                            Penempatan <span class="text-purple">{{ $pengumuman->penempatan }}</span>,
                            IDR <span class="text-purple">{{ number_format($pengumuman->kisaran_gaji) }}
                            </span>Monthly
                        </p>
                        <p>
                            Qualification <span class="text-purple">{{ $pengumuman->qualification }}</span>,
                        </p>
                        <h6 class="mt-2">Persiapkan Berkas Anda!</h6>
                        <div class="col-4">
                            <hr>
                        </div>
                        <img src="{{ asset('assets/images/resume-2.png') }}" class="card-img-top" alt="...">

                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Lengkapi Form Lamaran Berikut</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <form action="{{ route('web-requirement.update', $pengumuman->id_pengumuman) }}"
                                method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label mr-1" for="nama_lengkap">Nama Lengkap Pelamar
                                            Pegawai</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Nama Lengkap Pelamar"
                                            name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="nama_panggilan">Nama Panggilan
                                            Pelamar</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Nama Panggilan Pelamar"
                                            name="nama_panggilan" value="{{ old('nama_panggilan') }}" required>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label mr-1" for="no_telp">No. Telphone</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="no_telp" class="form-control"
                                            placeholder="Input Nomor Telephone Pelamar" name="no_telp"
                                            value="{{ old('no_telp') }}" required>
                                        <div class="small">
                                            <span class="text-muted">Pastikan Nomor Telephone dapat dihubungi</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label mr-1" for="email">Email</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <input type="email" class="form-control" placeholder="Input Email Pelamar"
                                            name="email" value="{{ old('email') }}" required>
                                    </div>

                                    <div class="col-12">
                                        <label class="small mb-1 mr-1" for="alamat_lengkap">AlamatLengkap</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <textarea class="form-control" id="alamat_lengkap" type="text" rows="3" cols="4"
                                            name="alamat_lengkap" placeholder="Input Alamat Pelamar"
                                            value="{{ old('alamat_lengkap') }}"></textarea>
                                    </div>
                                    <div class="col-6">
                                        <label class="small mb-1" for="file_cv">File CV</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                        <input class="form-control" id="file_cv" type="file" name="file_cv"
                                            value="{{ old('file_cv') }}" accept="application/pdf" multiple="multiple"
                                            required>
                                        <div class="small">
                                            <span class="text-muted">Accept File in PDF Format </span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="small mb-1" for="file_pendukung">File Pendukung</label>
                                        <input class="form-control" id="file_pendukung" type="file"
                                            name="file_pendukung" value="{{ old('file_pendukung') }}"
                                            accept="application/pdf" multiple="multiple">
                                        <div class="small">
                                            <span class="text-muted">Accept File in PDF Format, Anda dapat menambahkan
                                                file pendukung seperti Portofolio, Certificate dll.</span>
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
                                        <button class="btn btn-primary px-4" type="submit">Apply Now</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection