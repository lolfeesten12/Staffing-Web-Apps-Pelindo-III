@extends('user-views.layouts.app')


@section('name')
Laporan Absensi Pegawai
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Absensi</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan Absensi</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="mb-3">
                    <form id="form1">
                        <div class="row">
                            <div class="col-4">
                                <label class="small mb-1 mr-1">Start Date</label>
                                <input class="form-control" type="date" name="from_date" id="from_date" />
                            </div>
                            <div class="col-4">
                                <label class="small mb-1 mr-1">End Date</label><span class="mr-4 mb-3"
                                    style="color: red">*</span>
                                <input class="form-control" type="date" name="to_date" id="to_date" />
                            </div>
                            <div class="col-4">
                                <label class="small mb-1 mr-1"> </label><br>
                                <button type="button" name="filter" onclick="filter_tanggal(event)"
                                    class="btn btn-primary">Filter Absen</button> </br>
                            </div>
                        </div>
                    </form>
                </div>
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
                                                style="width: 120px;">Tanggal</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Shift</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 130px;">Pegawai</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 130px;">Jabatan</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 130px;">Unit Kerja</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 130px;">Absensi</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Jam Masuk</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Jam Keluar</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($absensi as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->Jadwal->tanggal_masuk }}</td>
                                            <td>{{ $item->Jadwal->ShiftKerja->jenis_shift }}</td>
                                            <td>{{ $item->Jadwal->Pegawai->nama_pegawai }}</td>
                                            <td>{{ $item->Jadwal->Pegawai->Jabatan->nama_jabatan }}</td>
                                            <td>{{ $item->Jadwal->Pegawai->UnitKerja->unit_kerja }}</td>
                                            <td>{{ $item->jenis_absen }}</td>
                                            <td>
                                                @if ($item->jenis_absen == 'Cuti' || $item->jenis_absen == 'Izin' ||
                                                $item->jenis_absen == 'Sakit')
                                                -
                                                @else
                                                {{ $item->jam_masuk }}
                                                @endif

                                            </td>
                                            <td> 
                                                @if ($item->jenis_absen == 'Cuti' || $item->jenis_absen == 'Izin' ||
                                                $item->jenis_absen == 'Sakit')
                                                -
                                                @else
                                                {{ $item->jam_keluar }}
                                                @endif
                                            </td>
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
</main>

<script>
    function filter_tanggal(event) {
        event.preventDefault()
        var form1 = $('#form1')
        var tanggal_mulai = form1.find('input[name="from_date"]').val()
        var tanggal_selesai = form1.find('input[name="to_date"]').val()
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'info',
            title: 'Mohon Tunggu, Data Sedang diproses ...'
        })

        window.location.href = '/Laporan/laporan-absensi?from=' + tanggal_mulai + '&to=' + tanggal_selesai

    }

</script>

@endsection
