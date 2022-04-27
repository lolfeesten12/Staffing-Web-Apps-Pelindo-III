@extends('user-views.layouts.app')


@section('name')
Absen Manual
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
                    <li class="breadcrumb-item active" aria-current="page">Absen Pegawai</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="row">
        <div class="col-12 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-0 text-primary font-weight-bold">{{ $tanggal }}</h5>

                    <div class="mb-4 mt-4">

                        <div class="d-flex align-items-center gap-2">
                            <div class="fs-6 text-purple"><i class="bi bi-file-earmark-richtext-fill"></i></div>
                            <div>Jumlah Pegawai Absen</div>
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
                    <div class="mb-4 mt-4">

                        <div class="d-flex align-items-center gap-2">
                            <div class="fs-6 text-purple"><i class="bi bi-file-earmark-richtext-fill"></i></div>
                            <div>Jumlah Pegawai Masuk</div>
                            <div class="ms-auto">{{ $pegawai_masuk }}</div>
                        </div>
                        <div class="progress mt-2" style="height: 4px;">
                            @if ($pegawai_masuk== 0)
                            <div class="progress-bar bg-purple" role="progressbar" style="width: 0%;" aria-valuenow="{{ $pegawai_masuk }}" aria-valuemin="0" aria-valuemax="{{ $jumlah_jadwal }}"></div>

                            @else
                            <div class="progress-bar bg-purple" role="progressbar" style="width: {{ $pegawai_masuk/$jumlah_jadwal*100 }}%;" aria-valuenow="{{ $jumlah_masuk }}" aria-valuemin="0" aria-valuemax="{{ $jumlah_jadwal }}"></div>

                            @endif
                        </div>
                    </div>
                    <div class="mb-4 mt-4">

                        <div class="d-flex align-items-center gap-2">
                            <div class="fs-6 text-purple"><i class="bi bi-file-earmark-richtext-fill"></i></div>
                            <div>Jumlah Pegawai Tidak Masuk</div>
                            <div class="ms-auto">{{ $pegawai_tidak_masuk }}</div>
                        </div>
                        <div class="progress mt-2" style="height: 4px;">
                            @if ($pegawai_tidak_masuk== 0)
                            <div class="progress-bar bg-purple" role="progressbar" style="width: 0%;" aria-valuenow="{{ $pegawai_tidak_masuk }}" aria-valuemin="0" aria-valuemax="{{ $jumlah_jadwal }}"></div>

                            @else
                            <div class="progress-bar bg-purple" role="progressbar" style="width: {{ $pegawai_tidak_masuk/$jumlah_jadwal*100 }}%;" aria-valuenow="{{ $jumlah_masuk }}" aria-valuemin="0" aria-valuemax="{{ $jumlah_jadwal }}"></div>

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
                    {{-- @if($jadwal == NULL)
                    <H1>Jadwal hari Ini Kosong</H1>
                    @else  --}}
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="example" class="table table-striped table-bordered dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">No.</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 410px;">Nama Pegawai</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 410px;">Jam Masuk</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 410px;">Jam Keluar</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 410px;">Keterangan</th>
                                                            {{-- <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                                style="width: 70px;">Action</th>  --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($jadwal_pegawai as $item)
                                                        <tr role="row" class="odd">
                                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                            <td>{{ $item->Pegawai->nama_pegawai }}</td>

                                                            @if ($item->Absen != NULL )
                                                            @if ($item->Absen->jenis_absen == 'Izin' || $item->Absen->jenis_absen == 'Cuti' ||$item->Absen->jenis_absen == 'Alpha' ||$item->Absen->jenis_absen == 'Sakit' )
                                                            <td colspan="3" style="text-align:center">{{ $item->Absen->jenis_absen }} {{ $item->Absen->keterangan }}</td>
                                                            @else
                                                            <td>{{ $item ->Absen->jam_masuk }}</td>

                                                            @if ($item ->Absen->jam_keluar != NULL)
                                                            <td>{{ $item ->Absen->jam_keluar }}</td>
                                                            <td>{{ $item ->Absen->jenis_absen }} {{ $item ->Absen->keterangan }}</td>

                                                            @else
                                                            <td>
                                                                <form action="{{ route('absen-manual.update',  $item ->Absen->id_absensi) }}" method="POST">
                                                                    @method('PUT')

                                                                    @csrf
                                                                    <input name="tipe" type="hidden" value="keluar"></input>
                                                                    <input name="jam" type="hidden" value={{ $item->ShiftKerja->jam_masuk }}></input>

                                                                    <button type="submit" class="btn btn-sm btn-primary px-5 radius-30">Absen Keluar</button>
                                                                </form>
                                                            </td>
                                                            <td>{{ $item ->Absen->jenis_absen }} {{ $item ->Absen->keterangan }}</td>

                                                            @endif
                                                            @endif

                                                            @else
                                                            <td>
                                                                <form action="{{ route('absen-manual.store') }}" method="POST">
                                                                    @csrf
                                                                    <input name="tipe" type="hidden" value="masuk"></input>
                                                                    <input name="id_jadwal" type="hidden" value={{ $item->id_jadwal }}></input>

                                                                    <button type="submit" class="btn btn-sm btn-primary px-5 radius-30">Absen Masuk</button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <a href="javascript:;" class="btn btn-sm btn-warning px-5 radius-30" data-bs-toggle="modal" data-bs-target="#Modaledit-{{ $item->id_jadwal }}">Tidak Masuk</a> @endif

                                                            </td>
                                                            {{-- <td>{{ $item->kel_tempat_lahir }}</td>
                                                            <td>{{ $item->kel_tanggal_lahir }}</td>
                                                            <td>{{ $item->kel_alamat }}</td> --}}

                                                            {{-- <td class="text-center">
                                                                <a href="javascript:;" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#Modaledit-{{ $item->id_riwayat_keluarga }}"><i class="bi bi-pencil-fill"></i></a>
                                                            <a href="javascript:;" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Modalhapus-{{ $item->id_riwayat_keluarga }}"><i class="bi bi-trash-fill"></i></a>
                                                            </td> --}}
                                                        </tr>
                                                        @empty
                                                        Jadwal Hari Ini Kosong
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
                    {{-- @endif  --}}


                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</main>

@forelse ($jadwal_pegawai as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_jadwal }}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pegawai Tidak Masuk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('absen-manual.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah</label>
                    <hr>
                    </hr>
                    <label class="small mb-1 mr-1" for="kel_nama">Alasan Tidak Masuk</label><span class="mr-4 mb-3" style="color: red">*</span>
                    <select class="form-select" aria-label="Default select example" name="jenis_absen" type="text" id="tipe_pendidikan" required>
                        <option selected="">Alasan Tidak Masuk</option>
                        <option value="Izin">Izin</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Cuti">Cuti</option>
                        <option value="Alpha">Alpha</option>
                    </select>
                    <label class="small mb-1 mr-1" for="kel_nama">Keterangan</label><span class="mr-4 mb-3" style="color: red">*</span>
                    <input name="id_jadwal" type="hidden" value={{ $item->id_jadwal }}></input>

                    <input name="keterangan" class="form-control mb-3" type="text" placeholder="keterangan" aria-label="default input example">
                    <input name="tipe" class="form-control mb-3" type="hidden" value="tidak_masuk">



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse

@endsection
