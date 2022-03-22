@extends('user-views.layouts.app')


@section('name')
Cuti {{ $cuti->Pegawai->nama_pegawai }}
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Detail Cuti</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Cuti
                            {{ $cuti->Pegawai->nama_pegawai }}</li>
                    </ol>
                </nav>
            </div>

        </div>
        <hr>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card mb-4">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Detail Pengajuan Cuti</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 mb-2">
                                <label class="form-label mr-1">Nama Lengkap Pegawai</label>
                                <input type="text" class="form-control" 
                                    value="{{ $cuti->Pegawai->nama_pegawai }}" readonly>
                            </div>
                            <div class="col-4 mb-2">
                                <label class="form-label mr-1">Jenis Cuti</label>
                                <input type="text" class="form-control" 
                                    value="{{ $cuti->jenis_cuti }}" readonly>
                            </div>
                            <div class="col-4 mb-2">
                                <label class="form-label mr-1">Nomor Cuti</label>
                                <input type="text" class="form-control" 
                                    value="{{ $cuti->cuti_nomor }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mb-2">
                                <label class="form-label mr-1">Lama Cuti</label>
                                <input type="text" class="form-control" 
                                    value="{{ $cuti->cuti_lama }} Hari" readonly>
                            </div>
                            <div class="col-4 mb-2">
                                <label class="form-label mr-1">Tanggal Mulai</label>
                                <input type="text" class="form-control" 
                                    value="{{ $cuti->tanggal_mulai }}" readonly>
                            </div>
                            <div class="col-4 mb-2">
                                <label class="form-label mr-1">Tanggal Selesai</label>
                                <input type="text" class="form-control" 
                                    value="{{ $cuti->tanggal_selesai }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label class="form-label mr-1">Status Approval</label>
                                <input type="text" class="form-control" 
                                    value="{{ $cuti->status_acc }}" readonly>
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label mr-1">Status Pelaksanaan</label>
                                <input type="text" class="form-control" 
                                    value="{{ $cuti->status_dilaksanakan }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Riwayat Cuti Pegawai</h5>
                    </div>
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
                                                        style="width: 80px;">Jenis Cuti</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 80px;">Tanggal Mulai</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 80px;">Tanggal Selesai</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 80px;">Status Cuti</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($riwayat as $item)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                    <td>{{ $item->Pegawai->nama_pegawai }}</td>
                                                    <td>{{ $item->jenis_cuti }}</td>
                                                    <td>{{ $item->tanggal_mulai }}</td>
                                                    <td>{{ $item->tanggal_selesai }}</td>
                                                    <td>
                                                        @if ($item->status_dilaksanakan == 'Belum Dilaksanakan')
                                                        <span class="badge bg-light-info text-info w-100">Belum Dilaksanakan</span>
                                                        @else
                                                        <span class="badge bg-light-success text-success w-100">Sudah Dilaksanakan</span>
                                                        @endif
                                                    </td>
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
        </div>
    </div>
</main>




@endsection
