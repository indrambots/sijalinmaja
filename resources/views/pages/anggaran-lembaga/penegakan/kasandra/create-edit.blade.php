@extends('layouts.app')
@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item pe-3">
        <a href="{{url(auth()->user()->level == AliasName::level_dinas ? 'anggaran/penegakan' : 'anggaran')}}" class="pe-3">
            {{auth()->user()->level == AliasName::level_dinas ? 'Penegakan' : 'Anggaran Kab/Kota'}}
        </a>
    </li>
    <li class="breadcrumb-item pe-3">
        <a href="{{url('anggaran/penegakan/kasandra')}}" class="pe-3">Data Kasandra</a>
    </li>
    @if($data)
        <li class="breadcrumb-item px-3 text-muted">Edit ({{@$data->urusan_pemerintahan}})</li>
    @else
        <li class="breadcrumb-item px-3 text-muted">Tambah</li>
    @endif
</ol>
<form class="form" method="POST" action="{{url('anggaran/penegakan/kasandra/store')}}" enctype="multipart/form-data">
    @csrf
    @method('post')
    <input type="hidden" name="dataid" value="{{@$data->id}}">
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">FORM KASANDRA</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Urusan <span class="text-danger">*</span> :</label>
                        <select name="urusan_pemerintahan" id="urusan_pemerintahan" required class="form-control select2">
                            <option value="">--Pilih Urusan--</option>
                            @foreach (Helpers::getMasterUrusan() as $urusan)
                                <option value="{{$urusan->nama}}" {{$urusan->nama == @$data->urusan_pemerintahan ? 'selected' : ''}}>{{$urusan->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Jenis Tertib <span class="text-danger">*</span> :</label>
                        <select name="jenis_tertib" id="jenis_tertib" required class="form-control select2">
                            <option value="">--Pilih Jenis Tertib--</option>
                            @if($jenis_tertib)
                                @foreach ($jenis_tertib as $tertib)
                                    <option value="{{$tertib->nama}}" {{$tertib->nama == @$data->jenis_tertib ? 'selected' : ''}}>{{$tertib->nama}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                {{-- <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Jenis Pelanggaran <span class="text-danger">*</span> :</label>
                        <select name="jenis_pelanggaran" id="jenis_pelanggaran" required class="form-control select2">
                            <option value="">--Pilih Jenis Pelanggaran--</option>
                            @foreach (Helpers::getMasterJenisPelanggaran() as $jenis)
                                <option value="{{$jenis->jenis_pelanggaran}}" {{$jenis->jenis_pelanggaran == @$data->jenis_pelanggaran ? 'selected' : ''}}>{{$jenis->jenis_pelanggaran}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}
                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label>Perda <span class="text-danger">*</span> :</label>
                        <input type="text" name="perda" value="{{@$data->perda}}" placeholder="Perda" required class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Pasal Kewajiban :</label>
                        <input type="text" name="pasal_kewajiban" value="{{@$data->pasal_kewajiban}}" placeholder="Pasal Kewajiban" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="form-group">
                        <label>Kewajiban :</label>
                        <input type="text" name="kewajiban" value="{{@$data->kewajiban}}" placeholder="Kewajiban" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Pasal Sanksi Administrasi :</label>
                        <input type="text" name="pasal_sanksi_adm" value="{{@$data->pasal_sanksi_adm}}" placeholder="Pasal Sanksi Administrasi" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="form-group">
                        <label>Sanksi Administrasi :</label>
                        <input type="text" name="sanksi_adm" value="{{@$data->sanksi_adm}}" placeholder="Sanksi Administrasi" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label>Pasal Sanksi Pidana :</label>
                        <input type="text" name="pasal_sanksi_pidana" value="{{@$data->pasal_sanksi_pidana}}" placeholder="Pasal Sanksi Pidana" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-md-9">
                    <div class="form-group">
                        <label>Sanksi Pidana :</label>
                        <input type="text" name="sanksi_pidana" value="{{@$data->sanksi_pidana}}" placeholder="Sanksi Pidana" class="form-control">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label>Status :</label>
                        <input type="text" name="status" value="{{@$data->status}}" placeholder="Status" class="form-control">
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

    $('#urusan_pemerintahan').change(function(){
        $.ajax({
            url: "{{url('anggaran/penegakan/kasandra/utility/getUraian')}}",
            method: 'post',
            data: {
                uraian: $(this).find(":selected").text()
            },
            success: function(res){
                $("#jenis_tertib option").each(function(){
                    if($(this).val()){
                        $(this).remove();
                    }
                });
                if(res.length > 0){
                    $.each(res, function(i, data){
                        $('#jenis_tertib').append('<option value="'+data.nama+'">'+data.nama+'</option>');
                    });
                }
                $('#jenis_tertib').select2('destroy').select2();
            }
        });
    });
</script>
@endsection
