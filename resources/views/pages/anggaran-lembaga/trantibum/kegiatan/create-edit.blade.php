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
    <li class="breadcrumb-item pe-3">
        <a href="{{url('anggaran/trantibum/kegiatan')}}" class="pe-3">Data Penyelenggara & Ketertiban Umum</a>
    </li>
    @if($data)
        <li class="breadcrumb-item px-3 text-muted">Edit ({{$data->nama}} - {{$data->nomor_sarpras}})</li>
    @else
        <li class="breadcrumb-item px-3 text-muted">Tambah</li>
    @endif
</ol>
<form class="form" method="POST" action="{{url('anggaran/trantibum/kegiatan/store')}}" enctype="multipart/form-data">
    @csrf
    @method('post')
    <input type="hidden" name="dataid" value="{{@$data->id}}">
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">FORM PENYELENGGARA & KEGIATAN UMUM</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Tanggal Kegiatan <span class="text-danger">*</span> :</label>
                        <input type="text" name="tanggal_kegiatan" value="{{@$data->tanggal_kegiatan}}" placeholder="Tanggal Kegiatan" required class="form-control datepicker">
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Waktu Kegiatan <span class="text-danger">*</span> :</label>
                        <select name="waktu_kegiatan" class="form-control select2" required>
                            <option value="">--Pilih Waktu--</option>
                            <option value="Pagi" {{@$data->waktu_kegiatan == 'Pagi' ? 'selected' : ''}}>Pagi</option>
                            <option value="Siang" {{@$data->waktu_kegiatan == 'Siang' ? 'selected' : ''}}>Siang</option>
                            <option value="Malam" {{@$data->waktu_kegiatan == 'Malam' ? 'selected' : ''}}>Malam</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Jenis Kegiatan <span class="text-danger">*</span> :</label>
                        <select name="jenis_kegiatan" class="form-control select2" required>
                            <option value="">--Pilih Kondisi--</option>
                            @foreach (Helpers::getJenisKegiatan() as $kegiatan)
                                <option value="{{$kegiatan->nama}}" {{@$data->jenis_kegiatan == $kegiatan->nama ? 'selected' : ''}}>
                                    {{$kegiatan->nama}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Keterangan <span class="text-danger">*</span> :</label>
                        <textarea name="keterangan" rows="3" placeholder="Keterangan" required class="form-control">{{@$data->keterangan}}</textarea>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label>
                            Photo :
                            @if(isset($data->photo))
                                <a href="{{asset('berkas/'.$data->photo.'')}}" target="_blank">
                                    <u>{{$data->photo}}</u>
                                </a>
                            @endif
                        </label>
                        <input type="file" name="photo" accept=".jpg,.jpeg,.png" class="form-control">
                        <small>Format berkas : jpg, jpeg, png</small>
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
