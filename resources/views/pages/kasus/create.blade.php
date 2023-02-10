@extends('layouts.app')
@section('content')
<form class="form" id="frm_create_kasus" enctype="multipart/form-data" method="POST" action="{{ url('kegiatan/save') }}">
	{{csrf_field()}}
<input type="hidden" id="id" name="id" value="{{ $id }}">
@if((int)$id !== 0)
	
@endif
<div class="card card-custom gutter-b example example-compact">
<div class="card-header">
	<h3 class="card-title">FORM INPUT KASUS BARU</h3>
	<div class="card-toolbar">
	</div>
</div>
 <div class="card-body">
	  <div class="form-group row mb-5">
	  	<label>Judul Kasus</label>
	  	<input type="text" class="form-control" value="{{$kasus->judul}}" nama="judul" id="judul" placeholder="tuliskan judul kasus. . ." required>
	  </div>
	  <div class="row">
		  <div class="form-group col-md-6 mb-5">
		  	<label>Urusan</label>
		  	<select class="form-control select2" name="urusan" id="urusan" required>
		  		<option value="">--PILIH URUSAN--</option>
		  		@foreach($urusan as $u)
		  		<option value="{{$u->nama}}">{{$u->nama}}</option>
		  		@endforeach
		  	</select>
		  </div>
		  <div class="form-group col-md-6 mb-5">
		  	<label>Jenis Trantib</label>
		  	<select class="form-control select2" name="jenis_trantib" id="jenis_trantib" required>
		  		<option value="">--PILIH JENIS TRANTIB--</option>
		  	</select>
		  </div>
	</div>

	  <div class="form-group row mb-5">
	  	<label>OPD Pengampu</label>
		  	<select class="form-control select2" name="opd_pengampu" id="opd_pengampu" required>
		  		<option value="">--PILIH OPD--</option>
		  		@foreach($pd as $p)
		  			<option value="{{$p->nama}}">{{$p->nama}}</option>
		  		@endforeach
		  	</select>
	  </div>

	  	<div class="row">
		  <div class="form-group col-md-6 mb-5">
		  	<label>Lokasi Kejadian Kasus</label>
		  	<input type="text" class="form-control" value="{{$kasus->lokasi_kejadian}}" nama="lokasi_kejadian" id="lokasi_kejadian" placeholder="isikan alamat/ lokasi kejadian kasus. . ." required>
		  </div>
		  <div class="form-group col-md-6 mb-5">
		  	<label>Waktu Kejadian Kasus</label>
		  	<input type="text" class="form-control datepicker" value="{{$kasus->waktu_kejadian}}" nama="waktu_kejadian" id="waktu_kejadian" placeholder="isikan waktu kejadian. . .">
		  </div>
		</div>
	  <div class="row">
		  <div class="form-group col-md-4 mb-5">
		  	<label>Kabupaten/Kota</label>
		  	<select class="form-control select2" name="kota" id="kota" required>
		  		<option value="">--PILIH KAB/KOTA--</option>
		  		@foreach($kota as $u)
		  		<option value="{{$u->id}}">{{$u->nama}}</option>
		  		@endforeach
		  	</select>
		  </div>
		  <div class="form-group col-md-4 mb-5">
		  	<label>Kecamatan</label>
		  	<select class="form-control select2" name="kecamatan" id="kecamatan" required>
		  		<option value="">--PILIH KECAMATAN--</option>
		  	</select>
		  </div>
		  <div class="form-group col-md-4 mb-5">
		  	<label>Kelurahan</label>
		  	<select class="form-control select2" name="kelurahan" id="kelurahan" required>
		  		<option value="">--PILIH KELURAHAN--</option>
		  	</select>
		  </div>
	</div>

	  <div class="form-group row mb-5">
	  	<label>Sumber Informasi</label>
		  	<select class="form-control select2" name="sumber_informasi" id="sumber_informasi" required>
		  		<option value="">--PILIH SUMBER INFORMASI--</option>
		  		@foreach($sumber as $s)
		  			<option value="{{$s->nama}}">{{$s->nama}}</option>
		  		@endforeach
		  	</select>
	  </div>
	  <div class="row">
		  <div class="form-group col-md-6 mb-5">
		  	<label>Tanggal Informasi (Tanggal surat,postingan,laporan) </label>
		  	<input placeholder="isikan tanggal informasi kasus. . ." type="text" class="form-control datepicker" name="tanggal_informasi" id="tanggal_informasi" value="{{$kasus->tanggal_informasi}}" required>
		  </div>
		  <div class="form-group col-md-6 mb-5">
		  	<label>Nomor surat/link postingan/berita </label>
		  	<input placeholder="isikan nomor surat atau lin postingan berita kasus. . ." type="text" class="form-control" name="nomor_surat_link" id="nomor_surat_link" value="{{$kasus->nomor_surat_link}}" required>
		  </div>
	  </div>
	  <div class="row">
		  <div class="form-group col-md-6 mb-5">
		  	<label>Nama Pelapor/Akun Sosial Media/Media Massa/Judul Kegiatan </label>
		  	<input placeholder="isikan atas nama pelapor. . ." type="text" class="form-control" name="pelapor" id="pelapor" value="{{$kasus->pelapor}}" required>
		  </div>
		  <div class="form-group col-md-6 mb-5">
		  	<label>Nomor Telephone Pelapor/Instansi (jika ada) </label>
		  	<input placeholder="isikan nomor telephone pelapor. . ." type="number" class="form-control" name="no_telp_pelapor" id="no_telp_pelapor" value="{{$kasus->no_telp_pelapor}}" required>
		  </div>
	  </div>
	  <div class="row">
		  <div class="form-group col-md-6 mb-5">
		  	<label>Nama Pelanggar </label>
		  	<input  placeholder="isikan nama lengkap pelanggar sesuai KTP. . ." type="text" class="form-control" name="nama_pelanggar" id="nama_pelanggar" value="{{$kasus->nama_pelanggar}}" required>
		  </div>
		  <div class="form-group col-md-6 mb-5">
		  	<label>NIK Pelanggar </label>
		  	<input  placeholder="isikan nik pelanggar. . ." type="number" class="form-control" name="nik_pelanggar" id="nik_pelanggar" value="{{$kasus->nik_pelanggar}}" required>
		  </div>
	  </div>
	  <div class="form-group row mb-5">
	  	<label>Alamat Lengkap Pelanggar </label>
	  	<input placeholder="isikan alamat lengkap pelanggar. . ." type="text" class="form-control" name="alamat_pelanggar" id="alamat_pelanggar" value="{{$kasus->alamat_pelanggar}}" required>
	  </div>
	  <div class="form-group row mb-5">
	  	<label>Potensi PAD (jika ada)</label>
	  	<input placeholder="isian potensi pad. . ." type="text" class="form-control rupiah" name="potensi_pad" id="potensi_pad" value="{{$kasus->potensi_pad}}">
	  </div>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$('#urusan').on('change',function(){
    $.ajax({
      method:'POST',
      url:'{{ url("ajax/filter-trantib") }}',
      data:{
        kota: $(this).val(),
        '_token': $('input[name=_token]').val()
      },
      success:function(data){
        console.log(data);
        $('#kecamatan').html(data.view);
      }
    })
  })
	$('#kota').on('change',function(){
    $.ajax({
      method:'POST',
      url:'{{ url("ajax/filter-kecamatan") }}',
      data:{
        kota: $(this).val(),
        '_token': $('input[name=_token]').val()
      },
      success:function(data){
        console.log(data);
        $('#kecamatan').html(data.view_kecamatan);
        $('#kelurahan').html(data.view_kelurahan);
      }
    })
  })
	$('#kecamatan').on('change',function(){
    $.ajax({
      method:'POST',
      url:'{{ url("ajax/filter-kelurahan") }}',
      data:{
        kota: $('#kota').val(),
        kecamatan: $(this).val(),
        '_token': $('input[name=_token]').val()
      },
      success:function(data){
        console.log(data);
        $('#kelurahan').html(data.view_kelurahan);
      }
    })
  })
</script>
@endsection