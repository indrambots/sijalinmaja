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
    <li class="breadcrumb-item pe-3">
        <a href="{{url('anggaran/sarpras')}}" class="pe-3">Data Sarpras</a>
    </li>
    @if($data)
        <li class="breadcrumb-item px-3 text-muted">Edit ({{$data->nama}} - {{$data->nomor_sarpras}})</li>
    @else
        <li class="breadcrumb-item px-3 text-muted">Tambah</li>
    @endif
</ol>
<form class="form" method="POST" action="{{url('anggaran/sarpras/store')}}" enctype="multipart/form-data">
    @csrf
    @method('post')
    <input type="hidden" name="dataid" value="{{@$data->id}}">
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">FORM SARPRAS</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Nomor Sarpras <span class="text-danger">*</span> :</label>
                        <input type="text" name="nomor_sarpras" value="{{@$data->nomor_sarpras}}" placeholder="Nomor Sarpras" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Nama <span class="text-danger">*</span> :</label>
                        <input type="text" name="nama" value="{{@$data->nama}}" placeholder="Nama" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Kondisi :</label>
                        <select name="kondisi" class="form-control select2">
                            <option value="">--Pilih Kondisi--</option>
                            <option value="Layak" {{@$data->kondisi == 'Layak' ? 'selected' : ''}}>Layak</option>
                            <option value="Tidak Layak" {{@$data->kondisi == 'Tidak Layak' ? 'selected' : ''}}>Tidak Layak</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label>
                            Berkas <span class="text-danger">*</span> :
                            @if(isset($data->berkas))
                                <a href="{{asset('berkas/'.$data->berkas.'')}}" target="_blank">
                                    <i>{{$data->berkas}}</i>
                                </a>
                            @endif
                        </label>
                        <input type="file" name="berkas" accept="application/pdf,application/vnd.ms-excel" required class="form-control">
                        <small>Format berkas : pdf, xls, xlsx</small>
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
