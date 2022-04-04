@extends('user-views.layouts.app')


@section('name')
Program {{ $detail[0]->Pelatihan->jenis_pelatihan }}
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Program Pelatihan</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Peserta {{ $detail[0]->Pelatihan->nama_pelatihan }}</li>
                    </ol>
                </nav>
            </div>
        </div>
        <hr>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="card p-5">
                <div class="card-body text-center">
                    
                    <h5 class="card-title">{{ $detail[0]->Pelatihan->jenis_pelatihan }}{{ $detail[0]->Pelatihan->nama_pelatihan }}</h5>
                    <p class="card-text">Pelatihan dimulai dari tanggal<span class="text-purple">
                            {{ $detail[0]->Pelatihan->periode_awal }} </span> sampai
                        <span class="text-purple">{{ $detail[0]->Pelatihan->periode_akhir }} </span>.
                    </p>
                </div>
                <img src="{{ asset('assets/images/pelatihan.png') }}" class="card-img-top" alt="...">
            </div>
        </div>
        <div class="col-8">
            <div class="card border-end p-3">
                <div class="card-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example" class="table table-striped table-bordered dataTable"
                                    style="width: 100%;" role="grid" aria-describedby="example_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 100px;">No.</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 170px;">Nama Pegawai</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Jabatan</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Unit Kerja</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($detail as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->Pegawai->nama_pegawai }}</td>
                                            <td>{{ $item->Pegawai->Jabatan->nama_jabatan }}</td>
                                            <td>{{ $item->Pegawai->UnitKerja->unit_kerja }}</td>
                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
