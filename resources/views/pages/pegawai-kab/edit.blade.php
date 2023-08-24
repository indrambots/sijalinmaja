@extends('layouts.app')
@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item pe-3">
        <a href="{{route('pegawai-kab.index')}}" class="pe-3">Data Pegawai Kab/Kota</a>
    </li>
    <li class="breadcrumb-item px-3 text-muted">Edit ({{$data->nip}} - {{$data->nama_lengkap}})</li>
</ol>
<form class="form" method="POST" action="{{route('pegawai-kab.update', $data->id)}}">
    @csrf
    @method('put')
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">FORM EDIT PEGAWAI KABUPATEN/KOTA</h3>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs nav-bold nav-tabs-line">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#data-pegawai">
                        <span class="nav-text">Data Pegawai</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#data-pribadi">
                        <span class="nav-text">Data Pribadi</span>
                    </a>
                </li>
            </ul>
            <br>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="data-pegawai" role="tabpanel">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>NIP <span class="text-danger">*</span> :</label>
                                <input type="text" name="nip" value="{{$data->nip}}" placeholder="NIP" required class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-group">
                                <label>Nama Lengkap <span class="text-danger">*</span> :</label>
                                <input type="text" name="nama_lengkap" value="{{$data->nama_lengkap}}" placeholder="Nama Lengkap" required class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Jenis Jabatan <span class="text-danger">*</span> :</label>
                                <select name="jenis_jabatan" required class="form-control select2">
                                    <option value="">--Pilih Jenis Jabatan</option>
                                    @foreach ($jenis as $j)
                                        <option value="{{$j->nama}}" {{$j->nama == $data->jenis_jabatan ? 'selected' : ''}}>{{$j->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Nama Jabatan :</label>
                                <input type="text" name="nama_jabatan" value="{{$data->nama_jabatan}}" placeholder="Nama Jabatan" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Tingkat Jabatan <span class="text-danger">*</span> :</label>
                                <select name="tingkat_jabatan" required class="form-control select2">
                                    <option value="">--Pilih Tingkat Jabatan</option>
                                    @foreach ($tingkat as $t)
                                        <option value="{{$t->nama}}" {{$t->nama == $data->tingkat_jabatan ? 'selected' : ''}}>{{$t->nama}}</option>
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
                                        <option value="{{$g->nama}}" {{$g->nama == $data->golongan ? 'selected' : ''}}>{{$g->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Status Pegawai <span class="text-danger">*</span> :</label>
                                <select name="status_pegawai" required class="form-control select2">
                                    <option value="">--Pilih Status Pegawai</option>
                                    @foreach ($status as $s)
                                        <option value="{{$s->nama}}" {{$s->nama == $data->status_pegawai ? 'selected' : ''}}>{{$s->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Unit Kerja / Bidang <span class="text-danger">*</span> :</label>
                                <input type="text" name="unit_kerja" value="{{$data->unit_kerja}}" placeholder="Unit Kerja / Bidang" required class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Angka Kredit <span class="text-danger">*</span> :</label>
                                <input type="text" name="angka_kredit" value="{{$data->angka_kredit}}" placeholder="Angka Kredit" required class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Nomor SK :</label>
                                <input type="text" name="nosk" value="{{$data->nosk}}" placeholder="Nomor SK" class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>SK PPNS <span class="text-danger">*</span> :</label>
                                <input type="text" name="sk_ppns" value="{{$data->sk_ppns}}" placeholder="Nomor SK" required class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-group">
                                <label>Nomor KTP PPNS <span class="text-danger">*</span> :</label>
                                <input type="text" name="no_ktp_ppns" value="{{$data->no_ktp_ppns}}" placeholder="Nomor KTP PPNS" required class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Masa Berlaku KTP PPNS <span class="text-danger">*</span> :</label>
                                <input type="date" name="masa_berlaku_ktp_ppns" value="{{$data->masa_berlaku_ktp_ppns}}" required class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="data-pribadi" role="tabpanel">
                    <div class="row">
                        <div class="col-12 col-md-9">
                            <div class="form-group">
                                <label>Tempat Lahir <span class="text-danger">*</span> :</label>
                                <input type="text" name="tempat_lahir" value="{{$data->tempat_lahir}}" placeholder="Tempat Lahir" required class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Tanggal lahir <span class="text-danger">*</span> :</label>
                                <input type="date" name="tanggal_lahir" value="{{$data->tanggal_lahir}}" required class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label>Jenis Kelamin <span class="text-danger">*</span> :</label>
                                <select name="jenis_kelamin" required class="form-control select2">
                                    <option value="">--Pilih Jenis Kelamin</option>
                                    <option value="L" {{$data->jenis_kelamin == 'L' ? 'selected' : ''}}>Laki - Laki</option>
                                    <option value="P" {{$data->jenis_kelamin == 'P' ? 'selected' : ''}}>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="form-group">
                                <label>Alamat <span class="text-danger">*</span> :</label>
                                <input type="text" name="alamat" value="{{$data->alamat}}" placeholder="Alamat" required class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span> :</label>
                                <input type="email" name="email" value="{{$data->email}}" placeholder="Email" required class="form-control">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label>No. HP <span class="text-danger">*</span> :</label>
                                <input type="number" name="nohp" value="{{$data->nohp}}" placeholder="No. HP" required class="form-control">
                            </div>
                        </div>
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
