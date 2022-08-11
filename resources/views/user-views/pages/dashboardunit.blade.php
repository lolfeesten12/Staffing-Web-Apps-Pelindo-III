@extends('user-views.layouts.app')


@section('name')
Dashboard Unit
@endsection

@section('content')

<main class="page-content">
    <div class="col py-2">
        <div class="card radius-15">
            <div class="card-body">
                <div class="float-end text-muted">{{ $haritext }}</div>
                <h4 class="card-title text-primary">{{ Auth::user()->Pegawai->nama_pegawai }}</h4>
                <p class="card-text">Halaman dashboard unit menampilkan poin-poin penting mengenai pegawai unit pada aplikasi.
                </p>
            </div>
        </div>
    </div>

    @if (count($jadwal) > 0)
    <div class="col-12">
        <div class="card radius-10 bg-danger">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="">
                        <p class="mb-1 text-white">Penukaran Jadwal</p>
                        <h5 class="mb-0 text-white">{{ $tukarjadwal }} Data Penukaran</h5>
                    </div>
                  
                    <div class="ms-auto bg-white-1 text-white">
                        <a type="button" href="{{ route('jadwal-saya.show', Auth::user()->pegawai->id_pegawai) }}" class="btn btn-danger btn-sm">Cek Disini Sekarang!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    @if (Auth::user()->Pegawai->role == 'Kepala Unit')
    <div class="row">
        <div class="col-4">
            <div class="card radius-10 bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white">Divisi / Unit Kerja</p>
                            <h5 class="mb-0 text-white">{{ Auth::user()->Pegawai->UnitKerja->unit_kerja }} </h5>
                        </div>
                        <div class="ms-auto widget-icon bg-white-1 text-white">
                            <i class="lni lni-consulting"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card radius-10 bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white">Sub Unit Kerja</p>
                            <h5 class="mb-0 text-white">{{ Auth::user()->Pegawai->SubUnit->nama_sub_unit }} </h5>
                        </div>
                        <div class="ms-auto widget-icon bg-white-1 text-white">
                            <i class="lni lni-consulting"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card radius-10 bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white">Total Pegawai Unit</p>
                            <h5 class="mb-0 text-white">{{ $jumlah_pegawai }} Orang</h5>
                        </div>
                        <div class="ms-auto widget-icon bg-white-1 text-white">
                            <i class="lni lni-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-6">
            <div class="card radius-10 bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white">Divisi / Unit Kerja</p>
                            <h5 class="mb-0 text-white">{{ Auth::user()->Pegawai->UnitKerja->unit_kerja }} </h5>
                        </div>
                        <div class="ms-auto widget-icon bg-white-1 text-white">
                            <i class="lni lni-consulting"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card radius-10 bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <p class="mb-1 text-white">Total Pegawai Unit</p>
                            <h5 class="mb-0 text-white">{{ $jumlah_pegawai }} Orang</h5>
                        </div>
                        <div class="ms-auto widget-icon bg-white-1 text-white">
                            <i class="lni lni-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
   

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-striped table-bordered dataTable"
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
                                                style="width: 80px;">Pangkat</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Jenis Kelamin</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">No.Telp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pegawai_unit as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->nama_pegawai }}</td>
                                            <td>{{ $item->Jabatan->nama_jabatan }}</td>
                                            <td>{{ $item->Pangkat->nama_pangkat }}, {{ $item->Pangkat->golongan }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->no_telp }}</td>
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
