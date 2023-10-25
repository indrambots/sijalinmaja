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
    <li class="breadcrumb-item px-3 text-muted">Data Penegakan Perda</li>
</ol>
<div class="card">
    <div class="card-body">
        <div class="card-label"><h4>Data Penegakan Perda</h4></div>
        <hr>
        <div class="row justify-content-between">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    <a href="javascript:;" class="btn btn-outline-primary m-b-xs">
                        <i class="fa-regular fa-file-excel"></i> Unduh Excel
                    </a>&nbsp;
                    @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_tim_kasus || auth()->user()->level == AliasName::level_admin)
                        <a href="{{url('anggaran/penegakan/perda/create/0')}}" class="btn btn-outline-primary m-b-xs">
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
                            <th>Tanggal Kegiatan</th>
                            <th>Perda</th>
                            <th>Jenis Pelanggaran</th>
                            <th>Urusan</th>
                            <th>Jenis Tertib</th>
                            <th>Tindak Lanjut</th>
                            <th>Sansi</th>
                            <th>Status Proses</th>
                            <th>Tanggal Sidang</th>
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
            "url": '{{url('anggaran/penegakan/perda/datatable')}}',
        },
        columns: [
            { data: 'aksi', name: 'aksi' },
            { data: 'tanggal_kegiatan', name: 'tanggal_kegiatan', className: 'text-center'},
            { data: 'perda', name: 'perda'},
            { data: 'jenis_pelanggaran', name: 'jenis_pelanggaran'},
            { data: 'urusan', name: 'urusan'},
            { data: 'jenis_tertib', name: 'jenis_tertib'},
            { data: 'tindak_lanjut', name: 'tindak_lanjut'},
            { data: 'sanksi', name: 'sanksi'},
            { data: 'status_proses', name: 'status_proses'},
            { data: 'tanggal_sidang_tipiring', name: 'tanggal_sidang_tipiring', className: 'text-center'},
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
