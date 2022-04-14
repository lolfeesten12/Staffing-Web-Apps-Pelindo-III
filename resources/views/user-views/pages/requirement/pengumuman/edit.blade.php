@extends('user-views.layouts.app')


@section('name')
Create Pengumuman
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
                        <li class="breadcrumb-item active" aria-current="page">Tambah Pengumuman</li>
                    </ol>
                </nav>
            </div>

        </div>
        <hr>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header py-3 bg-transparent">
                        <h5 class="mb-0">Lengkapi Form Berikut</h5>
                    </div>
                    <div class="card-body">
                        <div class="border p-3 rounded">
                            <form action="{{ route('pengumuman.update', $pengumuman->id_pengumuman) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label mr-1" for="nama_pengumuman">Nama Pengumuman</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Input Nama Pengumuman Requirement"
                                            name="nama_pengumuman" value="{{ $pengumuman->nama_pengumuman }}" required> 
                                    </div>
                                    <div class="col-6">
                                        <label class="small mb-1 mr-1" for="id_jabatan">Jabatan</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-select" name="id_jabatan" id="id_jabatan"
                                            value="{{ $pengumuman->Jabatan->id_jabatan }}" required>
                                            <option value="{{ $pengumuman->Jabatan->id_jabatan }}">{{ $pengumuman->Jabatan->nama_jabatan }}</option>
                                            @foreach ($jabatan as $item)
                                            <option value="{{ $item->id_jabatan }}">{{ $item->nama_jabatan }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label class="small mb-1 mr-1" for="job_type">Job Type</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <select name="job_type" id="job_type" class="form-select"
                                            value="{{ $pengumuman->job_type }}" required>
                                            <option value="{{ $pengumuman->job_type }}">{{ $pengumuman->job_type }}</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Seasonal">Seasonal</option>
                                            <option value="Contract">Contract</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="qualification">Qualification</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <select name="qualification" id="qualification" class="form-select"
                                            value="{{ $pengumuman->qualification }}" required>
                                            <option value="{{ $pengumuman->qualification }}">{{ $pengumuman->qualification }}</option>
                                            <option value="Bachelor's degree">Bachelor's degree</option>
                                            <option value="Diploma">Diploma</option>
                                            <option value="Advanced Diplomas">Advanced Diplomas</option>
                                            <option value="Higher Certificates">Higher Certificates</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label mr-1" for="tanggal_mulai">Tanggal Mulai</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="date" class="form-control" placeholder="Input Tanggal Mulai Pengumuman"
                                            name="tanggal_mulai" value="{{ $pengumuman->tanggal_mulai }}" required>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label mr-1" for="tanggal_selesai">Tanggal Selesai</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="date" class="form-control" placeholder="Input Tanggal Selesai Pengumuman"
                                            name="tanggal_selesai" value="{{ $pengumuman->tanggal_selesai }}" required> 
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label mr-1" for="penempatan">Penempatan</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="text" class="form-control" placeholder="Input Tempat Penempatan"
                                            name="penempatan" value="{{ $pengumuman->penempatan }}" required>
                                    </div>
                                    <div class="col-4">
                                        <label class="small mb-1 mr-1" for="job_years_experience">Years of Experience</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <select name="job_years_experience" id="job_years_experience" class="form-select"
                                            value="{{ $pengumuman->job_years_experience }}">
                                            <option value="{{ $pengumuman->job_years_experience }}">{{ $pengumuman->job_years_experience }}</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value=">5">>5</option>
                                            <option value="Fresh Graduate">Fresh Graduate</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label mr-1" for="kisaran_gaji">Kisaran Gaji</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <input type="number" class="form-control" placeholder="Input Kisaran Gaji" id="harga_kelas"
                                            name="kisaran_gaji" value="{{ $pengumuman->kisaran_gaji }}" required>
                                        <div class="small">
                                            <span class="font-weight-500 text-primary">Nominal (IDR) : </span>
                                            <span id="detailharga">{{ number_format($pengumuman->kisaran_gaji) }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="small mb-1 mr-1" for="job_description">Job Description</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <textarea class="form-control" id="job_description" type="text" rows="5" cols="5"
                                            name="job_description" placeholder="Input Job Description" value="{{ $pengumuman->job_description }}" required>{{ $pengumuman->job_description }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <label class="small mb-1 mr-1" for="job_requirement">Job Requirement</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <textarea class="form-control" id="job_requirement" type="text" rows="5" cols="5"
                                            name="job_requirement" placeholder="Input Job Requirement" value="{{ $pengumuman->job_requirement }}" required>{{ $pengumuman->job_requirement }}</textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Data yang Anda inputkan sudah sesuai
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary px-4" type="submit">Edit Data</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>


<script>
    $(document).ready(function () {
        $('#validasierror').click();

        $('#harga_kelas').on('input', function () {
            var nominal = $(this).val()
            var nominal_fix = new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(nominal)

            $('#detailharga').html(nominal_fix);
        })

    });
</script>


@endsection
