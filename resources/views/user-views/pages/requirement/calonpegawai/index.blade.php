@extends('user-views.layouts.app')


@section('name')
Calon Pegawai
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Requirement</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Calon Pegawai</li>
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
                                                style="width: 170px;">Nama Pelamar</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Job yang dituju</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 60px;">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Pendidikan Terakhir</th>
                                                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Jurusan</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">Tanggal Apply</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">File CV</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">File Pendukung</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Status Penilaian</th>
                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($calon as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->nama_lengkap }}</td>
                                            <td>{{ $item->Pengumuman->nama_pengumuman }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td class="text-center">{{ $item->pendidikan_terakhir }}</td>
                                            <td>{{ $item->jurusan }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            @if ($item->file_cv != null)
                                            <td class="text-center">
                                                <a href="{{ route('calon-pegawai-cv',$item->file_cv) }}"
                                                    class="btn btn-sm btn-info mr-2"><i
                                                        class="lni lni-download"></i></a>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <div class="fs-3 text-success">
                                                    <i class="bi bi-x-circle-fill"></i>
                                                </div>
                                            </td>
                                            @endif
                                            @if ($item->file_pendukung != null)
                                            <td class="text-center">
                                                <a href="{{ route('calon-pegawai-pendukung',$item->file_pendukung) }}"
                                                    class="btn btn-sm btn-info mr-2"><i
                                                        class="lni lni-download"></i></a>
                                            </td>
                                            @else
                                            <td class="text-center">
                                                <div class="fs-3 text-danger">
                                                    <i class="bi bi-x-circle-fill"></i>
                                                </div>
                                            </td>
                                            @endif
                                            <td class="text-center">
                                                @if ($item->status_nilai == 'Sudah dinilai')
                                                    <span class="badge bg-light-success text-success w-100">{{ $item->status_nilai }}</span>
                                                @else
                                                <span class="badge bg-light-danger text-danger w-100">{{ $item->status_nilai }}</span>
                                                @endif
                                            </td>
                                                
                                                
                                            <td class="text-center">
                                                <a href="{{ route('calon-pegawai.show',$item->id_calon_pegawai) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Detail Calon Pegawai"
                                                    class="btn btn-sm btn-secondary"><i class="lni lni-eye"></i></a>
                                                @if($item->status_nilai == 'Belum dinilai')
                                                <a href="" class="btn btn-sm btn-primary" type="button" 
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#Modalnilai-{{ $item->id_calon_pegawai }}">
                                                    <i class="lni lni-calculator"></i>
                                                </a>
                                                @else
                                                <span>
                                                    @endif
                                                </span>
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

@forelse ($calon as $item)
<div class="modal fade" id="Modalnilai-{{ $item->id_calon_pegawai }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Penilaian Calon Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('calon-pegawai-status', $item->id_calon_pegawai) }}" id="form1-{{ $item->id_calon_pegawai }}" method="POST"
                class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label mr-1" for="nama_pegawai">Nama Pelamar</label>
                            <input type="text" class="form-control" placeholder="Nama Lengkap Pegawai"
                                name="nama_pegawai" value="{{ $item->nama_lengkap }}" readonly>
                        </div>
                        <div class="mt-2">
                            <hr>
                        </div>
                        <div class="col-4">
                            <label class="form-label mr-1" for="nilai_psikotes">Nilai Psikotes</label><span
                                class="mr-4 mb-3" style="color: red">*</span>
                            <input type="number" class="form-control" placeholder="Input Nilai Psikotes" min="1"
                                max="100" id="nilai_psikotes-{{ $item->id_calon_pegawai }}" name="nilai_psikotes" value="{{ old('nilai_psikotes') }}"
                                required>
                        </div>
                        <div class="col-4">
                            <label class="form-label mr-1" for="nilai_keahlian">Nilai Keahlian</label><span
                                class="mr-4 mb-3" style="color: red">*</span>
                            <input type="number" class="form-control" placeholder="Input Nilai Keahlian" min="1"
                                max="100" id="nilai_keahlian-{{ $item->id_calon_pegawai }}" name="nilai_keahlian" value="{{ old('nilai_keahlian') }}"
                                required>
                        </div>
                        <div class="col-4">
                            <label class="form-label mr-1" for="nilai_wawancara">Nilai Wawancara</label><span
                                class="mr-4 mb-3" style="color: red">*</span>
                            <input type="number" class="form-control" placeholder="Input Nilai Wawancara" min="1"
                                max="100" id="nilai_wawancara-{{ $item->id_calon_pegawai }}" name="nilai_wawancara"
                                value="{{ old('nilai_wawancara') }}" required>
                        </div>
                        <div class="col-4">
                            <label class="form-label mr-1" for="nilai_total">Nilai Total</label>
                            <div class="input-group mb-3">
                                <button class="btn btn-outline-secondary" type="button" id="button_total"
                                    onclick="hitung(event, {{ $item->id_calon_pegawai }})">Hitung</button>
                                <input type="number" class="form-control" placeholder="Klik Hitung" id="nilai_total-{{ $item->id_calon_pegawai }}"
                                    name="nilai_total" value="{{ old('nilai_total') }}" readonly>
                            </div>
                        </div>
                        <div class="col-4">
                            <label class="form-label mr-1" for="rata_rata">Rata-Rata Nilai</label>
                            <input type="number" class="form-control" placeholder="Klik Hitung" id="rata_rata-{{ $item->id_calon_pegawai }}"
                                name="rata_rata" value="{{ old('rata_rata') }}" readonly>
                        </div>
                        <div class="col-4">
                            <label class="mb-1 mr-1" for="status_calon">Status Pelamar</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <select name="status_calon" id="status_calon" class="form-select"
                                value="{{ old('status_calon') }}" required>
                                <option value="{{ old('status_calon')}}">Pilih Status Calon</option>
                                <option value="Diterima">Lulus</option>
                                <option value="Ditolak">Gagal</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse


<script>
    function hitung(event, id_calon_pegawai) {
        event.preventDefault()
        var form1 = $(`#form1-${id_calon_pegawai}`)
        var nilai_psikotes = $(`#nilai_psikotes-${id_calon_pegawai}`).val()
        var nilai_keahlian = $(`#nilai_keahlian-${id_calon_pegawai}`).val()
        var nilai_wawancara = $(`#nilai_wawancara-${id_calon_pegawai}`).val()
      

        if (nilai_psikotes == null | nilai_psikotes == 0 | nilai_keahlian == null | nilai_keahlian == 0 |
            nilai_wawancara == null | nilai_wawancara == 0) {
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terdapat Field Nilai Kosong',
            })
        } else {
            var nilai_total = parseInt(nilai_psikotes) + parseInt(nilai_keahlian) + parseInt(nilai_wawancara)
                $(`#nilai_total-${id_calon_pegawai}`).val(nilai_total);

                var rata = nilai_total / 3;
                var fix = rata.toFixed(2)
                $(`#rata_rata-${id_calon_pegawai}`).val(fix);
           
          
        }
    }

</script>



@endsection
