@extends('user-views.layouts.app')


@section('name')
Usulan Mutasi Pangkat
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Usulan Mutasi Pangkat</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Mutasi</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                {{-- <a href="" class="btn btn-sm btn-primary" type="button" data-bs-toggle="modal"
                    data-bs-target="#Modaltambah">
                    Tambah Data
                </a> --}}
                <a href="{{ route('usulan-pangkat.create') }}" data-bs-toggle="tooltip" data-bs-placement="top"
                title=""
                data-bs-original-title="Tambah Data Usulan" class="btn btn-sm btn-primary">Tambah Data</a>
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
                                                style="width: 80px;">Nomor Surat</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Tanggal Surat</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Jenis Mutasi</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Pegawai</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Pangkat Pegawai</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Pangkat Tujuan</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Status Acc</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($usulan as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->nomor_surat }}</td>
                                            <td>{{ $item->tanggal_surat }}</td>
                                            <td>{{ $item->jenis_mutasi }}</td>
                                            <td>{{ $item->Pegawai->nama_pegawai }}</td>
                                            <td>{{ $item->Pegawai->Pangkat->nama_pangkat}}, {{ $item->Pegawai->Pangkat->golongan }}</td>
                                           <td>{{ $item->Pangkat->nama_pangkat }}, {{ $item->Pangkat->golongan }}</td>
                                            <td class="text-center">
                                                @if ($item->status == 'Terima')
                                                <span class="badge bg-light-success text-success w-100">Dimutasi</span>
                                                @elseif ($item->status == 'Tolak')
                                                <span class="badge bg-light-danger text-danger w-100">Ditolak</span>
                                                @else
                                                <span class="badge bg-light-info text-info w-100">Diproses</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('usulan-pangkat.show',$item->id_usulan) }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="Detail Data Usulan"
                                                    class="btn btn-sm btn-secondary"><i class="lni lni-eye"></i></a>
                                                <a href="{{ route('usulan-pangkat.edit',$item->id_usulan) }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="Edit Data Usulan"
                                                    class="btn btn-sm btn-primary"><i class="bi bi-pencil-fill"></i></a>
                                                <a href="javascript:;" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Modalhapus-{{ $item->id_usulan }}"><i
                                                        class="bi bi-trash-fill"></i></a>
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



@forelse ($usulan as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_usulan }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title text-white">Hapus Data Usulan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('usulan-pangkat.destroy', $item->id_usulan) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body text-white">
                    Apakah Anda Yakin Menghapus Data Usulan Pangkat ini ?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Ya! Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse



@endsection
