@extends('user-views.layouts.app')


@section('name')
Mutasi Jabatan
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Mutasi Jabatan</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Mutasi</li>
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
        <div class="card">
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
                                                style="width: 40px;">Nomor Surat Usulan</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Jenis Mutasi</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Jabatan Sekarang</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Jabatan Tujuan</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Pegawai</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Nomor SK</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Tanggal SK</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">File SK</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($mutasi as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->nomor_surat }}</td>
                                            <td>{{ $item->jenis_mutasi }}</td>
                                            <td>{{ $item->Pegawai->Jabatan->nama_jabatan }}</td>
                                            <td>{{ $item->Jabatan->nama_jabatan }}</td>
                                            <td>{{ $item->Pegawai->nama_pegawai }}</td>
                                            <td>{{ $item->nomor_sk ?? "Belum Diproses"}}</td>
                                            <td>{{ $item->tanggal_sk ?? "Belum Diproses"}}</td>
                                            @if ($item->file_sk != null)
                                            <td class="text-center">
                                                <a href="{{ route('sk-mutasi',$item->file_sk) }}"
                                                    class="btn btn-sm btn-info mr-2"><i
                                                        class="lni lni-download"></i></a>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <span class="badge bg-light-info text-info w-100">Proses SK</span>
                                            </td>
                                            @endif
                                            <td class="text-center">
                                                @if ($item->status_approval == 'Terima')
                                                <span class="badge bg-light-success text-success w-100">Disetujui,SK Mutasi <br>Diproses</span>
                                                @elseif ($item->status_approval == 'Dimutasi')
                                                <span class="badge bg-light-primary text-primary w-100">Telah Dimutasi</span>
                                                @else
                                                <span class="badge bg-light-info text-info w-100">Diproses</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status_approval == 'Terima')
                                                <a href="javascript:;" class="btn btn-sm btn-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#Modalproses-{{ $item->id_usulan }}">Proses SK</a>
                                                @elseif ($item->status_approval == 'Dimutasi')
                                                <span class="badge bg-light-primary text-primary w-100">Pegawai Telah Dimutasi</span>
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
</main>

@forelse ($mutasi as $item)
<div class="modal fade" id="Modalproses-{{ $item->id_usulan }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Proses SK Mutasi Jabatan {{ $item->jenis_mutasi }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('mutasi-jabatan.update', $item->id_usulan) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label class="small mt-3">Detail Mutasi Jabatan</label>
                    <hr>
                    </hr>
                    <div class="form-group mt-1">
                        <label class="small mb-1 mr-1">Pegawai</label>
                        <input class="form-control"  type="text" value="{{ $item->Pegawai->nama_pegawai }}" readonly></input>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <label class="small mb-1 mr-1">Jenis Mutasi</label>
                            <input class="form-control"  type="text" value="{{ $item->jenis_mutasi }}" readonly></input>
                        </div>
                        <div class="col-4">
                            <label class="small mb-1 mr-1">Jabatan Asal</label>
                            <input class="form-control"  type="text" value="{{ $item->Pegawai->Jabatan->nama_jabatan }}" readonly></input>
                        </div>
                        <div class="col-4">
                            <label class="small mb-1 mr-1">Jabatan Tujuan</label>
                            <input class="form-control"  type="text" value="{{ $item->Jabatan->nama_jabatan }}" readonly></input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label class="small mb-1 mr-1">Nomor Surat</label>
                            <input class="form-control"  type="text" value="{{ $item->nomor_surat }}" readonly></input>
                        </div>
                        <div class="col-6">
                            <label class="small mb-1 mr-1">Tanggal Surat</label>
                            <input class="form-control"  type="text" value="{{ $item->tanggal_surat }}" readonly></input>
                        </div>
                    </div>
                    <label class="small mt-3">Lengkapi SK Pegawai</label>
                    <hr>
                    </hr>
                    <div class="row">
                        <div class="col-6">
                            <label class="small mb-1 mr-1" for="nomor_sk">Nomor SK</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <input class="form-control" name="nomor_sk" type="text" id="nomor_sk"
                                value="{{ old('nomor_sk') }}" required></input>
                        </div>
                        <div class="col-6">
                            <label class="small mb-1 mr-1" for="tanggal_sk">Tanggal SK</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <input class="form-control" name="tanggal_sk" type="date" id="tanggal_sk"
                                value="{{ old('tanggal_sk') }}" required></input>
                        </div>
                    </div>
                    
                   
                    <div class="form-group mt-1">
                        <label class="small mb-1" for="file_sk">file_sk SK</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" id="file_sk" type="file" name="file_sk"
                            value="{{ old('file_sk') }}" accept="application/pdf" multiple="multiple"
                            required>
                        <div class="small">
                            <span class="text-muted">Accept File in PDF Format, File Size Max 2 MB</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Proses SK</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse


@endsection
