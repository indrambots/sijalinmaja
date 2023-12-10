@extends('layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item pe-3">
        <a href="{{url(auth()->user()->level == AliasName::level_dinas ? 'anggaran/kelembagaan' : 'anggaran')}}" class="pe-3">
            {{auth()->user()->level == AliasName::level_dinas ? 'Kelembagaan' : 'Data Kab/Kota'}}
        </a>
    </li>
    <li class="breadcrumb-item px-3 text-muted">Data Sarpras</li>
</ol>
<div class="card">
    <div class="card-body">
        <div class="card-label"><h4>Data Sarpras</h4></div>
        <hr>
        <div class="row justify-content-between">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_admin)
                        <a href="{{url('anggaran/kelembagaan/sarpras/create/0')}}" class="btn btn-outline-primary m-b-xs">
                            <i class="fas fa-plus-circle"></i> Tambah Sarpras
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
                            <th width="100px">Nomor Sapras</th>
                            <th>Nama</th>
                            <th width="100px">Kondisi</th>
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
            "url": '{{url('anggaran/kelembagaan/sarpras/datatable')}}',
        },
        columns: [
            { data: 'aksi', name: 'aksi' },
            { data: 'nomor_sarpras', name: 'nomor_sarpras', className: 'text-center'},
            { data: 'nama', name: 'nama'},
            { data: 'kondisi', name: 'kondisi', className: 'text-center'}
        ]
    });

    function deleteData(id){
        if(confirm('Apakah anda yakin ingin menghapus data ini ?') == true){
            $('#form-delete'+id).submit();
        }
    }
</script>
@endsection
