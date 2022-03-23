@extends('user-views.layouts.app')


@section('name')
Riwayat Pegawai
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Master Data</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Riwayat Pegawai
                            {{ $pegawai->nama_pegawai }}</li>
                    </ol>
                </nav>
            </div>

        </div>
        <hr>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="pill" href="#riwayat-keluarga" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Riwayat Keluarga</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#riwayat-pendidikan" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Riwayat Pendidikan</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#riwayat-prestasi" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Riwayat Prestasi</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#riwayat-cuti" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Riwayat Cuti</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#riwayat-pelanggaran" role="tab" aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                        </div>
                                        <div class="tab-title">Riwayat Pelanggaran</div>
                                    </div>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show" id="riwayat-keluarga" role="tabpanel">
                                <div class="table-responsive">
                                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="tes" class="table table-striped table-bordered dataTable"
                                                    style="width: 100%;" role="grid" aria-describedby="example_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-sort="ascending"
                                                                aria-label="Name: activate to sort column descending"
                                                                style="width: 100px;">No.</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 20px;">Hubungan Keluarga</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 100px;">Nama Keluarga</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 80px;">Tempat Lahir</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 70px;">Tanggal Lahir</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 90px;">Alamat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($pegawai->RiwayatKeluarga as $item)
                                                        <tr role="row" class="odd">
                                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                            <td class="text-center">{{ $item->Hubungan->hubungan_keluarga }}</td>
                                                            <td>{{ $item->kel_nama }}</td>
                                                            <td>{{ $item->kel_tempat_lahir }}</td>
                                                            <td>{{ $item->kel_tanggal_lahir }}</td>
                                                            <td>{{ $item->kel_alamat }}</td>
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
                            <div class="tab-pane fade" id="riwayat-pendidikan" role="tabpanel">
                                <div class="table-responsive">
                                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="tes" class="table table-striped table-bordered dataTable"
                                                    style="width: 100%;" role="grid" aria-describedby="example_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-sort="ascending"
                                                                aria-label="Name: activate to sort column descending"
                                                                style="width: 100px;">No.</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 20px;">Tipe Pendidikan</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 100px;">Nama Sekolah</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 80px;">Jurusan</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 70px;">Nomor Ijasah</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 70px;">Tanggal Ijasah</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 70px;">File Ijasah</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($pegawai->RiwayatPendidikan as $item)
                                                        <tr role="row" class="odd">
                                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                            <td>{{ $item->tipe_pendidikan }}</td>
                                                            <td>{{ $item->nama_sekolah }}</td>
                                                            <td>{{ $item->jurusan }}</td>
                                                            <td>{{ $item->no_ijasah }}</td>
                                                            <td>{{ $item->tanggal_ijasah }}</td>
                                                            <td>{{ $item->file }}</td>
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
                            <div class="tab-pane fade" id="riwayat-prestasi" role="tabpanel">
                                <div class="table-responsive">
                                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="tes" class="table table-striped table-bordered dataTable"
                                                    style="width: 100%;" role="grid" aria-describedby="example_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-sort="ascending"
                                                                aria-label="Name: activate to sort column descending"
                                                                style="width: 100px;">No.</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 20px;">Nama Prestasi</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 100px;">Tingkat</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 80px;">Tanggal</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 70px;">File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($pegawai->RiwayatPrestasi as $item)
                                                        <tr role="row" class="odd">
                                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                            <td>{{ $item->nama_prestasi }}</td>
                                                            <td>{{ $item->tingkat }}</td>
                                                            <td>{{ $item->tanggal }}</td>
                                                            <td>{{ $item->file }}</td>
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
                            <div class="tab-pane fade" id="riwayat-cuti" role="tabpanel">
                                <div class="table-responsive">
                                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="tes" class="table table-striped table-bordered dataTable"
                                                    style="width: 100%;" role="grid" aria-describedby="example_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-sort="ascending"
                                                                aria-label="Name: activate to sort column descending"
                                                                style="width: 100px;">No.</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 20px;">Cuti Nomor</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 20px;">Cuti Lama</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 100px;">Tanggal Mulai</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 80px;">Tanggal Selesai</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 80px;">Alasan</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 80px;">Status Acc</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 80px;">Status Pelaksanaan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($pegawai->RiwayatCuti as $item)
                                                        <tr role="row" class="odd">
                                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                            <td>{{ $item->cuti_nomor }}</td>
                                                            <td>{{ $item->cuti_lama }} Hari</td>
                                                            <td>{{ $item->tanggal_mulai }}</td>
                                                            <td>{{ $item->tanggal_selesai }}</td>
                                                            <td>{{ $item->alasan }}</td>
                                                            <td>
                                                                @if ($item->status_acc == 'Terima')
                                                                <span class="badge bg-light-success text-success w-100">Diterima</span>
                                                                @else
                                                                <span class="badge bg-light-danger text-danger w-100">Ditolak</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if ($item->status_dilaksanakan == 'Sudah Dilaksanakan')
                                                                <span class="badge bg-light-success text-success w-100">Telah Dilaksanakan</span>
                                                                @else
                                                                <span class="badge bg-light-danger text-danger w-100">Belum Dilaksanakan</span>
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
                            <div class="tab-pane fade" id="riwayat-pelanggaran" role="tabpanel">
                                <div class="table-responsive">
                                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="tes" class="table table-striped table-bordered dataTable"
                                                    style="width: 100%;" role="grid" aria-describedby="example_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-sort="ascending"
                                                                aria-label="Name: activate to sort column descending"
                                                                style="width: 100px;">No.</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 20px;">Pelanggaran</th>
                                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 20px;">Nomor Surat</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 100px;">Pejabat Atasan</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                                style="width: 80px;">Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($pegawai->RiwayatPelanggaran as $item)
                                                        <tr role="row" class="odd">
                                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                            <td>{{ $item->Pelanggaran->pelanggaran }}</td>
                                                            <td>{{ $item->no_surat }}</td>
                                                            <td>{{ $item->Pejabat->nama_pegawai }}</td>
                                                            <td>{{ $item->keterangan }}</td>
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
        </div>
    </div>
</main>




@endsection
