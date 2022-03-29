@extends('user-views.pages.requirement.webrequirement.layout.layoutwebreq')


@section('name')
Web Pelatihan
@endsection

@section('content')

{{-- <div class="container">
    <div class="mt-4">
        <div class="card rounded-0 overflow-hidden shadow-none border mb-5 mb-lg-0">
            <div class="row g-0">
                <div class="col-12 order-1 col-xl-6 d-flex align-items-center justify-content-center border-end">
                    <img src="{{ asset('assets/images/resume.png') }}" class="img-fluid" width="300" alt="">
                </div>

                <div class="col-12 col-xl-6 order-xl-2">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title">Pelatihan Kerja Pegawai</h5>
                        <p class="card-text mb-4">See your growth and get consulting support!</p>
                        <form class="form-body">

                            <div class="row g-3">


                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <div class="mt-5">
        <h5>Pelatihan yang Tersedia</h5>
        <hr>
        <div class="row">
            @forelse ($pelatihan as $item)
            <div class="col-4">
                <div class="card border-end p-3">
                    <div class="card-body">
                       
                        <h5 class="card-title">{{ $item->nama_pelatihan }}</h5>

                        <p class="card-text">
                            Jenis Pelatihan {{ $item->jenis_pelatihan }}, penyelenggara {{ $item->penyelenggara }}, contact info for information {{ $item->contact_info }}
                        </p>
                        <p>
                            Status <span class="text-purple">{{ $item->status_wajib }}</span>,
                            Biaya <span class="text-purple">Rp. {{ number_format($item->biaya) }} </span>
                        </p>
                        <div class="small">
                            Periode {{ $item->periode_awal }} - {{ $item->periode_akhir }}
                        </div>
                        <a href="{{ route('web-pelatihan.show', $item->id_pelatihan) }}"
                            class="btn btn-sm btn-primary">Lihat Detail Pelatihan</a>
                    </div>
                </div>
            </div>
            @empty

            @endforelse

        </div>
    </div>
</div>


@endsection
