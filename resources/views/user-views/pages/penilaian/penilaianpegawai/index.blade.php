@extends('user-views.layouts.app')


@section('name')
Penilaian Pegawai
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Penilaian Pegawai</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Penilaian</li>
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
                                                style="width: 40px;">Periode Penilaian</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 40px;">Pegawai</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 40px;">Jabatan</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Pangkat & Golongan</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 40px;">Tanggal Penilaian</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Nilai Rata Rata</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Nilai SKP</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">File SKP</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($nilai as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->periode }}</td>
                                            <td>{{ $item->Pegawai->nama_pegawai }}</td>
                                            <td>{{ $item->Pegawai->Jabatan->nama_jabatan }}</td>
                                            <td>{{ $item->Pegawai->Pangkat->nama_pangkat }},
                                                {{ $item->Pegawai->Pangkat->golongan }}</td>
                                            <td>{{ $item->tanggal_buat }}</td>
                                            <td>{{ $item->nilai_rata2 }}</td>
                                            <td>{{ $item->nilai_skp ?? "Belum Dinilai" }}</td>
                                            <td class="text-center">
                                                @if ($item->file_skp != null)
                                                <a href="{{ route('penilaian-file-skp',$item->file_skp) }}"
                                                    class="btn btn-sm btn-info mr-2"><i
                                                        class="lni lni-download"></i></a>
                                                @else
                                                <div class="fs-3 text-success">
                                                    <i class="bi bi-x-circle-fill"></i>
                                                </div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status_acc == 'Approved')
                                                <span class="badge bg-light-success text-success w-100">Diterima</span>
                                                @elseif ($item->status_acc == 'Not Approved')
                                                <span class="badge bg-light-danger text-danger w-100">Ditolak</span>
                                                @elseif ($item->status_acc == 'Ditanggapi' || $item->status_acc ==
                                                'Keberatan')
                                                <span
                                                    class="badge bg-light-info text-info w-100">{{ $item->status_acc }}</span>
                                                @else
                                                <span class="badge bg-light-info text-info w-100">Diproses</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('penilaian-pegawai.show',$item->id_penilaian) }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                    data-bs-original-title="Detail Data Penilaian"
                                                    class="btn btn-sm btn-secondary"><i class="lni lni-eye"></i></a>
                                                @if ($item->status_acc == 'Pending')
                                                    <a href="javascript:;" class="btn btn-sm btn-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ModalTerima-{{ $item->id_penilaian }}"><i
                                                            class="lni lni-checkmark"></i></a>
                                                    <a href="javascript:;" class="btn btn-sm btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#ModalTolak-{{ $item->id_penilaian }}"><i
                                                            class="lni lni-close"></i></a>
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





@endsection
