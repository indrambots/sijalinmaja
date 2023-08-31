@extends('layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    @if(auth()->user()->level == AliasName::level_satpolpp || auth()->user()->level == AliasName::level_admin)
    <li class="breadcrumb-item pe-3">
        <a href="{{url('anggaran')}}" class="pe-3">Anggaran Kab/Kota</a>
    </li>
    @endif
    <li class="breadcrumb-item px-3 text-muted">Data Anggota Satlinmas</li>
</ol>
<div class="card">
    <div class="card-body">
        <div class="card-label"><h4>Data Anggota Satlinmas</h4></div>
        <hr>
        <div class="row justify-content-between">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    <a href="javascript:;" class="btn btn-outline-primary m-b-xs">
                        <i class="fa-regular fa-file-excel"></i> Unduh Excel
                    </a>&nbsp;
                    @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_admin)
                        <a href="{{url('anggaran/anggota-satlinmas/create/0')}}" class="btn btn-outline-primary m-b-xs">
                            <i class="fas fa-plus-circle"></i> Tambah Anggota
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
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Kota</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Pendidikan Terakhir</th>
                            <th>No SK</th>
                            <th>Tanggal SK</th>
                            <th>Tempat Pengukuhan</th>
                            <th>Sertifikat BIMTEK</th>
                            <th>Tanggal BIMTEK</th>
                            <th>Jumlah JP</th>
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
            "url": '{{url('anggaran/anggota-satlinmas/datatable')}}',
        },
        columns: [
            { data: 'aksi', name: 'aksi' },
            { data: 'nik', name: 'nik', className: 'text-center'},
            { data: 'nama_lengkap', name: 'nama_lengkap'},
            { data: 'nama_kota', name: 'kot.nama'},
            { data: 'nama_kecamatan', name: 'kec.nama'},
            { data: 'nama_kelurahan', name: 'kel.nama_desa'},
            { data: 'pendidikan_terakhir', name: 'pendidikan_terakhir', className: 'text-center'},
            { data: 'no_sk_pengukuhan', name: 'no_sk_pengukuhan', className: 'text-center'},
            { data: 'tanggal_sk_pengukuhan', name: 'tanggal_sk_pengukuhan', className: 'text-center'},
            { data: 'tempat_pengukuhan', name: 'tempat_pengukuhan'},
            { data: 'sertifikat_bimtek', name: 'sertifikat_bimtek'},
            { data: 'tanggal_sertifikat_bimtek', name: 'tanggal_sertifikat_bimtek', className: 'text-center'},
            { data: 'jumlah_jp', name: 'jumlah_jp', className: 'text-center'}
        ]
    });

    function deleteData(id){
        if(confirm('Apakah anda yakin ingin menghapus data ini ?') == true){
            $('#form-delete'+id).submit();
        }
    }
</script>
@endsection
