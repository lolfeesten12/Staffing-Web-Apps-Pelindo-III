@extends('user-views.layouts.app')


@section('name')
Approval Pengajuan Cuti
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Cuti</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Approval Cuti Pegawai</li>
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
                                                style="width: 60px;">Nomor Cuti</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 170px;">Nama Pegawai</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Jenis Cuti</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Cuti Lama</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Tanggal Mulai</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Tanggal Selesai</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Status Proses</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cuti as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>
                                            @if ($item->cuti_nomor == null)
                                                Proses Cuti Terlebih Dahulu
                                            @elseif ($item->status_acc == 'Tolak')
                                                Ditolak
                                            @else
                                                {{ $item->cuti_nomor }}
                                            @endif
                                             </td>
                                            <td>{{ $item->Pegawai->nama_pegawai }}</td>
                                            <td>{{ $item->jenis_cuti }}</td>
                                            <td>{{ $item->cuti_lama }}</td>
                                            <td>{{ $item->tanggal_mulai }}</td>
                                            <td>{{ $item->tanggal_selesai }}</td>
                                            <td>
                                                @if ($item->status_acc == 'Terima')
                                                <span class="badge bg-light-success text-success w-100">Diterima</span>
                                                @elseif ($item->status_acc == 'Tolak')
                                                <span class="badge bg-light-danger text-danger w-100">Ditolak</span>
                                                @else
                                                <span class="badge bg-light-info text-info w-100">Diproses</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status_acc == 'Terima' || $item->status_acc == 'Tolak')
                                                <a href="{{ route('approval-cuti.show',$item->id_riwayat_cuti) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Detail Data Cuti"
                                                    class="btn btn-sm btn-primary"><i class="lni lni-eye"></i></a>
                                                @else
                                                <a href="{{ route('approval-cuti.show',$item->id_riwayat_cuti) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Detail Data Cuti"
                                                    class="btn btn-sm btn-primary"><i class="lni lni-eye"></i></a>
                                                <a href="javascript:;" class="btn btn-sm btn-success"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#ModalTerima-{{ $item->id_riwayat_cuti }}"><i class="lni lni-checkmark"></i></a>
                                                <a href="javascript:;" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#ModalTolak-{{ $item->id_riwayat_cuti }}"><i class="lni lni-close"></i></a>
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

@forelse ($cuti as $item)
<div class="modal fade" id="ModalTerima-{{ $item->id_riwayat_cuti }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light-success text-success">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Setujui Cuti</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('approval-cuti-status', $item->id_riwayat_cuti) }}?status_acc=Terima" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">Apakah Anda Yakin Menyetujui Pengajuan Cuti dari Pegawai atas nama {{ $item->Pegawai->nama_pegawai }}?</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Ya! Approve</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse

@forelse ($cuti as $item)
<div class="modal fade" id="ModalTolak-{{ $item->id_riwayat_cuti }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light-danger text-danger">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Tolak Data Cuti</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('approval-cuti-status', $item->id_riwayat_cuti) }}?status_acc=Tolak" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">Apakah Anda Yakin Menolak Pengajuan Cuti dari Pegawai atas nama {{ $item->Pegawai->nama_pegawai }}?</div>
                </div>

                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Ya! Tolak</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse



@endsection
