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
    <li class="breadcrumb-item pe-3">
        <a href="{{url('anggaran/perlindungan/anggota-satlinmas')}}" class="pe-3">Data Anggota Satlinmas</a>
    </li>
    @if($data)
        <li class="breadcrumb-item px-3 text-muted">Edit ({{$data->nik}} - {{$data->nama_lengkap}})</li>
    @else
        <li class="breadcrumb-item px-3 text-muted">Tambah</li>
    @endif
</ol>
<form class="form" method="POST" action="{{url('anggaran/perlindungan/anggota-satlinmas/store')}}">
    @csrf
    @method('post')
    <input type="hidden" name="dataid" value="{{@$data->id}}">
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">FORM ANGGOTA SATLINMAS</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>NIK <span class="text-danger">*</span> :</label>
                        <input type="text" name="nik" value="{{@$data->nik}}" placeholder="NIK" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Nama Lengkap <span class="text-danger">*</span> :</label>
                        <input type="text" name="nama_lengkap" value="{{@$data->nama_lengkap}}" placeholder="Nama Lengkap" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Jenis Kelamin<span class="text-danger">*</span> :</label>
                        <select class="form-control" required name="jenis_kelamin">

                            @if(@$data->jenis_kelamin == "L")
                            <option value="L" selected>Laki- laki</option>
                            <option value="P">Perempuan</option>
                            @elseif(@$data->jenis_kelamin == "P")
                            <option value="L">Laki- laki</option>
                            <option value="P" selected>Perempuan</option>
                            @else
                            <option value="">--Pilih Jenis Kelamin--</option>
                            <option value="L">Laki- laki</option>
                            <option value="P">Perempuan</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Pendidikan Terakhir <span class="text-danger">*</span> :</label>
                        <select name="pendidikan_terakhir" id="pendidikan_terakhir" required class="form-control select2">
                            <option value="">--Pilih Pendidikan Terakhir</option>
                            @foreach ($pendidikan as $k)
                                <option value="{{$k->nama}}" {{$k->nama == @$data->pendidikan_terakhir ? 'selected' : ''}}>{{$k->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Kota <span class="text-danger">*</span> :</label>
                        <select name="kotaid" id="kotaid" onchange="getLocation('kotaid')" required class="form-control select2">
                            <option value="">--Pilih Kota</option>
                            @foreach ($kota as $k)
                                <option value="{{$k->id}}" {{$k->id == @$data->kotaid ? 'selected' : ''}}>{{$k->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Kecamatan <span class="text-danger">*</span> :</label>
                        <select name="kecamatanid" id="kecamatanid" onchange="getLocation('kecamatanid')" required class="form-control select2">
                            <option value="">--Pilih Kecamatan</option>
                            @if($kecamatan)
                                @foreach ($kecamatan as $kec)
                                    <option value="{{$kec->id}}" {{$kec->id == @$data->kecamatanid ? 'selected' : ''}}>{{$kec->nama}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Kelurahan <span class="text-danger">*</span> :</label>
                        <select name="kelurahanid" id="kelurahanid" required class="form-control select2">
                            <option value="">--Pilih Kelurahan</option>
                            @if($kelurahan)
                                @foreach ($kelurahan as $kel)
                                    <option value="{{$kel->id}}" {{$kel->id == @$data->kelurahanid ? 'selected' : ''}}>{{$kel->nama}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>No SK <span class="text-danger">*</span> :</label>
                        <input type="text" name="no_sk_pengukuhan" value="{{@$data->no_sk_pengukuhan}}" placeholder="No SK" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Tanggal SK <span class="text-danger">*</span> :</label>
                        <input type="text" name="tanggal_sk_pengukuhan" value="{{@$data->tanggal_sk_pengukuhan}}" placeholder="Tanggal SK" required class="form-control datepicker">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Tempat Pengukuhan <span class="text-danger">*</span> :</label>
                        <input type="text" name="tempat_pengukuhan" value="{{@$data->tempat_pengukuhan}}" placeholder="Tempat Pengukuhan" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>No Sertifikat BIMTEK <span class="text-muted">(jika ada)</span> :</label>
                        <input type="text" name="sertifikat_bimtek" value="{{@$data->sertifikat_bimtek}}" placeholder="Sertifikat BIMTEK" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Tanggal Sertifikat BIMTEK <span class="text-muted">(jika ada)</span> :</label>
                        <input type="text" name="tanggal_sertifikat_bimtek" value="{{@$data->tanggal_sertifikat_bimtek}}" placeholder="Tanggal Sertifikat BIMTEK" class="form-control datepicker">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Jumlah JP <span class="text-muted">(jika ada)</span> :</label>
                        <input type="number" name="jumlah_jp" value="{{@$data->jumlah_jp}}" placeholder="Jumlah JP" class="form-control">
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
    function getLocation(type){
        $.ajax({
            url: "{{url('anggaran/perlindungan/anggota-satlinmas/utility/getLocation')}}",
            method: 'post',
            data: {
                type: type,
                kotaid: $('#kotaid').val(),
                kecamatanid: $('#kecamatanid').val(),
                kelurahanid: $('#kelurahanid').val(),
            },
            success: function(res){
                if(type == 'kecamatanid'){
                    $("#kelurahanid option").each(function(){
                        if($(this).val()){
                            $(this).remove();
                        }
                    });
                }
                $.each(res, function(field, r){
                    if(type == 'kotaid'){
                        $("#"+field+" option").each(function(){
                            if($(this).val()){
                                $(this).remove();
                            }
                        });
                    }
                    if(r){
                        $.each(r, function(i, data){
                            $('#'+field).append('<option value="'+data.id+'">'+data.nama+'</option>');
                        });
                    }
                    $('#'+field).select2('destroy').select2();
                });
            }
        });
    }
</script>
@endsection
