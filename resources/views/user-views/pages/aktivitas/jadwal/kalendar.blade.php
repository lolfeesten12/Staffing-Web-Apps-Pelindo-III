@extends('user-views.layouts.app')


@section('name')
Atur Jadwal {{ $pegawai->nama_pegawai }}
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
                        <li class="breadcrumb-item active" aria-current="page">Atur Jadwal Pegawai
                            {{ $pegawai->nama_pegawai }}</li>
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
                                <h5 class="mb-0">Detail Pegawai</h5>
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
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" id="ButtonTambah"
                                data-bs-target="#Modaltambah" style="display: none">Tambah Data</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card">
                            <div class="card-header py-3 bg-transparent">
                                <h5 class="mb-0">Atur Jadwal</h5>
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

<div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Atur Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form1" class="d-inline">
                @csrf
                <div class="modal-body">
                    <span id="id_pegawai" style="display: none">{{ $pegawai->id_pegawai }}</span>
                    <input type="text" class="form-control" name="id_pegawai"
                                        value="{{ $pegawai->id_pegawai }}" style="display: none" readonly>
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="dataTablePegawai" class="table table-striped table-bordered dataTable"
                                        style="width: 100%;" role="grid" aria-describedby="example_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 20px;">No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 180px;">Shift Kerja</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 90px;">Jam Masuk</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 90px;">Jam Selesai</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 80px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id='konfirmasi'>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
                $('#ButtonTambah').click()
                var form1 = $('#form1')
                var id_pegawai = form1.find('input[name="id_pegawai"]').val()
                
                var _token = form1.find('input[name="_token"]').val()
                var table = $('#dataTablePegawai').DataTable().destroy()
                var table = $('#dataTablePegawai').DataTable({
                    "pageLength": 5,
                    "lengthMenu": [
                        [5, 10, 20, -1],
                        [5, 10, 20, ]
                    ],
                    "ajax": {
                        'type': 'POST',
                        'url': '/Jadwal/jadwal-pegawai/' + id_pegawai + '/tanggal',
                        'data': {
                            date: date.dateStr,
                            _token: _token
                        },
                       
                        'dataSrc': ""
                    },
                   
                    "columns":[
                        {"data": null, render:function(data, type, row, meta){
                            return meta.row + meta.settings._iDisplayStart+1;
                        }},
                        {"data": "jenis_shift"},
                        {"data": "jam_masuk"},
                        {"data": "jam_selesai"},
                        {"data": "tanggal_masuk",render:function(data, type, row, meta){
                            console.log(row, data)
                            if (data == null){
                                return `<button class="btn btn-secondary btn-xs" onclick="masuk(event,${row.id_shift_kerja},'${date.dateStr}', '${id_pegawai}')">Masuk</button>`
                            }else{
                                return `<button class="btn btn-danger btn-xs" onclick="libur(event,${row.id_shift_kerja},'${date.dateStr}', '${id_pegawai}')"><i class="fas fa-trash"></i></button>`
                            } 
                        }},
                        
                    ]
                })
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
            url: '/Jadwal/jadwal-pegawai/' + id_pegawai + '/tanggal',
            success: function (response) {
                var event = []
                response.forEach(element => {

                    event.push({
                        title: 'Dijadwalkan', // a property!
                        start: element.tanggal_masuk, // a property!
                        end: element.tanggal_masuk
                    })
                });
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    events: event,
                    initialView: 'dayGridMonth',

                    dateClick: function (date) {
                        $('#ButtonTambah').click()
                        var form1 = $('#form1')
                        var id_pegawai = form1.find('input[name="id_pegawai"]').val()
                        var _token = form1.find('input[name="_token"]').val()
                        var table = $('#dataTablePegawai').DataTable().destroy()
                        var table = $('#dataTablePegawai').DataTable({
                            "pageLength": 5,
                            "lengthMenu": [
                                [5, 10, 20, -1],
                                [5, 10, 20, ]
                            ],
                            "ajax": {
                                'type': 'POST',
                                'url': '/Jadwal/jadwal-pegawai/' + id_pegawai + '/tanggal',
                                'data': {
                                    date: date.dateStr,
                                    id_pegawai: id_pegawai,
                                    _token: _token
                                },
                                'dataSrc': ""
                            },
                            "columns":[
                                {"data": null, render:function(data, type, row, meta){
                                    return meta.row + meta.settings._iDisplayStart+1;
                                }},
                                {"data": "jenis_shift"},
                                {"data": "jam_masuk"},
                                {"data": "jam_selesai"},
                                {"data": "tanggal_masuk",render:function(data, type, row, meta){
                                    console.log(row, data)
                                    if (data == null){
                                        return `<button class="btn btn-secondary btn-xs" onclick="masuk(event,${row.id_shift_kerja},'${date.dateStr}', '${id_pegawai}')">Masuk</button>`
                                    }else{
                                        return `<button class="btn btn-danger btn-xs" onclick="libur(event, ${row.id_shift_kerja},'${date.dateStr}', '${id_pegawai}')"><i class="fas fa-trash"></i></button>`
                                    } 
                                }},
                                
                            ]
                        })
                    }
                });
                calendar.render();

            }
        })
    }


    function masuk(event, id_shift_kerja, date, id_pegawai){
        console.log(id_shift_kerja)
        event.preventDefault()
        var form1 = $('#form1')
        var _token = form1.find('input[name="_token"]').val()
        $.ajax({
                method: 'POST',
                url: '/Jadwal/jadwal-pegawai/'+ id_pegawai +'/masuk',
                data: {
                    _token: _token,
                    id_pegawai: id_pegawai,
                    id_shift_kerja: id_shift_kerja,
                    date: date,
                },
                success: function (response) {
                    
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
                        icon: 'success',
                        title: 'Berhasil Menambahkan Data Jadwal Pegawai'
                    })

                    var form1 = $('#form1')
                    var id_pegawai = form1.find('input[name="id_pegawai"]').val()
                    var _token = form1.find('input[name="_token"]').val()
                    var table = $('#dataTablePegawai').DataTable().destroy()
                    var table = $('#dataTablePegawai').DataTable({
                        "pageLength": 5,
                        "lengthMenu": [
                            [5, 10, 20, -1],
                            [5, 10, 20, ]
                        ],
                        "ajax":{
                            'type': 'POST',
                            'url': '/Jadwal/jadwal-pegawai/' + id_pegawai + '/tanggal',
                            'data':{
                                    date: date,
                                    _token: _token,
                                    id_pegawai: id_pegawai
                                    },
                            'dataSrc': ""
                        },
                        "columns":[
                            {"data": null, render:function(data, type, row, meta){
                                return meta.row + meta.settings._iDisplayStart+1;
                            }},
                            {"data": "jenis_shift"},
                            {"data": "jam_masuk"},
                            {"data": "jam_selesai"},
                            {"data": "tanggal_masuk",render:function(data, type, row, meta){
                                console.log(row, data)
                                if (data == null){
                                    return `<button class="btn btn-secondary btn-xs" onclick="masuk(event,${row.id_shift_kerja},'${date.dateStr}', '${id_pegawai}')">Masuk</button>`
                                }else{
                                    return `<button class="btn btn-danger btn-xs" onclick="libur(event, ${row.id_shift_kerja},'${date.dateStr}', '${id_pegawai}')"><i class="fas fa-trash"></i></button>`
                                } 
                            }},
                        ]
                    })

                    makecalendar()
                   
                },
                error: function (response) {
                    console.log(response)
                }
            });
    }

</script>

@endsection
