@extends('user-views.layouts.app')


@section('name')
Jadwal {{ $pegawai->nama_pegawai }}
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Penjadwalan</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Jadwal Pegawai
                            {{ $pegawai->nama_pegawai }}</li>
                        <form id="form1">
                            <span id="id_pegawai" style="display: none">{{ $pegawai->id_pegawai }}</span>
                            <input type="text" class="form-control" name="id_pegawai" value="{{ $pegawai->id_pegawai }}"
                                style="display: none" readonly>
                        </form>
                    </ol>
                </nav>
            </div>

        </div>
        <hr>
    </div>

    <div class="container-fluid">
        @if(session('tukargagal'))
        <div
            class="alert border-0 border-danger border-start border-4 bg-light-danger alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-danger"><i class="lni lni-close"></i>
                </div>
                <div class="ms-3">
                    <div class="text-danger"> {{ session('tukargagal') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session('berhasil'))
        <div
            class="alert border-0 border-success border-start border-4 bg-light-success alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="fs-3 text-success"><i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="ms-3">
                    <div class="text-success"> {{ session('berhasil') }}</div>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-header py-3 bg-transparent">
                                <h5 class="mb-0">Jadwal Pegawai</h5>
                            </div>
                            <div class="card-body">
                                <div class="col-12 mb-2">
                                    <label class="form-label mr-1">Nama Lengkap
                                        Pegawai</label>
                                    <input type="text" class="form-control" name="nama_pegawai"
                                        value="{{ $pegawai->nama_pegawai }}" readonly>
                                </div>
                                <div class="col-12 mb-2">
                                    <label class="form-label mr-1">Unit Kerja</label>
                                    <input type="text" class="form-control" name="nama_pegawai"
                                        value="{{ $pegawai->UnitKerja->unit_kerja }}" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label mr-1">Jabatan</label>
                                    <input type="text" class="form-control" name="nama_pegawai"
                                        value="{{ $pegawai->Jabatan->nama_jabatan }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body text-center">
                                <button type="button" class="btn btn-sm btn-primary w-100" data-bs-toggle="modal"
                                    data-bs-target="#modaltukar"><i class="lni lni-calendar"></i> Tukar Jadwal Kerja</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card">
                            <div class="card-header py-3 bg-transparent">
                                <h5 class="mb-0">Jadwal Saya</h5>
                            </div>
                            <div class="card-body">
                                <div class="mr-3 ml-3" id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="modaltukar" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pilih Tanggal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('jadwal-saya.create') }}" method="GET">
                @csrf
                <div class="modal-body">
                <div class="form-group">
                        <label class="small mb-1 mr-1" for="tanggal">Pilih Tanggal yang ingin ditukar</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="tanggal" type="date" id="tanggal"
                            placeholder="Input Tanggal" value="{{ old('tanggal') }}" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var month = new Date().getMonth() + 1;
        var year = new Date().getFullYear();

        makecalendar()

        var calendar = new FullCalendar.Calendar(calendarEl, {

            initialView: 'dayGridMonth',
            dateClick: function (date) {

            }
        });

        calendar.render();
    });

    function makecalendar() {
        var calendarEl = document.getElementById('calendar');
        var form1 = $('#form1')
        var id_pegawai = form1.find('input[name="id_pegawai"]').val()
        console.log(id_pegawai)

        $.ajax({
            method: 'get',
            url: '/Jadwal/jadwal-saya/' + id_pegawai + '/tanggal',
            success: function (response) {
                var event = []
                response.forEach(element => {
                    console.log(element)
                    event.push({
                        // a property!
                        title: 'Shift ' + element.jenis_shift + ' ( ' + element.jam_masuk + ' - ' + element.jam_selesai + ' )', // a property!
                        start: element.tanggal_masuk, // a property!
                        end: element.tanggal_masuk,
                    })
                });
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    events: event,
                    initialView: 'dayGridMonth',

                    dateClick: function (date) {

                    }
                });
                calendar.render();

            },
            error: function (response) {
                console.log(response)
            }
        })
    }

</script>

@endsection
