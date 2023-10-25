@extends('layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item pe-3">
        @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_tim_kasus)
            <a href="{{url('anggaran/penegakan')}}" class="pe-3">
                Penegakan
            </a>
        @else
            <a href="{{url('anggaran')}}" class="pe-3">
                Anggaran Kab/Kota
            </a>
        @endif
    </li>
    <li class="breadcrumb-item px-3 text-muted">Data Kasandra</li>
</ol>
<div class="card">
    <div class="card-body">
        <div class="card-label"><h4>Data Kasandra</h4></div>
        <hr>
        <div class="row justify-content-between">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    <a href="javascript:;" class="btn btn-outline-primary m-b-xs">
                        <i class="fa-regular fa-file-excel"></i> Unduh Excel
                    </a>&nbsp;
                    @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_tim_kasus || auth()->user()->level == AliasName::level_admin)
                        <a href="{{url('anggaran/penegakan/kasandra/create/0')}}" class="btn btn-outline-primary m-b-xs">
                            <i class="fas fa-plus-circle"></i> Tambah
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <hr>
        <div class="row mt-2">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-hover table-sm nowrap" style="width:100% !important">
                    <thead>
                        <tr>
                            <th width="100px">Aksi</th>
                            <th>Status</th>
                            <th>Urusan</th>
                            <th>Jenis Tertib</th>
                            {{-- <th>Jenis Pelanggaran</th> --}}
                            <th>Perda</th>
                            <th>Pasal Kewajiban</th>
                            <th>Kewajiban</th>
                            <th>Pasal Sanksi Administrasi</th>
                            <th>Sanksi Administrasi</th>
                            <th>Pasal Sanksi Pidana</th>
                            <th>Sanski Pidana</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    var datatable = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        paging: true,
        ajax: {
            "url": '{{url('anggaran/penegakan/kasandra/datatable')}}',
        },
        columns: [
            { data: 'aksi', name: 'aksi' },
            { data: 'status', name: 'status', className: 'text-center'},
            { data: 'urusan_pemerintahan', name: 'urusan_pemerintahan'},
            { data: 'jenis_tertib', name: 'jenis_tertib'},
            // { data: 'jenis_pelanggaran', name: 'jenis_pelanggaran'},
            { data: 'perda', name: 'perda'},
            { data: 'pasal_kewajiban', name: 'pasal_kewajiban'},
            { data: 'kewajiban', name: 'kewajiban'},
            { data: 'pasal_sanksi_adm', name: 'pasal_sanksi_adm'},
            { data: 'sanksi_adm', name: 'sanksi_adm'},
            { data: 'pasal_sanksi_pidana', name: 'pasal_sanksi_pidana'},
            { data: 'sanksi_pidana', name: 'sanksi_pidana'}
        ]
    });

    function deleteData(id){
        if(confirm('Apakah anda yakin ingin menghapus data ini ?') == true){
            $('#form-delete'+id).submit();
        }
    }
</script>
@endsection
