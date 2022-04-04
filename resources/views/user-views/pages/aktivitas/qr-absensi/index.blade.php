@extends('user-views.layouts.app')


@section('name')
Qr Code Absensi
@endsection

@section('content')


<main class="page-content">

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Absensi</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">QR Code Absensi</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-12 col-xl-3">
            <div class="card">
                <div class="card-body border-bottom">
                    <form action="{{ route('Qr-absensi.store') }}" method="POST">
                        @csrf
                        <div class="d-grid"> <button type="Submit" class="btn btn-primary"><i class="bi bi-plus-lg"></i>
                                Buar Qr</=>
                        </div>
                    </form>




                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-0 text-primary font-weight-bold">{{ $tanggal }}</h5>

                    <div class="mb-4 mt-4">

                        <div class="d-flex align-items-center gap-2">
                            <div class="fs-6 text-purple"><i class="bi bi-file-earmark-richtext-fill"></i></div>
                            <div>Jumlah Orang Absesn</div>
                            <div class="ms-auto">{{ $jumlah_masuk }}</div>
                        </div>
                        <div class="progress mt-2" style="height: 4px;">
                            @if ($jumlah_masuk== 0)
                            <div class="progress-bar bg-purple" role="progressbar" style="width: 0%;" aria-valuenow="{{ $jumlah_masuk }}" aria-valuemin="0" aria-valuemax="{{ $jumlah_jadwal }}"></div>

                            @else
                            <div class="progress-bar bg-purple" role="progressbar" style="width: {{ $jumlah_masuk/$jumlah_jadwal*100 }}%;" aria-valuenow="{{ $jumlah_masuk }}" aria-valuemin="0" aria-valuemax="{{ $jumlah_jadwal }}"></div>

                            @endif
                        </div>
                    </div>
                    {{-- <div class="mb-0">
      <div class="d-flex align-items-center gap-2">
         <div class="fs-6 text-secondary"><i class="bi bi-file-post-fill"></i></div>
         <div>Unknown Files</div>
         <div class="ms-auto">8 GB</div>
      </div>
      <div class="progress mt-2" style="height: 4px;">
        <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    </div>  --}}

                </div>
            </div>
        </div>
        <div class="col-12 col-xl-9">
            <div class="card">
                <div class="card-body">
                    @if($jadwal == NULL)
                    <H1>Jadwal hari Ini Kosong</H1>
                    @else
                    @if ($jadwal->qrcode == NULL)
                    <H1>QR Code Hari Ini Belum Dibuat</H1>
                    <h1>Silakan Generate QR Code</h1>
                    @else
                    {{ $data }}
                    @endif
                    @endif


                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</main>


@endsection
