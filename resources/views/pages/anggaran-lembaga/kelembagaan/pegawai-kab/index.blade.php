@extends('layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item pe-3">
        @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_dinas_dan_damkar)
            <a href="{{url('anggaran/kelembagaan')}}" class="pe-3">
                Kelembagaan
            </a>
        @else
            <a href="{{url('anggaran')}}" class="pe-3">
                Anggaran Kab/Kota
            </a>
        @endif
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
                    @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_dinas_dan_damkar || auth()->user()->level == AliasName::level_admin)
                        <a href="{{url('anggaran/kelembagaan/pegawai-kab/create/0')}}" class="btn btn-outline-primary m-b-xs">
                            <i class="fas fa-plus-circle"></i> Tambah Pegawai
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
                            <th width="70px">Aksi</th>
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>Status</th>
                            <th>Jenis Jabatan</th>
                            <th>Nama Jabatan</th>
                            <th>Tingkat Jabatan</th>
                            <th>Golongan</th>
                            <th>Unit Kerja</th>
                            <th>Angka Kredit</th>
                            <th>Status PPNS</th>
                            <th>Nomor SK</th>
                            <th>SK PPNS</th>
                            <th>Nomor KTP PPNS</th>
                            <th>Masa Berlaku KTP PPNS</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Kabupaten/Kota</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No. HP</th>
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
            "url": '{{url('anggaran/kelembagaan/pegawai-kab/datatable')}}',
        },
        columns: [
            { data: 'aksi', name: 'aksi' },
            { data: 'nip', name: 'nip', className: 'text-center'},
            { data: 'nama_lengkap', name: 'nama_lengkap'},
            { data: 'status_pegawai', name: 'status_pegawai'},
            { data: 'jenis_jabatan', name: 'jenis_jabatan'},
            { data: 'nama_jabatan', name: 'nama_jabatan'},
            { data: 'tingkat_jabatan', name: 'tingkat_jabatan'},
            { data: 'golongan', name: 'golongan'},
            { data: 'unit_kerja', name: 'unit_kerja'},
            { data: 'angka_kredit', name: 'angka_kredit'},
            { data: 'raw_is_ppns', name: 'is_ppns', className: 'text-center'},
            { data: 'nosk', name: 'nosk'},
            { data: 'sk_ppns', name: 'sk_ppns'},
            { data: 'no_ktp_ppns', name: 'no_ktp_ppns'},
            { data: 'masa_berlaku_ktp_ppns', name: 'masa_berlaku_ktp_ppns'},
            { data: 'tempat_lahir', name: 'tempat_lahir'},
            { data: 'tanggal_lahir', name: 'tanggal_lahir', className: 'text-center'},
            { data: 'jenis_kelamin', name: 'jenis_kelamin', className: 'text-center'},
            { data: 'kab_kota', name: 'kab.nama'},
            { data: 'alamat', name: 'alamat'},
            { data: 'email', name: 'email'},
            { data: 'nohp', name: 'nohp'},
        ]
    });

    function deleteData(id){
        if(confirm('Apakah anda yakin ingin menghapus data ini ?') == true){
            $('#form-delete'+id).submit();
        }
    }
</script>
@endsection
