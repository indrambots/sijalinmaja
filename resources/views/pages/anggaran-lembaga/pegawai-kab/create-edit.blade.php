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
        <a href="{{url('anggaran/pegawai-kab')}}" class="pe-3">Data Pegawai</a>
    </li>
    @if($data)
        <li class="breadcrumb-item px-3 text-muted">Edit ({{$data->nip}} - {{$data->nama_lengkap}})</li>
    @else
        <li class="breadcrumb-item px-3 text-muted">Tambah</li>
    @endif
</ol>
<form class="form" method="POST" action="{{url('anggaran/pegawai-kab/store')}}">
    @csrf
    @method('post')
    <input type="hidden" name="dataid" value="{{@$data->id}}">
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">FORM PEGAWAI KABUPATEN/KOTA</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>NIP <span class="text-danger">*</span> :</label>
                        <input type="text" name="nip" value="{{@$data->nip}}" placeholder="NIP" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="form-group">
                        <label>Nama Lengkap <span class="text-danger">*</span> :</label>
                        <input type="text" name="nama_lengkap" value="{{@$data->nama_lengkap}}" placeholder="Nama Lengkap" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Status Pegawai <span class="text-danger">*</span> :</label>
                        <select name="status_pegawai" id="status_pegawai" required class="form-control select2">
                            <option value="">--Pilih Status Pegawai</option>
                            @foreach ($status as $s)
                                <option value="{{$s->nama}}" {{$s->nama == @$data->status_pegawai ? 'selected' : ''}}>{{$s->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Jenis Jabatan <span class="text-danger">*</span> :</label>
                        <select name="jenis_jabatan" id="jenis_jabatan" required class="form-control select2">
                            <option value="">--Pilih Jenis Jabatan</option>
                            @foreach ($jenis as $j)
                                <option value="{{$j->nama}}" {{$j->nama != 'Jabatan Pelaksana' ? 'disabled' : ''}} {{$j->nama == @$data->jenis_jabatan ? 'selected' : ''}}>{{$j->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Golongan :</label>
                        <select name="golongan" class="form-control select2">
                            <option value="">--Pilih Golongan</option>
                            @foreach ($golongan as $g)
                                <option value="{{$g->nama}}" {{$g->nama == @$data->golongan ? 'selected' : ''}}>{{$g->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Nama Jabatan :</label>
                        <input type="text" name="nama_jabatan" value="{{@$data->nama_jabatan}}" placeholder="Nama Jabatan" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6 tingkat_jabatan" {!! @$data->jenis_jabatan ? '' : 'style="display:none;"' !!}>
                    <div class="form-group">
                        <label>Tingkat Jabatan <span class="text-danger">*</span> :</label>
                        <select name="tingkat_jabatan" id="tingkat_jabatan" required class="form-control select2">
                            <option value="">--Pilih Tingkat Jabatan</option>
                            @foreach ($tingkat as $t)
                                <option value="{{$t->nama}}" {{$t->nama == @$data->tingkat_jabatan ? 'selected' : ''}}>{{$t->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Unit Kerja / Bidang <span class="text-danger">*</span> :</label>
                        <input type="text" name="unit_kerja" value="{{@$data->unit_kerja}}" placeholder="Unit Kerja / Bidang" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Angka Kredit :</label>
                        <input type="text" name="angka_kredit" value="{{@$data->angka_kredit}}" placeholder="Angka Kredit" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="checkbox" name="is_ppns" {!! @$data->is_ppns ? 'checked' : '' !!} class="check_ppns"> Apakah PPNS ?
                    </div>
                </div>
                <div class="col-12 col-md-3 is_ppns">
                    <div class="form-group">
                        <label>Nomor SK <span class="text-danger">*</span>:</label>
                        <input type="text" name="nosk" value="{{@$data->nosk}}" placeholder="Nomor SK" class="form-control group_ppns">
                    </div>
                </div>
                <div class="col-12 col-md-3 is_ppns">
                    <div class="form-group">
                        <label>SK PPNS <span class="text-danger">*</span> :</label>
                        <input type="text" name="sk_ppns" value="{{@$data->sk_ppns}}" placeholder="SK PNS" class="form-control group_ppns">
                    </div>
                </div>
                <div class="col-12 col-md-3 is_ppns">
                    <div class="form-group">
                        <label>Nomor KTP PPNS <span class="text-danger">*</span> :</label>
                        <input type="text" name="no_ktp_ppns" value="{{@$data->no_ktp_ppns}}" placeholder="Nomor KTP PPNS" class="form-control group_ppns">
                    </div>
                </div>
                <div class="col-12 col-md-3 is_ppns">
                    <div class="form-group">
                        <label>Masa Berlaku KTP PPNS <span class="text-danger">*</span> :</label>
                        <input type="date" name="masa_berlaku_ktp_ppns" value="{{@$data->masa_berlaku_ktp_ppns}}" class="form-control group_ppns">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Tempat Lahir <span class="text-danger">*</span> :</label>
                        <input type="text" name="tempat_lahir" value="{{@$data->tempat_lahir}}" placeholder="Tempat Lahir" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Tanggal lahir <span class="text-danger">*</span> :</label>
                        <input type="date" name="tanggal_lahir" value="{{@$data->tanggal_lahir}}" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Jenis Kelamin <span class="text-danger">*</span> :</label>
                        <select name="jenis_kelamin" required class="form-control select2">
                            <option value="">--Pilih Jenis Kelamin</option>
                            <option value="L" {{@$data->jenis_kelamin == 'L' ? 'selected' : ''}}>Laki - Laki</option>
                            <option value="P" {{@$data->jenis_kelamin == 'P' ? 'selected' : ''}}>Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Kabupaten/Kota <span class="text-danger">*</span> :</label>
                        <select name="kab_kota_id" required class="form-control select2">
                            <option value="">--Pilih Kabupaten/Kota</option>
                            @foreach ($kota as $k)
                                <option value="{{$k->id}}" {{$k->id == @$data->kab_kota_id ? 'selected' : ''}}>{{$k->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span> :</label>
                        <input type="text" name="alamat" value="{{@$data->alamat}}" placeholder="Alamat" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span> :</label>
                        <input type="email" name="email" value="{{@$data->email}}" placeholder="Email" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>No. HP <span class="text-danger">*</span> :</label>
                        <input type="number" name="nohp" value="{{@$data->nohp}}" placeholder="No. HP" required class="form-control">
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
    @if(!@$data->is_ppns)
        $('.is_ppns').hide();
    @endif

    $(document).ready(function(){
        $('#status_pegawai').change();
    });

    $('#jenis_jabatan').change(function(){
        let status = $(this).val() == 'Jabatan Fungsional' ? true : false;
        $(this).val() == 'Jabatan Fungsional' ? $('.tingkat_jabatan').show() : $('.tingkat_jabatan').hide();
        $('#tingkat_jabatan').prop('required', status);
        $('#tingkat_jabatan').val('');
        $('#tingkat_jabatan').select2('destroy').select2();
    });

    $('#status_pegawai').change(function(){
        let status = $(this).val() ? false : true;
        $("#jenis_jabatan option").each(function(index, item) {
            if($(item).val()){
                if($(item).val() != 'Jabatan Pelaksana'){
                    $(item).attr('disabled', status);
                }
            }
        });
    });

    $('.check_ppns').change(function(){
        let status = this.checked ? true : false;
        $('.group_ppns').prop('required', status);
        this.checked ? $('.is_ppns').show() : $('.is_ppns').hide();
        if(!this.checked){
            $('.group_ppns').val('');
        }
    });

    $('.select2').select2();
</script>
@endsection
