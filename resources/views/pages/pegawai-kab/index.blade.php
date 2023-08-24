@extends('layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item px-3 text-muted">Data Pegawai Kabupaten atau Kota</li>
</ol>
<div class="card">
    <div class="card-body">
        <div class="card-label"><h4>Data Pegawai Kabupaten atau Kota</h4></div>
        <hr>
        <div class="row justify-content-between">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    <a href="{{route('pegawai-kab.create')}}" class="btn btn-outline-primary m-b-xs">
                        <i class="fas fa-plus-circle"></i> Tambah Pegawai
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <div class="row mt-2">
            <div class="table-responsive">
                <table id="datatable" class="table table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Jabatan</th>
                            <th>Nama Jabatan</th>
                            <th>Status</th>
                            <th>Golongan</th>
                            <th>Unit Kerja</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
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
            "url": '{{url('pegawai-kab/datatable')}}',
        },
        columns: [
            { data: 'nip', name: 'nip'},
            { data: 'nama_lengkap', name: 'nama_lengkap'},
            { data: 'jenis_jabatan', name: 'jenis_jabatan'},
            { data: 'nama_jabatan', name: 'nama_jabatan'},
            { data: 'status_pegawai', name: 'status_pegawai'},
            { data: 'golongan', name: 'golongan'},
            { data: 'unit_kerja', name: 'unit_kerja'},
            { data: 'jenis_kelamin', name: 'jenis_kelamin'},
            { data: 'alamat', name: 'alamat'},
            { data: 'aksi', name: 'aksi' },
        ]
    });
</script>
@endsection
