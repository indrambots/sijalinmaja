@extends('layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item pe-3">
        @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_dinas_dan_damkar)
            <a href="{{url('anggaran/trantibum')}}" class="pe-3">
                Penyelenggaraan Ketentraman dan Ketertiban Umum
            </a>
        @else
            <a href="{{url('anggaran')}}" class="pe-3">
                Anggaran Kab/Kota
            </a>
        @endif
    </li>
    <li class="breadcrumb-item px-3 text-muted">Data Penyelenggara & Ketertiban Umum</li>
</ol>
<div class="card">
    <div class="card-body">
        <div class="card-label"><h4>Data Penyelenggara & Ketertiban Umum</h4></div>
        <hr>
        <div class="row justify-content-between">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_dinas_dan_damkar || auth()->user()->level == AliasName::level_admin)
                        <a href="{{url('anggaran/trantibum/kegiatan/create/0')}}" class="btn btn-outline-primary m-b-xs">
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
                            <th width="100px">Tanggal Kegiatan</th>
                            <th>Waktu Kegiatan</th>
                            <th>Jenis Kegiatan</th>
                            <th>Keterangan</th>
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
            "url": '{{url('anggaran/trantibum/kegiatan/datatable')}}',
        },
        columns: [
            { data: 'aksi', name: 'aksi' },
            { data: 'tanggal_kegiatan', name: 'tanggal_kegiatan', className: 'text-center'},
            { data: 'waktu_kegiatan', name: 'waktu_kegiatan', className: 'text-center'},
            { data: 'jenis_kegiatan', name: 'jenis_kegiatan', className: 'text-center'},
            { data: 'keterangan', name: 'keterangan'}
        ]
    });

    function deleteData(id){
        if(confirm('Apakah anda yakin ingin menghapus data ini ?') == true){
            $('#form-delete'+id).submit();
        }
    }
</script>
@endsection
