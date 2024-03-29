@extends('layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item pe-3">
        @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_dinas_dan_damkar)
            <a href="{{url('anggaran/perlindungan')}}" class="pe-3">
                Perlindungan Masyarakat
            </a>
        @else
            <a href="{{url('anggaran')}}" class="pe-3">
                Data Kab/Kota
            </a>
        @endif
    </li>
    <li class="breadcrumb-item px-3 text-muted">Posko Satlinmas</li>
</ol>
<div class="card">
    <div class="card-body">
        <div class="card-label"><h4>Posko Satlinmas</h4></div>
        <hr>
        <div class="row justify-content-between">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_dinas_dan_damkar || auth()->user()->level == AliasName::level_admin)
                        <a href="{{url('anggaran/perlindungan/posko-satlinmas/create/0')}}" class="btn btn-outline-primary m-b-xs">
                            <i class="fas fa-plus-circle"></i> Tambah Posko
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
                            <th>Lokasi</th>
                            <th>Koordinat</th>
                            <th>Kota</th>
                            <th>Kecamatan</th>
                            <th>Kelurahan</th>
                            <th>Bentuk Bangunan</th>
                            <th>Luas Bangunan (M2)</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="modal-posko" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-left">FORM <span class="set-title"></span></h4>
            </div>
            <div class="modal-body" id="set-data" style="padding:0px;max-height:80vh;overflow-y:scroll"></div>
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
            "url": '{{url('anggaran/perlindungan/posko-satlinmas/datatable')}}',
        },
        columns: [
            { data: 'aksi', name: 'aksi', className: 'text-center'},
            { data: 'lokasi', name: 'lokasi'},
            { data: 'koordinat', name: 'koordinat',  className: 'text-center'},
            { data: 'nama_kota', name: 'kota.nama'},
            { data: 'nama_kecamatan', name: 'kec.nama'},
            { data: 'nama_kelurahan', name: 'kel.nama_desa'},
            { data: 'bentuk_bangunan', name: 'bentuk_bangunan'},
            { data: 'luas_bangunan', name: 'luas_bangunan'}
        ]
    });

    function getPosko(type, id){
        $('.set-title').html(type == 'sarpras' ? 'SARPRAS' : 'FASILITAS');
        $.ajax({
            url: "{{url('anggaran/perlindungan/posko-satlinmas/get-posko')}}",
            method: 'post',
            data: {
                type: type,
                dataid: id
            },
            success: function(res){
                $('#set-data').html(res);
                $('#modal-posko').modal('show');
            }
        });
    }

    function savePosko(){
        let getData = $("#form-posko").serializeArray();
        $.ajax({
            url: "{{url('anggaran/perlindungan/posko-satlinmas/posko-store')}}",
            method: 'post',
            data: getData,
            success: function(res){
                toastr.success("Data berhasil disimpan.")
            }
        });
    }

    function deleteData(id){
        if(confirm('Apakah anda yakin ingin menghapus data ini ?') == true){
            $('#form-delete'+id).submit();
        }
    }
</script>
@endsection
