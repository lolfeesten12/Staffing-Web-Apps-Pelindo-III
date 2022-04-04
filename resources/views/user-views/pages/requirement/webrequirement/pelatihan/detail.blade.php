@extends('user-views.pages.requirement.webrequirement.layout.layoutwebreq')


@section('name')
Detail {{ $pelatihan->nama_pelatihan }}
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

        @if(session('gagal'))
        <div
            class="alert border-0 border-danger border-start border-4 bg-light-danger alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-danger"><i class="lni lni-close"></i>
                </div>
                <div class="ms-3">
                    <div class="text-danger"> {{ session('gagal') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset('assets/images/pelatihan.png') }}" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        @if ($pelatihan->status_wajib == 'Wajib')
                        <h5 class="card-title">Pelatihan Wajib</h5>
                        <p class="card-text">Pelatihan wajib ini dimulai dari tanggal<span class="text-purple">
                                {{ $pelatihan->periode_awal }} </span> sampai
                            <span class="text-purple">{{ $pelatihan->periode_akhir }} </span>.
                        </p>
                        @else

                        <h5 class="card-title">Interested? Enroll Now</h5>
                        <p class="card-text">Periode Pelatihan ini mulai dari tanggal<span class="text-purple">
                                {{ $pelatihan->periode_awal }} </span> sampai
                            <span class="text-purple">{{ $pelatihan->periode_akhir }} </span>.
                            Klik Button Enroll untuk mendaftar</p>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#ModalEnroll">Enroll Here!</button>

                        @endif
                    </div>

                </div>
            </div>
            <div class="col-8">
                <div class="card border-end p-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <h3>{{ $pelatihan->jenis_pelatihan }}</h3>
                            </div>
                            <div class="col-3 text-right">
                                <div class="small">
                                    Posted {{ $pelatihan->created_at }}
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5 class="card-title">{{ $pelatihan->nama_pelatihan }}</h5>
                        <p class="card-text">
                            Penyelenggara <span class="text-purple"> {{ $pelatihan->penyelenggara }} </span>,
                            Contact Info
                            <span class="text-purple"> {{ $pelatihan->contact_info }} </span>, Status Wajib
                            <span class="text-purple">{{ $pelatihan->status_wajib }}</span>
                        </p>
                        <p>
                            Biaya Pelatihan <span class="text-purple">{{ number_format($pelatihan->biaya) }}
                            </span>
                        </p>
                        <h5 class="mt-5">Keterangan Pelatihan</h5>
                        <div class="col-4">
                            <hr>
                        </div>
                        <p class="justify" style="text-align: justify">
                            {{ $pelatihan->keterangan }}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="ModalEnroll" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enroll Program {{ $pelatihan->jenis_pelatihan }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('web-pelatihan.update', $pelatihan->id_pelatihan) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">Apakah Anda Yakin Mendaftar pada Program {{ $pelatihan->jenis_pelatihan }} {{ $pelatihan->nama_pelatihan }}, dengan biaya Rp. {{ number_format($pelatihan->biaya) }}? </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Enroll</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
