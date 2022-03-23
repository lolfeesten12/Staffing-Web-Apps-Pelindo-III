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
