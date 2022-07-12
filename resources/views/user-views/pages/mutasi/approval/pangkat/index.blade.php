@extends('user-views.layouts.app')


@section('name')
Approval Mutasi Pangkat
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Approval Mutasi Pangkat</div>
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
                                                style="width: 80px;">Pangkat Asal</th>
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
                                            <td>
                                                @if ($item->status_approval == 'Terima')
                                                <span class="badge bg-light-success text-success w-100">Diterima</span>
                                                @elseif ($item->status_approval == 'Tolak')
                                                <span class="badge bg-light-danger text-danger w-100">Ditolak</span>
                                                @else
                                                <span class="badge bg-light-info text-info w-100">Diproses</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status_approval == 'Terima' || $item->status_approval == 'Tolak')
                                                <a href="{{ route('approval-mutasi-pangkat.show',$item->id_usulan) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Detail Data Usulan"
                                                    class="btn btn-sm btn-primary"><i class="lni lni-eye"></i></a>
                                                @else
                                                <a href="{{ route('approval-mutasi-pangkat.show',$item->id_usulan) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Detail Data Usulan"
                                                    class="btn btn-sm btn-primary"><i class="lni lni-eye"></i></a>
                                                <a href="javascript:;" class="btn btn-sm btn-success"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#ModalTerima-{{ $item->id_usulan }}"><i class="lni lni-checkmark"></i></a>
                                                <a href="javascript:;" class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#ModalTolak-{{ $item->id_usulan }}"><i class="lni lni-close"></i></a>
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


@forelse ($usulan as $item)
<div class="modal fade" id="ModalTerima-{{ $item->id_usulan }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light-success text-success">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Setujui Data Usulan Mutasi Pangkat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('status-approval-mutasi', $item->id_usulan) }}?status_approval=Terima" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">Apakah Anda Yakin Menyetujui Mutasi Pangkat Pegawai {{ $item->Pegawai->nama_pegawai }}, dengan nomor surat {{ $item->nomor_surat }}?</div>
                    <div class="col-12 mt-2">
                        <label class="small mb-1" for="keterangan_approval">Keterangan Approval</label>
                        <textarea class="form-control" id="text" type="keterangan_approval" name="keterangan_approval"
                            value="{{ old('keterangan_approval') }}"></textarea>
                    </div>
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

@forelse ($usulan as $item)
<div class="modal fade" id="ModalTolak-{{ $item->id_usulan }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light-danger text-danger">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Tolak Data Usulan Mutasi Pangkat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('status-approval-mutasi', $item->id_usulan) }}?status_approval=Tolak" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">Apakah Anda Yakin Menolak Mutasi Pangkat Pegawai {{ $item->Pegawai->nama_pegawai }}, dengan nomor surat {{ $item->nomor_surat }}?</div>
                    <div class="col-12 mt-2">
                        <label class="small mb-1" for="keterangan_approval">Keterangan Approval</label>
                        <textarea class="form-control" id="text" type="keterangan_approval" name="keterangan_approval"
                            value="{{ old('keterangan_approval') }}"></textarea>
                    </div>
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
