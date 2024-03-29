@extends('layouts.app')
@section('content')
<form class="form" id="frm_create_kasus" enctype="multipart/form-data" method="POST" action="{{ url('kegiatan/save') }}">
	{{csrf_field()}}
<input type="hidden" id="id" name="id" value="{{ $id }}">
@if((int)$id !== 0)
	
<input type="hidden" id="bidang_val"  value="{{ $keg->bidang }}">
<input type="hidden" id="bentuk_kegiatan_val" value="{{ $keg->bentuk_kegiatan }}">
<input type="hidden" id="jenis_kegiatan_val"  value="{{ $keg->jenis_kegiatan }}">
<input type="hidden" id="sub_bidang_val"  value="{{ $keg->sub_bidang }}">
@endif
<div class="card card-custom gutter-b example example-compact">
<div class="card-header">
	<h3 class="card-title">FORM PENGISIAN KEGIATAN</h3>
	<div class="card-toolbar">
	</div>
</div>
 <div class="card-body">
	  <div class="form-group row mb-2">
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
		    <label>Sub Bidang:</label>
		    <select class="form-control select2" name="sub_bidang" id="sub_bidang" required>
		    	<option value="">--Pilih Seksi/Subbag--</option>
		    </select>
		   </div>
		</div>
	  <div class="form-group row mb-2">
		   <div class="col-lg-6">
		    <label>Jenis Kegiatan:</label>
		    <select class="form-control select2" name="jenis_kegiatan" id="jenis_kegiatan">
		    	<option value="">--Pilih Jenis Kegiatan--</option>
		    </select>
		   </div>
		   <div class="col-lg-6">
		    <label>Bentuk Kegiatan:</label>
		    <select class="form-control select2" name="bentuk_kegiatan" id="bentuk_kegiatan">
		    	<option value="">--Pilih Bentuk Kegiatan--</option>
		    </select>
		   </div>
	   </div>
	  <div class="form-group row mt-2">
	   <div class="col-lg-6">
	    <label>Nama Kegiatan:</label>
	    <input class="form-control" type="text" name="nama_kegiatan" id="nama_kegiatan" value="{{$keg->judul_kegiatan}}" required placeholder="Misal(Gubernur Jawa Timur Dalam Rangka Menerima Brigjen TNI)">
	    <span class="form-text text-danger">Tidak perlu dituliskan lagi seperti ini(Melaksanakan Pengawalan/Pengamanan).</span>
	   </div>
	   <div class="col-lg-6">
	    <label>Seragam :</label>
	    <select class="form-control select2" name="seragam" id="seragam">
	    	@if($keg->seragam == "MENYESUAIKAN ACARA/HARI KERJA")
		    	<option value="">--Pilih Seragam--</option>
		    	<option value="PDL + JUNGLE PET" >PDL + JUNGLE PET</option>
		    	<option value="PDL + BARET">PDL + BARET</option>
		    	<option value="PDL + PECI HITAM" >PDL + PECI HITAM</option>
		    	<option value="PDL DAMKAR">PDL DAMKAR</option>
		    	<option value="PDH">PDH</option>
		    	<option value="PDH DAMKAR">PDH DAMKAR</option>
		    	<option value="TACTICAL + JUNGLE PET">TACTICAL + JUNGLE PET</option>
		    	<option value="TACTICAL HIJAU">TACTICAL HIJAU</option>
		    	<option value="HITAM PUTIH BERDASI / SCARF">HITAM PUTIH BERDASI / SCARF</option>
		    	<option value="MENYESUAIKAN ACARA/HARI KERJA" selected>MENYESUAIKAN ACARA/HARI KERJA</option>
	    	@elseif($keg->seragam == "PDL + JUNGLE PET")
		    	<option value="">--Pilih Seragam--</option>
		    	<option value="PDL + JUNGLE PET" selected>PDL + JUNGLE PET</option>
		    	<option value="PDL + BARET">PDL + BARET</option>
		    	<option value="PDL + PECI HITAM" >PDL + PECI HITAM</option>
		    	<option value="PDL DAMKAR">PDL DAMKAR</option>
		    	<option value="PDH">PDH</option>
		    	<option value="PDH DAMKAR">PDH DAMKAR</option>
		    	<option value="TACTICAL + JUNGLE PET" >TACTICAL + JUNGLE PET</option>
		    	<option value="TACTICAL HIJAU">TACTICAL HIJAU</option>
		    	<option value="HITAM PUTIH BERDASI / SCARF">HITAM PUTIH BERDASI / SCARF</option>
		    	<option value="MENYESUAIKAN ACARA/HARI KERJA" >MENYESUAIKAN ACARA/HARI KERJA</option>
	    	@elseif($keg->seragam == "PDL + BARET")
		    	<option value="">--Pilih Seragam--</option>
		    	<option value="PDL + JUNGLE PET">PDL + JUNGLE PET</option>
		    	<option value="PDL + BARET" selected>PDL + BARET</option>
		    	<option value="PDL + PECI HITAM" >PDL + PECI HITAM</option>
		    	<option value="PDL DAMKAR">PDL DAMKAR</option>
		    	<option value="PDH">PDH</option>
		    	<option value="PDH DAMKAR">PDH DAMKAR</option>
		    	<option value="TACTICAL + JUNGLE PET">TACTICAL + JUNGLE PET</option>
		    	<option value="TACTICAL HIJAU">TACTICAL HIJAU</option>
		    	<option value="HITAM PUTIH BERDASI / SCARF">HITAM PUTIH BERDASI / SCARF</option>
		    	<option value="MENYESUAIKAN ACARA/HARI KERJA">MENYESUAIKAN ACARA/HARI KERJA</option>
	    	@elseif($keg->seragam == "PDL + PECI HITAM")
		    	<option value="">--Pilih Seragam--</option>
		    	<option value="PDL + JUNGLE PET">PDL + JUNGLE PET</option>
		    	<option value="PDL + BARET">PDL + BARET</option>
		    	<option value="PDL + PECI HITAM" selected >PDL + PECI HITAM</option>
		    	<option value="PDL DAMKAR">PDL DAMKAR</option>
		    	<option value="PDH">PDH</option>
		    	<option value="PDH DAMKAR">PDH DAMKAR</option>
		    	<option value="TACTICAL + JUNGLE PET" >TACTICAL + JUNGLE PET</option>
		    	<option value="TACTICAL HIJAU">TACTICAL HIJAU</option>
		    	<option value="HITAM PUTIH BERDASI / SCARF">HITAM PUTIH BERDASI / SCARF</option>
		    	<option value="MENYESUAIKAN ACARA/HARI KERJA">MENYESUAIKAN ACARA/HARI KERJA</option>
	    	@elseif($keg->seragam == "PDH")
		    	<option value="">--Pilih Seragam--</option>
		    	<option value="PDL + JUNGLE PET">PDL + JUNGLE PET</option>
		    	<option value="PDL + BARET">PDL + BARET</option>
		    	<option value="PDL + PECI HITAM">PDL + PECI HITAM</option>
		    	<option value="PDL DAMKAR">PDL DAMKAR</option>
		    	<option value="PDH" selected >PDH</option>
		    	<option value="PDH DAMKAR">PDH DAMKAR</option>
		    	<option value="TACTICAL + JUNGLE PET" >TACTICAL + JUNGLE PET</option>
		    	<option value="TACTICAL HIJAU">TACTICAL HIJAU</option>
		    	<option value="HITAM PUTIH BERDASI / SCARF">HITAM PUTIH BERDASI / SCARF</option>
		    	<option value="MENYESUAIKAN ACARA/HARI KERJA">MENYESUAIKAN ACARA/HARI KERJA</option>
	    	@elseif($keg->seragam == "TACTICAL + JUNGLE PET")
		    	<option value="">--Pilih Seragam--</option>
		    	<option value="PDL + JUNGLE PET">PDL + JUNGLE PET</option>
		    	<option value="PDL + BARET">PDL + BARET</option>
		    	<option value="PDL + PECI HITAM" >PDL + PECI HITAM</option>
		    	<option value="PDL DAMKAR">PDL DAMKAR</option>
		    	<option value="PDH">PDH</option>
		    	<option value="PDH DAMKAR">PDH DAMKAR</option>
		    	<option value="TACTICAL + JUNGLE PET" selected>TACTICAL + JUNGLE PET</option>
		    	<option value="TACTICAL HIJAU">TACTICAL HIJAU</option>
		    	<option value="HITAM PUTIH BERDASI / SCARF">HITAM PUTIH BERDASI / SCARF</option>
		    	<option value="MENYESUAIKAN ACARA/HARI KERJA">MENYESUAIKAN ACARA/HARI KERJA</option>
	    	@elseif($keg->seragam == "TACTICAL + HIJAU")
		    	<option value="">--Pilih Seragam--</option>
		    	<option value="PDL + JUNGLE PET">PDL + JUNGLE PET</option>
		    	<option value="PDL + BARET">PDL + BARET</option>
		    	<option value="PDL + PECI HITAM" >PDL + PECI HITAM</option>
		    	<option value="PDL DAMKAR">PDL DAMKAR</option>
		    	<option value="PDH">PDH</option>
		    	<option value="PDH DAMKAR">PDH DAMKAR</option>
		    	<option value="TACTICAL + JUNGLE PET" >TACTICAL + JUNGLE PET</option>
		    	<option value="TACTICAL HIJAU" selected>TACTICAL HIJAU</option>
		    	<option value="HITAM PUTIH BERDASI / SCARF">HITAM PUTIH BERDASI / SCARF</option>
		    	<option value="MENYESUAIKAN ACARA/HARI KERJA">MENYESUAIKAN ACARA/HARI KERJA</option>
	    	@elseif($keg->seragam == "HITAM PUTIH BERDASI / SCARF")
		    	<option value="">--Pilih Seragam--</option>
		    	<option value="PDL + JUNGLE PET">PDL + JUNGLE PET</option>
		    	<option value="PDL + BARET">PDL + BARET</option>
		    	<option value="PDL + PECI HITAM" >PDL + PECI HITAM</option>
		    	<option value="PDL DAMKAR">PDL DAMKAR</option>
		    	<option value="PDH">PDH</option>
		    	<option value="PDH DAMKAR">PDH DAMKAR</option>
		    	<option value="TACTICAL + JUNGLE PET" >TACTICAL + JUNGLE PET</option>
		    	<option value="TACTICAL HIJAU">TACTICAL HIJAU</option>
		    	<option value="HITAM PUTIH BERDASI / SCARF" selected>HITAM PUTIH BERDASI / SCARF</option>
		    	<option value="MENYESUAIKAN ACARA/HARI KERJA" >MENYESUAIKAN ACARA/HARI KERJA</option>
	    	@elseif($keg->seragam == "PDH DAMKAR")
		    	<option value="">--Pilih Seragam--</option>
		    	<option value="PDL + JUNGLE PET">PDL + JUNGLE PET</option>
		    	<option value="PDL + BARET">PDL + BARET</option>
		    	<option value="PDL + PECI HITAM" >PDL + PECI HITAM</option>
		    	<option value="PDL DAMKAR">PDL DAMKAR</option>
		    	<option value="PDH">PDH</option>
		    	<option value="PDH DAMKAR" selected>PDH DAMKAR</option>
		    	<option value="TACTICAL + JUNGLE PET" >TACTICAL + JUNGLE PET</option>
		    	<option value="TACTICAL HIJAU">TACTICAL HIJAU</option>
		    	<option value="HITAM PUTIH BERDASI / SCARF">HITAM PUTIH BERDASI / SCARF</option>
		    	<option value="MENYESUAIKAN ACARA/HARI KERJA" >MENYESUAIKAN ACARA/HARI KERJA</option>
	    	@elseif($keg->seragam == "PDL DAMKAR")
		    	<option value="">--Pilih Seragam--</option>
		    	<option value="PDL + JUNGLE PET">PDL + JUNGLE PET</option>
		    	<option value="PDL + BARET">PDL + BARET</option>
		    	<option value="PDL + PECI HITAM" >PDL + PECI HITAM</option>
		    	<option value="PDL DAMKAR" selected>PDL DAMKAR</option>
		    	<option value="PDH">PDH</option>
		    	<option value="PDH DAMKAR" selected>PDH DAMKAR</option>
		    	<option value="TACTICAL + JUNGLE PET" >TACTICAL + JUNGLE PET</option>
		    	<option value="TACTICAL HIJAU">TACTICAL HIJAU</option>
		    	<option value="HITAM PUTIH BERDASI / SCARF">HITAM PUTIH BERDASI / SCARF</option>
		    	<option value="MENYESUAIKAN ACARA/HARI KERJA" >MENYESUAIKAN ACARA/HARI KERJA</option>
	    	@else
		    	<option value="">--Pilih Seragam--</option>
		    	<option value="PDL + JUNGLE PET">PDL + JUNGLE PET</option>
		    	<option value="PDL + BARET">PDL + BARET</option>
		    	<option value="PDL + PECI HITAM">PDL + PECI HITAM</option>
		    	<option value="PDL DAMKAR">PDL DAMKAR</option>
		    	<option value="PDH">PDH</option>
		    	<option value="PDH DAMKAR">PDH DAMKAR</option>
		    	<option value="TACTICAL + JUNGLE PET">TACTICAL + JUNGLE PET</option>
		    	<option value="TACTICAL HIJAU">TACTICAL HIJAU</option>
		    	<option value="HITAM PUTIH BERDASI / SCARF">HITAM PUTIH BERDASI / SCARF</option>
		    	<option value="MENYESUAIKAN ACARA/HARI KERJA">MENYESUAIKAN ACARA/HARI KERJA</option>
	    	@endif
	    </select>
	   </div>
	   </div>
	 <div class="form-group row">

	  	<div class="col-lg-12">
		    <label>Dasar Surat:<span class="form-text text-muted">(OPTIONAL)</span></label>
		    <textarea rows="4" class="form-control" name="dasar_surat" id="dasar_surat" placeholder="Misal(Surat dari Dinas Kepemudaan dan Olahraga Provinsi Jawa Timur Nomor 427/297/117.2/2023 tanggal 5 Januari 2023 Perihal Permohonan Petugas Pengamanan dan 1(Satu) Korps Musik (Korsik) )">{{$keg->dasar_surat}}</textarea>
		    
	  	</div>
	</div>
	  <div class="form-group row mt-2">
	  	<div class="col-lg-4">
		    <label>Tanggal Mulai :</label>
		    <input type="text" name="tanggal_mulai" required id="tanggal_mulai" value="{{$keg->tanggal_mulai}}" class="form-control datepicker" placeholder="Tanggal Mulai. . ."/>
	  	</div>
	  	<div class="col-lg-2">
		    <label>APP :</label>
		    <input type="text" name="jam_app" id="jam_app" value="{{$keg->jam_app}}" class="timepickers form-control" placeholder="Waktu APP. . ."/>
	    <span class="form-text text-danger">Kosongi jika tidak ada APP.</span>
	  	</div>
	  	<div class="col-lg-2">
		    <label>Jam Mulai :</label>
		    <input type="text" required name="jam_mulai" id="jam_mulai" value="{{$keg->jam_mulai}}" class="timepickers form-control" placeholder="Jam Mulai. . ."/>
	  	</div>
	  	<div class="col-lg-4">
		    <label>Tanggal Selesai :</label>
		    <input type="text" required name="tanggal_selesai" id="tanggal_selesai" value="{{$keg->tanggal_selesai}}" class="datepicker form-control" placeholder="Tanggal Selesai. . ."/>
	  	</div>
	  </div>
	  <div class="form-group row mt-2">
	  	<div class="col-lg-2">
		    <label>HT POC :</label>
		    <input type="number" name="ht_poc" required id="ht_poc" value="{{$keg->ht_poc}}" class="form-control" placeholder="Jumlah POC. . ."/>
	    <span class="form-text text-danger">Diisi 0 Jika tidak membawa.</span>
	  	</div>
	  	<div class="col-lg-2">
		    <label>HT Local :</label>
		    <input type="number" name="ht_lokal" required id="ht_lokal" value="{{$keg->ht_lokal}}" class="form-control" placeholder="Jumlah HT Lokal. . ."/>
	    <span class="form-text text-danger">Diisi 0 Jika tidak membawa.</span>
	  	</div>
	  	<div class="col-lg-2">
		    <label>Mobil Pamwal :</label>
		    <input type="number" name="mobil_pamwal" id="mobil_pamwal" value="{{$keg->mobil_pamwal}}" class="form-control" placeholder="Jumlah Mobil Pamwal. . ."/>
	    <span class="form-text text-danger">Diisi 0 Jika tidak membawa.</span>
	  	</div>
	  	<div class="col-lg-2">
		    <label>Mobil :</label>
		    <input type="number" required name="mobil" id="mobil" value="{{$keg->mobil}}" class="form-control" placeholder="Jumlah mobil. . ."/>
	    	<span class="form-text text-danger">Diisi 0 Jika tidak membawa.</span>
	  	</div>
	  	<div class="col-lg-2">
		    <label>Truck :</label>
		    <input type="number" required name="truck" id="truck" value="{{$keg->truck}}" class="form-control" placeholder="Jumlah truck. . ."/>
	    	<span class="form-text text-danger">Diisi 0 Jika tidak membawa.</span>
	  	</div>
	  </div>

	  <div class="form-group row mt-2">
	  	<div class="col-lg-6">
		    <label>Kabupaten/Kota :</label>
			    <select class="form-control select2" name="kota" id="kota" required>
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
		    <input type="text" name="lokasi" id="lokasi" class="form-control" value="{{$keg->lokasi}}" placeholder="Isikan lokasi kegiatan. . ." required/>
	  	</div>
	  </div>
	  <div class="card-body">
 <h6 class="panel-title txt-dark" style="border-bottom:1px solid #EBEDF3;"><i class="fas fa-mail-bulk"> </i> Penugasan Personel</h6>
	  	@if($id == 0)
	  	<div id="frmpersonel1" class="form-horizontal attributs">
		<div class="form-group row ">
			<div class="col-lg-6">
				<label>Personel <strong id="urut_personel1">1 </strong> :</label>
				<select class="form-control pegawais" name="personel[1][nama]" id="personel_nama1">
					@foreach($pegawai_all as $p)
						<option value="{{$p->nip}}">{{$p->nama}} </option>
					@endforeach
				</select>
			</div>

			<div class="col-lg-4">
				<label>Jenis Penugasan : </label>
				<select class="form-control pegawais" name="personel[1][jenis]" id="personel_jenis1" required>
					<option value="KAOPSGAP">KAOPSGAP</option>
					<option value="ANGGOTA">ANGGOTA</option>
					<option value="DOKUMENTASI">DOKUMENTASI</option>
					<option value="PELAPORAN">PELAPORAN</option>
					<option value="PTI">PTI</option>
					<option value="PAMWAL">PAMWAL</option>
					<option value="WALSUS">WALSUS</option>
					<option value="POLTIK">POLTIK</option>
					<option value="DRIVER">DRIVER</option>
					<option value="PETUGAS TUM">PETUGAS TUM</option> 
					<option value="PESERTA">PESERTA</option>
					<option value="PESERTA + PELAPORAN">PESERTA + PELAPORAN</option> 
					<option value="SHIFT PAGI">SHIFT PAGI</option> 
					<option value="SHIFT MALAM">SHIFT MALAM</option> 
				</select>
			</div>
				<button type="button" class="btn btn-sm btn-danger" class="delete_attributs" id="delete_attribut1"><i class="far fa-trash-alt"></i></button>
			</div>
		</div>
		@else
			@foreach($keg->personel as $k)
	  	<div id="frmpersonel{{$loop->iteration}}" class="form-horizontal attributs">
				<div class="form-group row ">
					<div class="col-lg-6">
						<label>Personel <strong id="urut_personel{{$loop->iteration}}">{{$loop->iteration}} </strong>:</label>
						<select class="form-control pegawais" name="personel[{{$loop->iteration}}][nama]" id="personel_nama{{$loop->iteration}}">
							@foreach($pegawai_all as $p)
								@if($p->nama == $k->nama)
								<option value="{{$p->nip}}" selected>{{$p->nama}} </option>
								@else
								<option value="{{$p->nip}}" >{{$p->nama}} </option>
								@endif
							@endforeach
						</select>
					</div>

					<div class="col-lg-4">
						<label>Jenis Penugasan : </label>
						<select class="form-control pegawais" name="personel[{{$loop->iteration}}][jenis]" id="personel_jenis{{$loop->iteration}}" required>
							@if($k->ket == "ANGGOTA")
							<option value="KAOPSGAP">KAOPSGAP</option>
							<option value="ANGGOTA" selected>ANGGOTA</option>
							<option value="DOKUMENTASI">DOKUMENTASI</option>
							<option value="PELAPORAN">PELAPORAN</option>
							<option value="PTI">PTI</option>
							<option value="PAMWAL">PAMWAL</option>
							<option value="WALSUS">WALSUS</option>
							<option value="POLTIK">POLTIK</option>  
							<option value="DRIVER">DRIVER</option>
							<option value="PETUGAS TUM">PETUGAS TUM</option> 
							<option value="PESERTA">PESERTA</option>
							<option value="PESERTA + PELAPORAN">PESERTA + PELAPORAN</option> 
							<option value="SHIFT PAGI">SHIFT PAGI</option> 
							<option value="SHIFT MALAM">SHIFT MALAM</option>  
							@elseif($k->ket == "DOKUMENTASI")
							<option value="KAOPSGAP">KAOPSGAP</option>
							<option value="ANGGOTA">ANGGOTA</option>
							<option value="DOKUMENTASI" selected>DOKUMENTASI</option>
							<option value="PELAPORAN">PELAPORAN</option>
							<option value="PTI">PTI</option>
							<option value="PAMWAL">PAMWAL</option>
							<option value="WALSUS">WALSUS</option>
							<option value="POLTIK">POLTIK</option> 
							<option value="DRIVER">DRIVER</option>
							<option value="PETUGAS TUM">PETUGAS TUM</option> 
							<option value="PESERTA">PESERTA</option>
							<option value="PESERTA + PELAPORAN">PESERTA + PELAPORAN</option> 
							<option value="SHIFT PAGI">SHIFT PAGI</option> 
							<option value="SHIFT MALAM">SHIFT MALAM</option>
							@elseif($k->ket == "PELAPORAN")
							<option value="KAOPSGAP">KAOPSGAP</option>
							<option value="ANGGOTA">ANGGOTA</option>
							<option value="DOKUMENTASI">DOKUMENTASI</option>
							<option value="PELAPORAN" selected>PELAPORAN</option>
							<option value="PTI">PTI</option>
							<option value="PAMWAL">PAMWAL</option>
							<option value="WALSUS">WALSUS</option>
							<option value="POLTIK">POLTIK</option> 
							<option value="DRIVER">DRIVER</option>
							<option value="PETUGAS TUM">PETUGAS TUM</option> 
							<option value="PESERTA">PESERTA</option>
							<option value="PESERTA + PELAPORAN">PESERTA + PELAPORAN</option> 
							<option value="SHIFT PAGI">SHIFT PAGI</option> 
							<option value="SHIFT MALAM">SHIFT MALAM</option> 
							@elseif($k->ket == "PTI")
							<option value="KAOPSGAP">KAOPSGAP</option>
							<option value="ANGGOTA">ANGGOTA</option>
							<option value="DOKUMENTASI">DOKUMENTASI</option>
							<option value="PELAPORAN">PELAPORAN</option>
							<option value="PTI" selected>PTI</option>
							<option value="PAMWAL">PAMWAL</option>
							<option value="WALSUS">WALSUS</option>
							<option value="POLTIK">POLTIK</option> 
							<option value="DRIVER">DRIVER</option>
							<option value="PETUGAS TUM">PETUGAS TUM</option> 
							<option value="PESERTA">PESERTA</option>
							<option value="PESERTA + PELAPORAN">PESERTA + PELAPORAN</option> 
							<option value="SHIFT PAGI">SHIFT PAGI</option> 
							<option value="SHIFT MALAM">SHIFT MALAM</option> 
							@elseif($k->ket == "DRIVER")
							<option value="KAOPSGAP">KAOPSGAP</option>
							<option value="ANGGOTA">ANGGOTA</option>
							<option value="DOKUMENTASI">DOKUMENTASI</option>
							<option value="PELAPORAN">PELAPORAN</option>
							<option value="PTI">PTI</option>
							<option value="PAMWAL">PAMWAL</option>
							<option value="WALSUS">WALSUS</option>
							<option value="POLTIK">POLTIK</option> 
							<option value="DRIVER" selected>DRIVER</option>
							<option value="PETUGAS TUM">PETUGAS TUM</option> 
							<option value="PESERTA">PESERTA</option>
							<option value="PESERTA + PELAPORAN">PESERTA + PELAPORAN</option> 
							<option value="SHIFT PAGI">SHIFT PAGI</option> 
							<option value="SHIFT MALAM">SHIFT MALAM</option> 
							@elseif($k->ket == "KAOPSGAP")
							<option value="KAOPSGAP" selected>KAOPSGAP</option>
							<option value="ANGGOTA">ANGGOTA</option>
							<option value="DOKUMENTASI">DOKUMENTASI</option>
							<option value="PELAPORAN">PELAPORAN</option>
							<option value="PTI">PTI</option>
							<option value="PAMWAL">PAMWAL</option>
							<option value="WALSUS">WALSUS</option>
							<option value="POLTIK">POLTIK</option> 
							<option value="DRIVER">DRIVER</option>
							<option value="PETUGAS TUM">PETUGAS TUM</option> 
							<option value="PESERTA">PESERTA</option>
							<option value="PESERTA + PELAPORAN">PESERTA + PELAPORAN</option> 
							<option value="SHIFT PAGI">SHIFT PAGI</option> 
							<option value="SHIFT MALAM">SHIFT MALAM</option> 
							@elseif($k->ket == "PETUGAS TUM")
							<option value="KAOPSGAP">KAOPSGAP</option>
							<option value="ANGGOTA">ANGGOTA</option>
							<option value="DOKUMENTASI">DOKUMENTASI</option>
							<option value="PELAPORAN">PELAPORAN</option>
							<option value="PTI">PTI</option>
							<option value="PAMWAL">PAMWAL</option>
							<option value="WALSUS">WALSUS</option>
							<option value="POLTIK">POLTIK</option> 
							<option value="DRIVER">DRIVER</option>
							<option value="PETUGAS TUM" selected>PETUGAS TUM</option> 
							<option value="PESERTA">PESERTA</option>
							<option value="PESERTA + PELAPORAN">PESERTA + PELAPORAN</option> 
							<option value="SHIFT PAGI">SHIFT PAGI</option> 
							<option value="SHIFT MALAM">SHIFT MALAM</option> 
							@elseif($k->ket == "PESERTA")
							<option value="KAOPSGAP">KAOPSGAP</option>
							<option value="ANGGOTA">ANGGOTA</option>
							<option value="DOKUMENTASI">DOKUMENTASI</option>
							<option value="PELAPORAN">PELAPORAN</option>
							<option value="PTI">PTI</option>
							<option value="PAMWAL">PAMWAL</option>
							<option value="WALSUS">WALSUS</option>
							<option value="POLTIK">POLTIK</option> 
							<option value="DRIVER">DRIVER</option>
							<option value="PETUGAS TUM">PETUGAS TUM</option> 
							<option value="PESERTA" selected>PESERTA</option>
							<option value="PESERTA + PELAPORAN">PESERTA + PELAPORAN</option> 
							<option value="SHIFT PAGI">SHIFT PAGI</option> 
							<option value="SHIFT MALAM">SHIFT MALAM</option> 
							@elseif($k->ket == "PESERTA + PELAPORAN")
							<option value="KAOPSGAP">KAOPSGAP</option>
							<option value="ANGGOTA">ANGGOTA</option>
							<option value="DOKUMENTASI">DOKUMENTASI</option>
							<option value="PELAPORAN">PELAPORAN</option>
							<option value="PTI">PTI</option>
							<option value="PAMWAL">PAMWAL</option>
							<option value="WALSUS">WALSUS</option>
							<option value="POLTIK">POLTIK</option> 
							<option value="DRIVER">DRIVER</option>
							<option value="PETUGAS TUM">PETUGAS TUM</option> 
							<option value="PESERTA">PESERTA</option>
							<option value="PESERTA + PELAPORAN" selected>PESERTA + PELAPORAN</option> 
							<option value="SHIFT PAGI">SHIFT PAGI</option> 
							<option value="SHIFT MALAM">SHIFT MALAM</option> 
							@elseif($k->ket == "PAMWAL")
							<option value="KAOPSGAP">KAOPSGAP</option>
							<option value="ANGGOTA">ANGGOTA</option>
							<option value="DOKUMENTASI">DOKUMENTASI</option>
							<option value="PELAPORAN">PELAPORAN</option>
							<option value="PTI">PTI</option>
							<option value="PAMWAL" selected>PAMWAL</option>
							<option value="WALSUS">WALSUS</option>
							<option value="POLTIK">POLTIK</option> 
							<option value="DRIVER">DRIVER</option>
							<option value="PETUGAS TUM">PETUGAS TUM</option> 
							<option value="PESERTA">PESERTA</option>
							<option value="PESERTA + PELAPORAN">PESERTA + PELAPORAN</option> 
							<option value="SHIFT PAGI">SHIFT PAGI</option> 
							<option value="SHIFT MALAM">SHIFT MALAM</option>
							@elseif($k->ket == "WALSUS")
							<option value="KAOPSGAP">KAOPSGAP</option>
							<option value="ANGGOTA">ANGGOTA</option>
							<option value="DOKUMENTASI">DOKUMENTASI</option>
							<option value="PELAPORAN">PELAPORAN</option>
							<option value="PTI">PTI</option>
							<option value="PAMWAL">PAMWAL</option>
							<option value="WALSUS" selected>WALSUS</option>
							<option value="POLTIK">POLTIK</option> 
							<option value="DRIVER">DRIVER</option>
							<option value="PETUGAS TUM">PETUGAS TUM</option> 
							<option value="PESERTA">PESERTA</option>
							<option value="PESERTA + PELAPORAN">PESERTA + PELAPORAN</option> 
							<option value="SHIFT PAGI">SHIFT PAGI</option> 
							<option value="SHIFT MALAM">SHIFT MALAM</option>
							@elseif($k->ket == "POLTIK")
							<option value="KAOPSGAP">KAOPSGAP</option>
							<option value="ANGGOTA">ANGGOTA</option>
							<option value="DOKUMENTASI">DOKUMENTASI</option>
							<option value="PELAPORAN">PELAPORAN</option>
							<option value="PTI">PTI</option>
							<option value="PAMWAL">PAMWAL</option>
							<option value="WALSUS">WALSUS</option>
							<option value="POLTIK" selected>POLTIK</option>
							<option value="DRIVER">DRIVER</option>
							<option value="PETUGAS TUM">PETUGAS TUM</option> 
							<option value="PESERTA">PESERTA</option>
							<option value="PESERTA + PELAPORAN">PESERTA + PELAPORAN</option> 
							<option value="SHIFT PAGI">SHIFT PAGI</option> 
							<option value="SHIFT MALAM">SHIFT MALAM</option>
							@endif
						</select>
					</div>
						<button type="button" class="btn btn-sm btn-danger" onclick="removeAttribut('#frmpersonel{{$loop->iteration}}')" class="delete_attributs" id="delete_attribut{{$loop->iteration}}"><i class="far fa-trash-alt"></i></button>
					</div>
		</div>
			@endforeach
		@endif
		<button class="btn btn-success" type="button" id="tambah-personel">Tambah Personel </button>
	</div>
 <div class="card-footer">
  <div class="row">
   <div class="col-lg-6">
    <button type="submit" class="btn btn-primary mr-2">Save</button>
    <button type="reset" class="btn btn-secondary">Cancel</button>
   </div>
  </div>
 </div>
 </div>	
