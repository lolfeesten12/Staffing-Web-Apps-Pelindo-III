@extends('user-views.pages.requirement.webrequirement.layout.layoutwebreq')


@section('name')
Web Requirement
@endsection

@section('content')

<div class="container">
    <div class="mt-4">
        <div class="card rounded-0 overflow-hidden shadow-none border mb-5 mb-lg-0">
            <div class="row g-0">
                <div class="col-12 order-1 col-xl-6 d-flex align-items-center justify-content-center border-end">
                    <img src="{{ asset('assets/images/resume.png') }}" class="img-fluid" width="300" alt="">
                </div>

                <div class="col-12 col-xl-6 order-xl-2">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title">Sign In</h5>
                        <p class="card-text mb-4">See your growth and get consulting support!</p>
                        <form class="form-body">

                            <div class="row g-3">


                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary radius-30">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="mt-5">
        <div class="row">
            @forelse ($pengumuman as $item)
            <div class="col-4">
                <div class="card border-end p-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nama_pengumuman }}</h5>

                        <p class="card-text">
                            Dibutuhkan {{ $item->Jabatan->nama_jabatan }}, Pengalaman selama
                            {{ $item->job_years_experience }} Tahun, Tipe Job {{ $item->job_type }}
                        </p>
                        <p>
                            Penempatan <span class="text-purple">{{ $item->penempatan }}</span>,
                            IDR <span class="text-purple">{{ number_format($item->kisaran_gaji) }} </span>Monthly
                        </p>
                        <div class="small">
                            Expired {{ $item->tanggal_selesai }}
                        </div>
                        <a href="{{ route('web-requirement.show', $item->id_pengumuman) }}"
                            class="btn btn-sm btn-primary">Lihat Detail Requirement</a>
                    </div>
                </div>
            </div>
            @empty

            @endforelse

        </div>
    </div>
</div>


@endsection
