@extends('layouts.app')
@section('content')
<form class="form" id="frm_create_kasus" enctype="multipart/form-data" method="POST" action="{{ url('kasus/save') }}">
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
	  	<div id="map_canvas" class="row mb-10" style="height: 500px;"></div>
	  <div class="form-group row mb-5">
	  	<label>Judul Kasus</label>
	  	<input type="text" class="form-control" value="{{$kasus->judul}}" name="judul" id="judul" placeholder="tuliskan judul kasus. . ." required>
	  </div>
	  	<div class="row">
		  <div class="form-group col-md-6 mb-5">
		  	<label>Lokasi Kejadian Kasus</label>
		  	<input type="text" class="form-control" value="{{$kasus->lokasi_kejadian}}" name="lokasi_kejadian" id="lokasi_kejadian" placeholder="isikan alamat/ lokasi kejadian kasus. . ." required>
		  </div>
		  <div class="form-group col-md-6 mb-5">
		  	<label>Waktu Kejadian Kasus</label>
		  	<input type="text" class="form-control datepicker" value="{{$kasus->waktu_kejadian}}" name="waktu_kejadian" id="waktu_kejadian" placeholder="isikan waktu kejadian. . .">
		  </div>
		</div>
		  <div class="form-group col-md-12 mb-5">
		  	<label>Koordinat</label>
		  	<input type="text" class="form-control readonly" value="{{$kasus->koordinat}}" name="koordinat" id="koordinat" placeholder="Silahkan mengisi lokasi atau menandai secara langsung di peta. . ." autocomplete="off" required>
		  </div>
	  <div class="row">
		  <div class="form-group col-md-4 mb-5">
		  	<label>Kabupaten/Kota</label>
		  	<select class="form-control select2" name="kota" id="kota" required>
		  		<option value="">--PILIH KAB/KOTA--</option>
		  		@foreach($kota as $u)
		  		@if($u->id == $kasus->kota)
		  			<option value="{{$u->id}}" selected>{{$u->nama}}</option>
		  		@else
		  			<option value="{{$u->id}}">{{$u->nama}}</option>
		  		@endif
		  		@endforeach
		  	</select>
		  </div>
		  <div class="form-group col-md-4 mb-5">
		  	<label>Kecamatan</label>
		  	<select class="form-control select2" name="kecamatan" id="kecamatan" required>
		  		@if($id == 0)
		  		<option value="">--PILIH KECAMATAN--</option>
		  		@else
			  		@foreach($kecamatan as $k)
			  			@if($k->kode_kec == $kasus->kecamatan)
			  			<option value="{{ $k->kode_kec }}" selected> {{ $k->nama }}</option>
			  			@else
			  			<option value="{{ $k->kode_kec }}"> {{ $k->nama }}</option>
			  			@endif
			  		@endforeach
		  		@endif
		  	</select>
		  </div>
		  <div class="form-group col-md-4 mb-5">
		  	<label>Kelurahan</label>
		  	<select class="form-control select2" name="kelurahan" id="kelurahan" required>
		  		@if($id == 0)
		  		<option value="">--PILIH KELURAHAN--</option>
		  		@else
			  		@foreach($kelurahan as $k)
			  			@if($k->kode_kel == $kasus->kelurahan)
			  			<option value="{{ $k->kode_kel }}" selected>{{ $k->status_admin}} {{ $k->nama_desa }}</option>
			  			@else
			  			<option value="{{ $k->kode_kel }}"> {{ $k->status_admin}} {{ $k->nama_desa }}</option>
			  			@endif
			  		@endforeach
		  		@endif
		  	</select>
		  </div>
	</div>
	  <div class="row">
		  <div class="form-group col-md-6 mb-5">
		  	<label>Urusan</label>
		  	<select class="form-control select2" name="urusan" id="urusan" required>
		  		<option value="">--PILIH URUSAN--</option>
		  		@foreach($urusan as $u)
			  		@if($u->nama == $kasus->urusan)
			  		<option value="{{$u->nama}}" selected>{{$u->nama}}</option>
			  		@else
			  		<option value="{{$u->nama}}">{{$u->nama}}</option>
			  		@endif
		  		@endforeach
		  	</select>
		  </div>
		  <div class="form-group col-md-6 mb-5">
		  	<label>Jenis Trantib</label>
		  	<select class="form-control select2" name="jenis_trantib" id="jenis_trantib" required>
		  		@if($id == 0)
		  		<option value="">--PILIH JENIS TRANTIB--</option>
		  		@else
		  			@foreach($jenis_trantib as $t)
		  				@if($t->nama == $kasus->jenis_trantib)
							<option value="{{$t->nama}}" selected>{{$t->nama}}</option>
							@else
							<option value="{{$t->nama}}">{{$t->nama}}</option>
							@endif
						@endforeach
		  		@endif
		  	</select>
		  </div>
	</div>

	  <div class="form-group row mb-5">
	  	<label>OPD Pengampu</label>
		  	<select class="form-control select2" name="opd_pengampu" id="opd_pengampu" required>
		  		<option value="">--PILIH OPD--</option>
		  		@foreach($pd as $p)
		  			@if($p->nama == $kasus->opd_pengampu)
		  			<option value="{{$p->nama}}" selected>{{$p->nama}}</option>
		  			@else
		  			<option value="{{$p->nama}}">{{$p->nama}}</option>
		  			@endif
		  		@endforeach
		  	</select>
	  </div>
	  <div class="form-group row mb-5">
	  	<label>Sumber Informasi</label>
		  	<select class="form-control select2" name="sumber_informasi" id="sumber_informasi" required>
		  		<option value="">--PILIH SUMBER INFORMASI--</option>
		  		@foreach($sumber as $s)
		  			@if($s->nama == $kasus->sumber_informasi)
		  			<option value="{{$s->nama}}" selected>{{$s->nama}}</option>
		  			@else
		  			<option value="{{$s->nama}}">{{$s->nama}}</option>
		  			@endif
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
		  	<input placeholder="isikan nomor telephone pelapor. . ." type="number" class="form-control" name="no_telp_pelapor" id="no_telp_pelapor" value="{{$kasus->no_telp_pelapor}}">
		  </div>
	  </div>
	  <div class="row">
		  <div class="form-group col-md-6 mb-5">
		  	<label>Nama Pelanggar </label>
		  	<input  placeholder="isikan nama lengkap pelanggar sesuai KTP. . ." type="text" class="form-control" name="nama_pelanggar" id="nama_pelanggar" value="{{$kasus->nama_pelanggar}}" required>
		  </div>
		  <div class="form-group col-md-6 mb-5">
		  	<label>NIK Pelanggar </label>
		  	<input  placeholder="isikan nik pelanggar. . ." type="number" class="form-control" name="nik_pelanggar" id="nik_pelanggar" value="{{$kasus->nik_pelanggar}}" >
		  </div>
	  </div>
	  <div class="form-group row mb-5">
	  	<label>Alamat Lengkap Pelanggar </label>
	  	<input placeholder="isikan alamat lengkap pelanggar. . ." type="text" class="form-control" name="alamat_pelanggar" id="alamat_pelanggar" value="{{$kasus->alamat_pelanggar}}" >
	  </div>
	  <div class="form-group row mb-5">
	  	<label>Potensi PAD (jika ada)</label>
	  	<input placeholder="isian potensi pad. . ." type="text" class="form-control rupiah" name="potensi_pad" id="potensi_pad" value="{{$kasus->potensi_pad}}">
	  </div>
	  <div class="form-group col-md-12 mb-5">
	  	<label>Deskripsi Kasus</label>
	  	<textarea class="form-control" name="deskripsi_kasus" id="deskripsi_kasus">{{$kasus->deskripsi_kasus}}</textarea>
	  </div>
	  <div class="form-group">
	  	<button type="submit" class="btn btn-success mr-2">SIMPAN</button>
	  </div>