</div>
</form>
@endsection
@section('script')
<script type="text/javascript">
            $('.delete_attributs').hide();
            $('#delete_attribut1').hide();
$('.pegawais').select2({ //apply select2 to my element
    placeholder: "Search your Tool",
    allowClear: true
});
	$('#bidang').on('change',function(){
	        if($(this).val() == "Penegakan Peraturan Daerah"){
	        	$('#nomor_bidang').html('106.2/2023')
	        }
	        else if($(this).val() == "Ketentraman dan Ketertiban Umum"){
	        	$('#nomor_bidang').html('106.3/2023')
	        }
	        else if($(this).val() == "Perlindungan Masyarakat"){
	        	$('#nomor_bidang').html('106.5/2023')
	        }
	        else if($(this).val() == "Pemadam Kebakaran"){
	        	$('#nomor_bidang').html('106.5/2023')
	        }
	        else{
	        	$('#nomor_bidang').html('106.1/2023')
	        }
		$.ajax({
	      method:'POST',
	      url:'{{ url("kegiatan/filter-bidang") }}',
	      data:{
	        bidang: $(this).val(),
	        '_token': $('input[name=_token]').val()
	      },
	      success:function(data){
	        console.log(data);
	        $('#jenis_kegiatan').html(data.view_kegiatan);        
	        $('#bentuk_kegiatan').html(data.view_bentuk_kegiatan);
	        $('#sub_bidang').html(data.view_sub_bidang);
	      }
	    })
	})
	$('#jenis_kegiatan').on('change',function(){
		$.ajax({
	      method:'POST',
	      url:'{{ url("kegiatan/filter-kegiatan") }}',
	      data:{
	        kegiatan: $(this).val(),
	        bidang:$('#bidang').val(),
	        '_token': $('input[name=_token]').val()
	      },
	      success:function(data){
	        console.log(data);
	        $('#bentuk_kegiatan').html(data.view_bentuk_kegiatan);
	      }
	    })
	})


	if ($('.attributs').length <= 1) {
            $('.delete_attributs').hide();
            $('#delete_attribut1').hide();
      }
      if($('#id').val() !== 0){
	        if($('#bidang').val() == "Penegakan Peraturan Daerah"){
	        	$('#nomor_bidang').html('106.2/2023')
	        }
	        else if($('#bidang').val() == "Ketentraman dan Ketertiban Umum"){
	        	$('#nomor_bidang').html('106.3/2023')
	        }
	        else if($('#bidang').val() == "Perlindungan Masyarakat"){
	        	$('#nomor_bidang').html('106.5/2023')
	        }
	        else if($('#bidang').val() == "Pemadam Kebakaran"){
	        	$('#nomor_bidang').html('106.5/2023')
	        }
	        else{
	        	$('#nomor_bidang').html('106.1/2023')
	        }
		$.ajax({
	      method:'POST',
	      url:'{{ url("kegiatan/filter-bidang") }}',
	      data:{
	        bidang: $('#bidang').val(),
	        '_token': $('input[name=_token]').val()
	      },
	      success:function(data){
	        console.log(data);
	        $('#jenis_kegiatan').html(data.view_kegiatan).val($('#jenis_kegiatan_val').val()).trigger('change');
	        $('#bentuk_kegiatan').html(data.view_bentuk_kegiatan).val($('#bentuk_kegiatan_val').val()).trigger('change');
	        $('#sub_bidang').html(data.view_sub_bidang).val($('#sub_bidang_val').val()).trigger('change');
	      }
	    })
      }
  	$('#tambah-personel').click(function(){
        var numb = $('.attributs').length;
        $('.pegawais').select2("destroy");
        var newNumb = numb + 1;
        var newElemb = $('#frmpersonel' + numb).clone().attr('id', 'frmpersonel' + newNumb);
        newElemb.find('#personel_nama' + numb).attr('id', 'personel_nama' + newNumb).attr('name', 'personel[' + newNumb + '][nama]').val('');
        newElemb.find('#personel_jenis' + numb).attr('id', 'personel_jenis' + newNumb).attr('name', 'personel[' + newNumb + '][jenis]').val('');
        newElemb.find('#urut_personel' + numb).attr('id', 'urut_personel' + newNumb).html(newNumb);
        newElemb.find('#delete_attribut' + numb).attr('id', 'delete_attribut' + newNumb).attr('onclick', 'removeAttribut("#frmpersonel' + newNumb + '")').show();

        $('#frmpersonel' + numb).after(newElemb);
$('.pegawais').select2({ //apply select2 to my element
    placeholder: "Tambahan Personel. . .",
    allowClear: true
});
      });
    function removeAttribut(val,id){
        $(val).remove();
        $('input[name="delete_attribut[' + id + ']"]').val(id);
    }
</script>
@endsection