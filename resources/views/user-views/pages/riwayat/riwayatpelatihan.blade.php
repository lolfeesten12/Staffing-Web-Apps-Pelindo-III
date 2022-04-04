@extends('user-views.layouts.app')


@section('name')
Riwayat Pelatihan
@endsection

@section('content')


<main class="page-content">
    <div class="container-fluid">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Riwayat Pelatihan</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="lni lni-database"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Pelatihan</li>
                    </ol>
                </nav>
            </div>
          
        </div>
        <hr>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-primary" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                    </div>
                                    <div class="tab-title">Pelatihan Wajib</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bx bx-user-pin font-18 me-1"></i>
                                    </div>
                                    <div class="tab-title">Tidak Wajib</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                  
                    <div class="tab-content py-3">
                          {{-- TABEL WAJIB --}}
                        <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">
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
                                                            style="width: 120px;">Nama Pelatihan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 70px;">Jenis</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 70px;">Penyelenggara</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 70px;">Periode Awal</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 70px;">Periode Akhir</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 70px;">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($riwayat as $item)
                                                    <tr role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
            
                                                        <td>{{ $item->nama_pelatihan }}</td>
                                                        <td>{{ $item->jenis_pelatihan }}</td>
                                                        <td>{{ $item->penyelenggara }}</td>
                                                        <td>{{ $item->periode_awal }}</td>
                                                        <td>{{ $item->periode_akhir }}</td>
                                                        <td class="text-center">{{ $item->status }}</td>
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
                        {{-- TABEL TIDAK WAJIB --}}
                        <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                            <div class="table-responsive">
                                <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="dataTableSupplier" class="table table-striped table-bordered dataTable"
                                                style="width: 100%;" role="grid" aria-describedby="example_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1" aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 100px;">No.</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 120px;">Nama Pelatihan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 70px;">Jenis</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 70px;">Penyelenggara</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 70px;">Periode Awal</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 70px;">Periode Akhir</th>
                                                            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 70px;">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($detail as $items)
                                                    <tr role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
            
                                                        <td>{{ $items->nama_pelatihan }}</td>
                                                        <td>{{ $items->jenis_pelatihan }}</td>
                                                        <td>{{ $items->penyelenggara }}</td>
                                                        <td>{{ $items->periode_awal }}</td>
                                                        <td>{{ $items->periode_akhir }}</td>
                                                        <td class="text-center">{{ $items->status }}</td>
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



               
            </div>
        </div>
    </div>
</main>

<script>
     $(document).ready(function () {
        var table = $('#dataTableSupplier').DataTable()
    });
</script>

@endsection

