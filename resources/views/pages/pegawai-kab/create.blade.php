@extends('layouts.app')
@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item pe-3">
        <a href="{{route('pegawai-kab.index')}}" class="pe-3">Data Pegawai Kab/Kota</a>
    </li>
    <li class="breadcrumb-item px-3 text-muted">Tambah</li>
</ol>
<form class="form" method="POST" action="{{route('pegawai-kab.store')}}">
    <input type="hidden" name="userid" value="{{auth()->user()->id}}">
    @csrf
    @method('post')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">FORM PENGISIAN PEGAWAI KABUPATEN/KOTA</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>NIP <span class="text-danger">*</span> :</label>
                        <input type="text" name="nip" placeholder="NIP" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="form-group">
                        <label>Nama Lengkap <span class="text-danger">*</span> :</label>
                        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Status Pegawai <span class="text-danger">*</span> :</label>
                        <select name="status_pegawai" required class="form-control select2">
                            <option value="">--Pilih Status Pegawai</option>
                            @foreach ($status as $s)
                                <option value="{{$s->nama}}">{{$s->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Jenis Jabatan <span class="text-danger">*</span> :</label>
                        <select name="jenis_jabatan" required class="form-control select2">
                            <option value="">--Pilih Jenis Jabatan</option>
                            @foreach ($jenis as $j)
                                <option value="{{$j->nama}}">{{$j->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Nama Jabatan :</label>
                        <input type="text" name="nama_jabatan" placeholder="Nama Jabatan" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Tingkat Jabatan <span class="text-danger">*</span> :</label>
                        <select name="tingkat_jabatan" required class="form-control select2">
                            <option value="">--Pilih Tingkat Jabatan</option>
                            @foreach ($tingkat as $t)
                                <option value="{{$t->nama}}">{{$t->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Golongan <span class="text-danger">*</span> :</label>
                        <select name="golongan" required class="form-control select2">
                            <option value="">--Pilih Golongan</option>
                            @foreach ($golongan as $g)
                                <option value="{{$g->nama}}">{{$g->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Unit Kerja / Bidang <span class="text-danger">*</span> :</label>
                        <input type="text" name="unit_kerja" placeholder="Unit Kerja / Bidang" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Angka Kredit :</label>
                        <input type="text" name="angka_kredit" placeholder="Angka Kredit" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <input type="checkbox" name="is_ppns" class="check_ppns"> Apakah PPNS ?
                    </div>
                </div>
                <div class="col-12 col-md-3 is_ppns">
                    <div class="form-group">
                        <label>Nomor SK <span class="text-danger">*</span> :</label>
                        <input type="text" name="nosk" placeholder="Nomor SK" class="form-control group_ppns">
                    </div>
                </div>
                <div class="col-12 col-md-3 is_ppns">
                    <div class="form-group">
                        <label>SK PPNS <span class="text-danger">*</span> :</label>
                        <input type="text" name="sk_ppns" placeholder="SK PPNS" class="form-control group_ppns">
                    </div>
                </div>
                <div class="col-12 col-md-3 is_ppns">
                    <div class="form-group">
                        <label>Nomor KTP PPNS <span class="text-danger">*</span> :</label>
                        <input type="text" name="no_ktp_ppns" placeholder="Nomor KTP PPNS" class="form-control group_ppns">
                    </div>
                </div>
                <div class="col-12 col-md-3 is_ppns">
                    <div class="form-group">
                        <label>Masa Berlaku KTP PPNS <span class="text-danger">*</span> :</label>
                        <input type="date" name="masa_berlaku_ktp_ppns" class="form-control group_ppns">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Tempat Lahir <span class="text-danger">*</span> :</label>
                        <input type="text" name="tempat_lahir" placeholder="Tempat Lahir" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Tanggal lahir <span class="text-danger">*</span> :</label>
                        <input type="date" name="tanggal_lahir" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Jenis Kelamin <span class="text-danger">*</span> :</label>
                        <select name="jenis_kelamin" required class="form-control select2">
                            <option value="">--Pilih Jenis Kelamin</option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Kabupaten/Kota <span class="text-danger">*</span> :</label>
                        <select name="kab_kota_id" required class="form-control select2">
                            <option value="">--Pilih Kabupaten/Kota</option>
                            @foreach ($kota as $k)
                                <option value="{{$k->id}}">{{$k->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span> :</label>
                        <input type="text" name="alamat" placeholder="Alamat" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span> :</label>
                        <input type="email" name="email" placeholder="Email" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>No. HP <span class="text-danger">*</span> :</label>
                        <input type="number" name="nohp" placeholder="No. HP" required class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-6">
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
    $('.is_ppns').hide();
    $('.check_ppns').change(function(){
        this.checked ? $('.group_ppns').prop('required',true) : $('.group_ppns').prop('required',false);
        this.checked ? $('.is_ppns').show() : $('.is_ppns').hide();
        if(!this.checked){
            $('.group_ppns').val('');
        }
    });
    $('.select2').select2();
</script>
@endsection
