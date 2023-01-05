@extends('layouts.app')
@section('content')
<form class="form" id="frm_create_kasus" enctype="multipart/form-data" method="POST" action="{{ url('kasus/save') }}">
<input type="hidden" name="id" value="{{ $id }}">
<div class="card card-custom gutter-b example example-compact">
<div class="card-header">
	<h3 class="card-title">FORM PENGISIAN KASUS</h3>
	<div class="card-toolbar">
	</div>
</div>
 <div class="card-body">
	  <div class="form-group row mb-5">
	   <div class="col-lg-6">
	    <label>Bidang:</label>
	    <select class="form-control select2" name="bidang" id="bidang">
	    	<option value="">--Pilih Bidang--</option>
	    	@foreach($bidang as $b)
	    		@if($b->bidang == $keg->bidang)
	    		<option value="{{$b->bidang}}" selected>{{$b->bidang}}</option>
	    		@else
	    		<option value="{{$b->bidang}}">{{$b->bidang}}</option>
	    		@endif
	    	@endforeach
	    </select>
	   </div>
	   <div class="col-lg-6">
	    <label>Jenis Kegiatan:</label>
	    <select class="form-control select2" name="jenis_kegiatan" id="jenis_kegiatan">
	    	<option value="">--Pilih Jenis Kegiatan--</option>
	    </select>
	   </div>
	   </div>
	  <div class="form-group row mt-2">
	   <div class="col-lg-6">
	    <label>Bentuk Kegiatan:</label>
	    <select class="form-control" name="bentuk_kegiatan" id="bentuk_kegiatan">
	    	<option value="">--Pilih Bentuk Kegiatan--</option>
	    </select>
	   </div>
	   <div class="col-lg-6">
	    <label>Nama Kegiatan:</label>
	    <input class="form-control" type="text" name="nama_kegiatan" id="nama_kegiatan" value="{{$keg->nama_kegiatan}}" required placeholder="Misal(Gubernur Jawa Timur Dalam Rangka Menerima Brigjen TNI)">
	    <span class="form-text text-danger">Tidak perlu dituliskan lagi seperti ini(Melaksanakan Pengawalan/Pengamanan).</span>
	   </div>
	   </div>
	 <div class="form-group row">
	   <div class="col-lg-6">
	    <label>Penanggung Jawab (KATIM):</label>
	    <select class="select2 form-control" name="penanggung_jawab" id="penanggung_jawab">
	    	<option value="">--Pilih Penanggung Jawab(KATIM)--</option>
	    	@foreach($pegawai as $p)
	    		@if($keg->penanggung == $p->nama)
	    			<option value="{{$p->nama}}" selected>{{$p->nama}}</option>
	    		@else
	    			<option value="{{$p->nama}}">{{$p->nama}}</option>
	    		@endif
	    	@endforeach
	    </select>
	   </div>
	   <div class="col-lg-6">
	    <label>Nomor SPT : </label>
	    <input type="text" name="spt" id="spt" class="form-control" placeholder="Isikan nomor spt. . ."/>
	   </div>
	  </div>
	  <div class="form-group row mt-2">
	  	<div class="col-lg-4">
		    <label>Tanggal Mulai:</label>
		    <input type="text" name="tanggal_mulai" id="tanggal_mulai" class="datepicker form-control" placeholder="Tanggal Mulai. . ."/>
	  	</div>
	  	<div class="col-lg-4">
		    <label>Waktu APP:</label>
		    <input type="text" name="jam_mulai" id="jam_mulai" class="form-control" placeholder="Waktu APP. . ."/>
	  	</div>
	  	<div class="col-lg-4">
		    <label>Tanggal Selesai:</label>
		    <input type="text" name="tanggal_selesai" id="tanggal_selesai" class="datepicker form-control" placeholder="Tanggal Selesai. . ."/>
	  	</div>
	  	</div>

	  <div class="form-group row mt-2">
	  	<div class="col-lg-6">
		    <label>Kabupaten/Kota :</label>
			    <select class="form-control select2" name="kota" id="kota">
			    	<option value="">--Pilih Kab/Kota--</option>
			    	@foreach($kota as $k)
			    		@if($keg->kota == $k->nama)
			    			<option value="{{$k->nama}}" selected>{{$k->nama}}</option>
			    		@else
			    			<option value="{{$k->nama}}">{{$k->nama}}</option>
			    		@endif
			    	@endforeach
			    </select>
	  	</div>
	  	<div class="col-lg-6">
		    <label>Lokasi Kegiatan :</label>
		    <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Isikan lokasi kegiatan. . ."/>
	  	</div>
	  </div>
	  <div class="form-group row mt-2">
	  	<div class="col-lg-6">
		    <label>Latitude:</label>
		    <input type="text" name="lat" class="form-control" placeholder="Koordinat Latitude. . ."/>
	  	</div>
	  	<div class="col-lg-6">
		    <label>Longitude:</label>
		    <input type="text" name="long" class="form-control" placeholder="Koordinat Longitude. . ."/>
	  	</div>
	  </div>
	  <div class="form-group row">
	  	<div class="col-lg-12">
	    <label>Ringkasan/Deskripsi Kasus:</label>
	    <textarea rows="6" name="permasalahan" placeholder="isikan ringkasan aduan disini. . ." class="form-control"></textarea>
	  	</div>
	  </div>
	  <div class="form-group row">
	  	<div class="col-lg-12">
	    <label>File Pendukung:</label>
	    <input type="file" name="file_pendukung" class="form-control">
	    <span class="form-text text-muted">File Bentuk PDF dijadikan 1 File Jika ada.</span>
	  	</div>
	  </div>
 </div>
 <div class="card-footer">
  <div class="row">
   <div class="col-lg-6">
    <button type="reset" class="btn btn-primary mr-2">Save</button>
    <button type="reset" class="btn btn-secondary">Cancel</button>
   </div>
  </div>
 </div>
 </div>	
</form>
@endsection
@section('script')
<script type="text/javascript">
	$('#surat').hide();
	$('#media').hide();
	$('#sosmed').hide();
	$('#sumber_informasi').on('change',function(){
		if($(this).val() == 'sosmed'){
			$('#surat').hide();
			$('#media').hide();
			$('#sosmed').show();
		}
		elseif($(this).val() == 'surat'){

			$('#surat').show();
			$('#media').hide();
			$('#sosmed').hide();
		}
		else {

			$('#surat').hide();
			$('#media').show();
			$('#sosmed').hide();
		}
	})

	$('#kota').on('change',function(){

	})
	$('#kecamatan').on('change',function(){
		
	})
</script>
@endsection