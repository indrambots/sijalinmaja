@extends('layouts.app')
@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item pe-3">
        @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_dinas_dan_damkar)
            <a href="{{url('anggaran/penegakan')}}" class="pe-3">
                Penegakan
            </a>
        @else
            <a href="{{url('anggaran')}}" class="pe-3">
                Data Kab/Kota
            </a>
        @endif
    </li>
    <li class="breadcrumb-item pe-3">
        <a href="{{url('anggaran/penegakan/perda')}}" class="pe-3">Data Penegakan Perda</a>
    </li>
    @if($data)
        <li class="breadcrumb-item px-3 text-muted">Edit ({{@$data->perda}})</li>
    @else
        <li class="breadcrumb-item px-3 text-muted">Tambah</li>
    @endif
</ol>
<form class="form" method="POST" action="{{url('anggaran/penegakan/perda/store')}}" enctype="multipart/form-data">
    @csrf
    @method('post')
    <input type="hidden" name="dataid" value="{{@$data->id}}">
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">FORM PERDA</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Tanggal Kegiatan <span class="text-danger">*</span> :</label>
                        <input type="text" name="tanggal_kegiatan" value="{{@$data->tanggal_kegiatan}}" placeholder="Tanggal Kegiatan" required class="form-control datepicker">
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="form-group">
                        <label>Perda Yang Dilanggar <span class="text-danger">*</span> :</label>
                        <select name="perda" id="perda" required class="form-control select2">
                            <option value="">--Pilih Perda--</option>
                            @foreach (Helpers::getKasandra() as $kasandra)
                                <option value="{{$kasandra->id}}" {{$kasandra->perda == @$data->perda ? 'selected' : ''}}>{{$kasandra->perda}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Jenis Pelanggaran <span class="text-danger">*</span> :</label>
                        <select name="jenis_pelanggaran" id="jenis_pelanggaran" required class="form-control select2">
                            <option value="">--Pilih Jenis Pelanggaran--</option>
                            @foreach (Helpers::getMasterJenisPelanggaran() as $jenis)
                                <option value="{{$jenis->jenis_pelanggaran}}" {{$jenis->jenis_pelanggaran == @$data->jenis_pelanggaran ? 'selected' : ''}}>{{$jenis->jenis_pelanggaran}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Tindak Lanjut <span class="text-danger">*</span> :</label>
                        <select name="tindak_lanjut" id="tindak_lanjut" required class="form-control select2">
                            <option value="">--Pilih Tindak Lanjut--</option>
                            @foreach (Helpers::listTindakLanjut() as $tindak)
                                <option value="{{$tindak}}" {{$tindak == @$data->tindak_lanjut ? 'selected' : ''}}>{{$tindak}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Sanksi <span class="text-danger">*</span> :</label>
                        <select name="sanksi" id="sanksi" required class="form-control select2">
                            <option value="">--Pilih Sanksi--</option>
                            @foreach (Helpers::listSaksi() as $sanksi)
                                <option value="{{$sanksi}}" {{$sanksi == @$data->sanksi ? 'selected' : ''}}>{{$sanksi}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Status Proses <span class="text-danger">*</span> :</label>
                        <select name="status_proses" id="status_proses" required class="form-control select2">
                            <option value="">--Pilih Status Proses--</option>
                            @foreach (Helpers::listStatusProcess() as $status)
                                <option value="{{$status}}" {{$status == @$data->status_proses ? 'selected' : ''}}>{{$status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Tanggal Sidang Tipiring <span class="text-danger">*</span> :</label>
                        <input type="text" name="tanggal_sidang_tipiring" value="{{@$data->tanggal_sidang_tipiring}}" placeholder="Tanggal Sidang Tipiring" required class="form-control datepicker">
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="form-group">
                        <label>Keterangan :</label>
                        <input type="text" name="keterangan" value="{{@$data->keterangan}}" placeholder="Keterangan" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Batal</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
<script>
    $('.select2').select2();
</script>
@endsection