</div>
</div>
</form>
@endsection
@section('script')
<script type="text/javascript">
	
    $(".readonly").on('keydown paste focus mousedown', function(e){
        if(e.keyCode != 9) // ignore tab
            e.preventDefault();
    });

   var map;var mylocation;
      var marker;
      function initMap() {
        var myLatLng = new google.maps.LatLng(-7.9666200, 112.6326600);
        var mapOptions = {
          zoom: 8,
          center: myLatLng,
  				mapTypeId: 'hybrid'
        };
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions); 

      var baselayer = new google.maps.Data();
      baselayer.loadGeoJson('{{ asset('js/jawa_timur.json') }}')
      baselayer.setStyle({
    fillColor: 'green',
    fillOpacity:0.0,
    opacity: 0.1,
    strokeColor:'red',
    strokeWeight: 1,
    clickable: false
  });
      baselayer.setMap(map);
        @if($id == 0)
        marker = new google.maps.Marker({
          // position: myLatLng,
          map: map,
          draggable: true
        });
        @else
        var koordinat = JSON.parse($('#koordinat').val())
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(koordinat[0], koordinat[1]),
          map: map,
          draggable: true
        });
        @endif
       google.maps.event.addListener(map, "click", function(event) {
          if (marker) {
            marker.setMap(null);
          }

          marker = new google.maps.Marker({
            position: event.latLng,
            map: map,
            draggable: true
          });

       $('#koordinat').val('['+event.latLng.lat()+','+event.latLng.lng()+']')
        });
          google.maps.event.addListener(marker, "dragend", function(event) {

       			$('#koordinat').val('['+event.latLng.lat()+','+event.latLng.lng()+']')
          	console.log(event.latLng.lat());
          });
       var input = document.getElementById("lokasi_kejadian");
       var options = {
  componentRestrictions: { country: "id" },
  fields: ["address_components", "geometry", "icon", "name"],
  strictBounds: false,
  types: ["address"],
										  };
			var autocomplete = new google.maps.places.Autocomplete(input, options);
  		autocomplete.bindTo("bounds", map);
  		autocomplete.addListener("place_changed", getCoordinates);

  		function getCoordinates(){
  			var place = autocomplete.getPlace()
  			marker.setPosition(place.geometry.location);
        map.setZoom(18)
        map.setCenter(place.geometry.location);
       	$('#koordinat').val('['+place.geometry.location.lat()+','+place.geometry.location.lng()+']')
  		}
  		 mylocation = new google.maps.Marker({
  			map:map,
  			draggable:false,
  			icon:{
							path: google.maps.SymbolPath.MAP_PIN,
							fillColor: '#9C27B0',
							fillOpacity: 1,
							strokeColor: '',
							strokeWeight: 0
  					},
  		});
  var locationButton = document.createElement("button");

  locationButton.textContent = "Lokasi Saya";
  locationButton.classList.add("custom-map-control-button");
  locationButton.type = 'button';
  // console.log(locationButton);
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
  locationButton.addEventListener("click", () => {
  	// console.log('clickef')
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          map.setZoom(18)
          map.setCenter(pos);
          mylocation.setPosition(pos)
       		$('#koordinat').val('['+position.coords.latitude+','+position.coords.longitude+']')
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });

      }

window.initMap = initMap;
</script>
<script type="text/javascript">
	$('#urusan').on('change',function(){
    $.ajax({
      method:'POST',
      url:'{{ url("ajax/filter-trantib") }}',
      data:{
        urusan: $(this).val(),
        '_token': $('input[name=_token]').val()
      },
      success:function(data){
        console.log(data);
        $('#jenis_trantib').html(data.view);
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

$(document).ready(function(){
  tinymce.init({
  selector: 'textarea#deskripsi_kasus',
  height: 500,
  plugins: [
    'advlist', 'autolink', 'lists', 'link',
    'searchreplace', 'visualblocks', 'code', 'fullscreen',
    'insertdatetime', 'table', 'wordcount'
  ],
  toolbar: 'undo redo | blocks | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat',
  content_style: 'body { font-family:Arial,sans-serif; font-size:12px }',
  ignore: []  
});

})
</script>
@endsection