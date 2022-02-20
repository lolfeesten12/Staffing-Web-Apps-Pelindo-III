@extends('user-views.pages.requirement.webrequirement.layout.layoutwebreq')


@section('name')
Detail {{ $pengumuman->nama_pengumuman }}
@endsection

@section('content')

<div class="container">
    <div class="mt-5">
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

        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset('assets/images/tes.png') }}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <h5 class="card-title">Interested? Apply in Here</h5>
                        <p class="card-text">Periode requirement ini mulai dari tanggal<span class="text-purple">
                                {{ $pengumuman->tanggal_mulai }} </span> sampai
                            <span class="text-purple">{{ $pengumuman->tanggal_selesai }} </span>.
                            Klik Button Apply Now untuk mengajukan lamaran</p>
                        <a href="{{ route('web-requirement.edit', $pengumuman->id_pengumuman) }}"
                            class="btn btn-primary">Apply Now</a>
                    </div>
                </div>
            </div>
            <div class="col-8">


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
                            <span class="text-purple"> {{ $pengumuman->job_years_experience }} Tahun </span>, Tipe
                            Job
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
                        <h5 class="mt-5">Job Description</h5>
                        <div class="col-4">
                            <hr>
                        </div>
                        <p class="justify" style="text-align: justify">
                            {{ $pengumuman->job_description }}
                        </p>
                        <h5 class="mt-5">Job Requirement</h5>
                        <div class="col-4">
                            <hr>
                        </div>
                        <p class="justify" style="text-align: justify">
                            {{ $pengumuman->job_requirement }}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
