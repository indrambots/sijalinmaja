@extends('layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
</ol>
<div class="row justify-content-center">
    @if(auth()->user()->level == AliasName::level_dinas || Auth()->user()->level == AliasName::level_dinas_dan_damkar)
        <div class="col-12 col-md-4">
            @if($profil)
                <div class="card mb-4">
                    <div class="card-body pt-9 pb-0">
                        <div class="d-flex flex-wrap flex-sm-nowrap">
                            <div class="flex-grow-1">
                                <div class="d-flex row-auto justify-content-center">
                                    <div class="d-flex flex-column">
                                        <div class="text-center mb-10">
                                            <img src="{{ asset('assets/logo/kota/'.Auth::user()->kotaku->logo) }}" width="100px" height="100px">
                                            
                                            <div class="text-muted mb-2">Nomenlaktur Lembaga</div>
                                            <h4 class="font-weight-bold my-2">{{$profil->nomenlaktur}}</h4>
                                            <div class="col mt-2">
                                                <div class="font-size-sm text-muted font-weight-bold">Nama Kepala Satuan</div>
                                                <div class="font-size-h4 font-weight-bolder">{{$profil->nama_kepala_satuan}}</div>
                                                <div class="font-size-sm font-weight-bolder" style="text-decoration:underline;">
                                                    {{$profil->golongan}}
                                                </div>
                                            </div>
                                            <div class="col mt-4">
                                                <div class="font-size-sm text-muted font-weight-bold">Alamat Kantor</div>
                                                <div class="font-size-h4 font-weight-bolder">{{$profil->alamat_kantor}}</div>
                                            </div>
                                            <div class="col mt-4">
                                                <div class="font-size-sm text-muted font-weight-bold">Kab / Kota</div>
                                                <div class="font-size-h4 font-weight-bolder">{{$profil->kabKOta->nama}}</div>
                                            </div>
                                            <div class="col mt-2 mb-4">
                                                <div class="font-size-sm text-muted font-weight-bold">Anggaran</div>
                                                <div class="font-size-h4 font-weight-bolder">
                                                    Rp. {{number_format($profil->anggaran,2,',','.')}}
                                                </div>
                                            </div>
                                            <button href="#" class="btn btn-sm btn-primary me-3" data-toggle="modal" data-target="#modal-profil">
                                                <i class="flaticon2-edit"></i> &nbsp; Update Profil Kelembagaan
                                            </button>
                                        </div>
                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-custom alert-dark" role="alert">
                    <div class="alert-icon">
                        <i class="flaticon-warning"></i>
                    </div>
                    <div class="alert-text">
                        Anda Belum Mengisi Kelengkapaan Profil Kelembagaan Silahkan
                        <button data-toggle="modal" data-target="#modal-profil" class="btn btn-lg btn-primary">
                            Klik Disini
                        </button>
                        untuk mengisi profil kelembagaan
                    </div>
                </div>
            @endif

            <div class="card card-custom mb-4">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-graph-1 text-primary"></i>
                        </span>
                        <h3 class="card-label">
                            <small style="color: black;">Nilai SPM </small>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        @if($profil)
                            <a href="javascript:void(0)" class="btn btn-sm btn-success font-weight-bold" data-toggle="modal" data-target="#modal-spm">
                                <i class="flaticon2-pen"></i> Perbaharui Nilai
                            </a>
                        @else
                            <div class="alert alert-custom alert-dark" role="alert">
                                <div class="alert-icon">
                                    <i class="flaticon-warning"></i>
                                </div>
                                <div class="alert-text">
                                    Anda Belum Mengisi Kelengkapaan Profil Kelembagaan
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex row-auto justify-content-center">
                        <div class="d-flex flex-column">
                            <div class="text-center">
                                <div class="text-muted mb-2">Nilai SPM</div>
                                <h4 class="font-weight-bold my-2">
                                    @if(!empty($profil->nilai_spm))
                                    {{$profil->nilai_spm}}
                                    @else
                                    Belum Mengisi
                                    @endif</h4>
                                @if(!empty($profil->spm))
                                    <a href="{{asset('berkas/'.$profil->spm.'')}}" target="_blank" class="btn btn-outline-primary btn-md">
                                        <i class="flaticon-doc"></i>Dokumen Pendukung
                                    </a>
                                @else
                                <div class="alert alert-secondary" role="alert">Anda belum memperbaharui NILAI SPM</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="col-12 col-md-8 mb-2">
        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <div class="card card-custom wave wave-animate-fast wave-primary">
                    <div class="card-body text-center">
                        <a href="{{ url('anggaran/kelembagaan') }}">
                            <span class="svg-icon-6x">
                                <i class="icon-6x text-info mb-10 mt-10 fa-solid fa-house-laptop"></i>
                            </span>
                        </a>
                        <br>
                        <a href="{{ url('anggaran/kelembagaan') }}" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                            KELEMBAGAAN
                        </a>
                    </div>
                </div>
            </div>

            @if(Auth()->user()->level == AliasName::level_dinas_dan_damkar)
            <div class="col-12 col-md-6 mb-3">
                <div class="card card-custom wave wave-animate-fast wave-primary">
                    <div class="card-body text-center">
                        <a href="{{ url('damkar') }}">
                            <span class="svg-icon-6x">
                                <i class="icon-6x text-info mb-10 mt-10 fa-solid flaticon-security"></i>
                            </span>
                        </a>
                        <br>
                        <a href="{{ url('damkar') }}" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                            SiDandiKeren
                        </a>
                    </div>
                </div>
            </div>
            @endif
            
            <div class="col-12 col-md-6 mb-3">
                <div class="card card-custom wave wave-animate-fast wave-primary">
                    <div class="card-body text-center">
                        <a href="{{ url('anggaran/perlindungan') }}">
                            <span class="svg-icon-6x">
                                <i class="icon-6x text-info mb-10 mt-10 fa-solid fa-hand-holding-heart"></i>
                            </span>
                        </a>
                        <br>
                        <a href="{{ url('anggaran/perlindungan') }}" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                            PELINDUNGAN MASYARAKAT
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <div class="card card-custom wave wave-animate-fast wave-primary">
                    <div class="card-body text-center">
                        <a href="{{ url('anggaran/trantibum') }}">
                            <span class="svg-icon-6x">
                                <i class="icon-6x text-info mb-10 mt-10 fa-solid fa-calendar-week"></i>
                            </span>
                        </a>
                        <br>
                        <a href="{{ url('anggaran/trantibum') }}" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                            PENYELENGGARAAN KETENTRAMAN DAN KETERTIBAN UMUM
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <div class="card card-custom wave wave-animate-fast wave-primary">
                    <div class="card-body text-center">
                        <a href="{{ url('anggaran/penegakan') }}">
                            <span class="svg-icon-6x">
                                <i class="icon-6x text-info mb-10 mt-10 fa-solid fa-building-flag"></i>
                            </span>
                        </a>
                        <br>
                        <a href="{{ url('anggaran/penegakan') }}" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                            PENEGAKAN PERDA PERKADA
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12">
                <br>
                <div class="card card-custom gutter-b">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#anggaran-bidang">
                                        <span class="nav-text">Data Anggaran</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="anggaran-bidang" role="tabpanel">
                                <div class="row justify-content-between">
                                    <div class="col-12">
                                        @if($profil)
                                            <div class="d-flex justify-content-end">
                                                <button type="button" onclick="anggaranManage()" class="btn btn-outline-primary m-b-xs">
                                                    <i class="fas fa-plus-circle"></i> Buat Anggaran
                                                </button>
                                            </div>
                                        @else
                                            <div class="alert alert-custom alert-dark" role="alert">
                                                <div class="alert-icon">
                                                    <i class="flaticon-warning"></i>
                                                </div>
                                                <div class="alert-text">
                                                    Anda Belum Mengisi Kelengkapaan Profil Kelembagaan Silahkan
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th>Unit Kerja</th>
                                                <th>Anggaran</th>
                                                <th>Tahun</th>
                                                <th width="80px">Aksi</th>
                                            </tr>
                                        </thead>
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

<div id="modal-profil" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-left">{{isset($profil->id) ? 'UPDATE PROFIL' : 'LENGKAPI PROFIL'}}</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="{{url('anggaran/kelembagaan/profil-lembaga/store')}}">
                    @csrf
                    <input type="hidden" name="profileid" value="{{isset($profil->id) ? $profil->id : ''}}">
                    <input type="hidden" name="userid" value="{{auth()->user()->id}}">
                    <div class="form-group">
                        <label>Nomenlaktur Lembaga <span class="text-danger">*</span> :</label>
                        <input type="text" name="nomenlaktur" value="{{@$profil->nomenlaktur}}" placeholder="Nomenlaktur Lembaga" required class="form-control">
                        <span class="form-text text-danger">Isi Sesuai Nomenlaktur.</span>
                    </div>
                    <div class="form-group">
                        <label>Nama Kepala Satuan <span class="text-danger">*</span> :</label>
                        <input type="text" name="nama_kepala_satuan" value="{{@$profil->nama_kepala_satuan}}" placeholder="Nama Kepala Satuan" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Golongan <span class="text-danger">*</span> :</label>
                        <select class="form-control" name="golongan" required>
                            <option value="">--Pilih Golongan--</option>
                            @foreach($golongan as $gol)
                                <option value="{{$gol->nama}}" {{$gol->nama == @$profil->golongan ? 'selected' : ''}}>{{$gol->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat Kantor <span class="text-danger">*</span> :</label>
                        <textarea name="alamat_kantor" required placeholder="isikan alamat kantor" rows="2" class="form-control">{{@$profil->alamat_kantor}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Kabupaten / Kota <span class="text-danger">*</span> :</label>
                        <select class="form-control" name="kab_kota_id" required>
                            <option value="">--Pilih Kabupaten / Kota--</option>
                            @foreach($kota as $kot)
                                <option value="{{$kot->id}}" {{$kot->id == @$profil->kab_kota_id ? 'selected' : ''}}>{{$kot->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Anggaran <span class="text-danger">*</span> :</label>
                        <input type="text" name="anggaran" value="{{@$profil->anggaran}}" placeholder="isikan anggaran lembaga" required class="form-control rupiah">
                    </div>
                    <button type='submit' class="btn btn-primary mr-2">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-manage-anggaran" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="closeModal()">&times;</button>
                <h4 class="modal-title text-left text-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="{{ url('anggaran/kelembagaan/bidang/store') }}" id="form-anggaran">
                    {{csrf_field()}}
                    <input type="hidden" name="lembagaid" value="{{@$profil->id}}">
                    <input type="hidden" name="anggaranid" id="anggaranid">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Unit Kerja / Bidang <span class="text-danger">*</span> :</label>
                                <input type="text" name="unit_kerja" id="unit_kerja" placeholder="Unit Kerja / Bidang" required class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Anggaran <span class="text-danger">*</span> :</label>
                                <input type="text" name="anggaran" id="anggaran" placeholder="Anggaran" required class="form-control rupiah">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Tahun <span class="text-danger">*</span> :</label>
                                <input type="number" name="tahun_anggaran" id="tahun_anggaran" placeholder="Tahun" required class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type='submit' class="btn btn-primary mr-2">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-spm" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-left">FORM PERBAHARUI NILAI SPM</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="{{url('anggaran/kelembagaan/profil/spm-save')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="profileid" value="{{@$profil->id}}">
                    <div class="form-group">
                        <label>Nilai SPM :</label>
                        <input class="form-control" type="number" name="nilai_spm" value="{{@$profil->nilai_spm}}" step="any" id="nilai_spm" required placeholder="isikan nilai spm">
                    </div>
                    <div class="form-group">
                        <label>Bukti Nilai SPM :</label>
                        <input class="form-control" type="file" name="spm" id="spm" accept="application/pdf,application/vnd.ms-excel" required>
                        <span>Mohon upload bukti nilai SPM yang telah ditandatangani Pejabat terkait</span>
                    </div>
                    <button type='submit' class="btn btn-primary mr-2">SIMPAN</button>
                </form>
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
            "url": '{{url('anggaran/datatable')}}',
        },
        columns: [
            { data: 'unit_kerja', name: 'unit_kerja'},
            { data: 'raw_anggaran', name: 'anggaran', className: 'text-right'},
            { data: 'tahun_anggaran', name: 'tahun_anggaran', className: 'text-center'},
            { data: 'aksi', name: 'aksi' },
        ]
    });

    function anggaranManage(id = null, unit_kerja = null, anggaran = null, tahun_anggaran = null){
        $('.text-title').html(id ? 'Edit Anggaran' : 'Buat Anggaran');
        $('#anggaranid').val(id);
        $('#unit_kerja').val(unit_kerja);
        $('#anggaran').val(anggaran);
        $('#tahun_anggaran').val(tahun_anggaran);
        $('#modal-manage-anggaran').modal('show');
    }

    function deleteData(id){
        if(confirm('Apakah anda yakin ingin menghapus data ini ?') == true){
            $('#form-delete'+id).submit();
        }
    }

    function closeModal(){
        $('#form-anggaran')[0].reset();
    }
</script>
@endsection
