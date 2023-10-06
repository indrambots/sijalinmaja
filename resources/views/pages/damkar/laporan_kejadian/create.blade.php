@extends('layouts.app')
@section('content')
<form class="form" id="frm_create_kejadian" enctype="multipart/form-data" method="POST" action="{{ url('damkar/laporan-kejadian/save') }}">
	{{csrf_field()}}
<input type="hidden" id="id" name="id" value="{{ $id }}">
@if((int)$id !== 0)
	
@endif
<div class="card card-custom gutter-b example example-compact">
<div class="card-header">
	<h3 class="card-title">FORM INPUT LAPORAN KEJADIAN</h3>
	<div class="card-toolbar">
	</div>
</div>
 <div class="card-body">
	  	<div id="map_canvas" class="row mb-10" style="height: 500px;"></div>
		  
	  	<div class="row">
		  <div class="form-group col-md-6 mb-4">
		  	<label>Lokasi Kejadian Kasus</label>
		  	<input type="text" class="form-control" value="{{$kejadian->lokasi_kejadian}}" name="lokasi_kejadian" id="lokasi_kejadian" placeholder="isikan alamat/ lokasi kejadian. . ." required>
		  </div>

		  <div class="form-group col-md-6 mb-4">
		  	<label>Koordinat</label>
		  	<input type="text" class="form-control readonly" value="{{$kejadian->koordinat}}" name="koordinat" id="koordinat" placeholder="Silahkan mengisi lokasi atau menandai secara langsung di peta. . ." autocomplete="off" required>
		  </div>
		  <div class="form-group col-md-6 mb-4">
		  	<label>Kecamatan</label>
		  	<select class="form-control select2" name="kecamatan" id="kecamatan" required>
		  		@if($id == 0)
		  		<option value="">--PILIH KECAMATAN--</option>
			  		@foreach($kecamatan as $k)
			  			<option value="{{ $k->kode_kec }}"> {{ $k->nama }}</option>
			  		@endforeach
		  		@else
			  		@foreach($kecamatan as $k)
			  			@if($k->kode_kec == $kejadian->kecamatan)
			  			<option value="{{ $k->kode_kec }}" selected> {{ $k->nama }}</option>
			  			@else
			  			<option value="{{ $k->kode_kec }}"> {{ $k->nama }}</option>
			  			@endif
			  		@endforeach
		  		@endif
		  	</select>
		  </div>
		  <div class="form-group col-md-6 mb-4">
		  	<label>Kelurahan</label>
		  	<select class="form-control select2" name="kelurahan" id="kelurahan" required>
		  		@if($id == 0)
		  		<option value="">--PILIH KELURAHAN--</option>
		  		@else
			  		@foreach($kelurahan as $k)
			  			@if($k->kode_kel == $kejadian->kelurahan)
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
		  <div class="form-group col-md-6 mb-4">
		  	<label>Tanggal Kejadian</label>
		  	<input type="text" class="form-control datepicker" value="{{$kejadian->tanggal_kejadian}}" name="tanggal_kejadian" id="tanggal_kejadian" placeholder="isikan tanggal kejadian. . ." required>
		  </div>
		  <div class="form-group col-md-6 mb-4">
		  	<label>Jam Kejadian</label>
		  	<input type="time" class="form-control" value="{{$kejadian->jam_kejadian}}" name="jam_kejadian" id="jam_kejadian" placeholder="isikan jam kejadian. . ." required>
		  </div>
		</div>
		  <div class="form-group col-md-12">
		  	<label>Sumber Informasi</label>
		  	<input type="text" class="form-control" value="{{$kejadian->sumber_berita}}" name="sumber_berita" id="sumber_berita" placeholder="sumber berita/sumber informasi. . ." required>
		  </div>
	  	<div class="row">
		  <div class="form-group col-md-4 mb-4">
		  	<label>Terima Berita</label>
		  	<input type="time" class="form-control" value="{{$kejadian->terima_berita}}" name="terima_berita" id="terima_berita" placeholder="jam terima berita kejadian. . ." onkeyup="responTime()" onkeydown="responTime()" required>
		  </div>
		  <div class="form-group col-md-4 mb-4">
		  	<label>Berangkat</label>
		  	<input type="time" class="form-control" value="{{$kejadian->berangkat}}" name="berangkat" id="berangkat" placeholder="isikan jam berangkat. . ." required>
		  </div>
		  <div class="form-group col-md-4 mb-4">
		  	<label>Tiba di Lokasi</label>
		  	<input type="time" class="form-control"  onkeyup="responTime()" onkeydown="responTime()" onchange="responTime()" value="{{$kejadian->tiba}}" name="tiba" id="tiba" placeholder="isikan jam tiba di lokasi. . ." required>
		  </div>
		</div>
	  	<div class="row">
		  <div class="form-group col-md-6 pb-4" style="background-color: #ffffc9;">
		  	<label>Response Time (menit)</label>
		  	<input type="number" class="form-control" value="{{$kejadian->respon_time}}" name="respon_time" id="respon_time" placeholder="respon time dalam menit. . ." required>
		  </div>
		  <div class="form-group col-md-6 mb-4">
		  	<label>Kembali ke Mako/Pos</label>
		  	<input type="time" class="form-control" value="{{$kejadian->kembali}}" name="kembali" id="kembali" placeholder="isikan jam kembali. . .">
		  </div>
		</div>
		  <div class="form-group col-md-12 mb-2">
		  	<label>Jenis Kejadian</label>
		  	<select class="form-control" name="jenis_kejadian" id="jenis_kejadian" onchange="jenisKejadian(this.value)" required>
		  		@if($id == 0)
		  		<option value="">--PILIH JENIS KEJADIAN--</option>
		  		<option value="Kebakaran">KEBAKARAN</option>
		  		<option value="Non Kebakaran">NON KEBAKARAN</option>
		  		@else
		  			@if($kejadian->jenis_kejadian == 'Kebakaran')
				  		<option value="">--PILIH JENIS KEJADIAN--</option>
				  		<option value="Kebakaran" selected>KEBAKARAN</option>
				  		<option value="Non Kebakaran">NON KEBAKARAN</option>
		  			@else
				  		<option value="">--PILIH JENIS KEJADIAN--</option>
				  		<option value="Kebakaran">KEBAKARAN</option>
				  		<option value="Non Kebakaran" non selected>NON KEBAKARAN</option>
		  			@endif
		  		@endif
		  	</select>
		  </div>
		 <div id="jenis_kebakaran">
		  <div class="form-group col-md-12 mb-2">
		  	<label>Jenis Objek Kebakaran</label>
		  	<select class="form-control" name="jenis_objek" id="jenis_objek" onchange="jenisObjek(this.value)">
		  		<option value="">--PILIH JENIS OBJEK--</option>
		  		@if($id == 0 || $kejadian->jenis_objek == null)
		  		<option value="Bangunan">Bangunan</option>
		  		<option value="Non Bangunan">NON Bangunan</option>
		  		<option value="Kendaraan">Kendaraan</option>
		  		@else
		  			@if($kejadian->jenis_objek == 'Bangunan')
				  		<option value="Bangunan" selected>Bangunan</option>
				  		<option value="Non Bangunan">NON Bangunan</option>
				  		<option value="Kendaraan">Kendaraan</option>
		  			@elseif($kejadian->jenis_objek == 'Non Bangunan')
				  		<option value="Bangunan">Bangunan</option>
				  		<option value="Non Bangunan" selected>NON Bangunan</option>
				  		<option value="Kendaraan">Kendaraan</option>
		  			@else
				  		<option value="Bangunan">Bangunan</option>
				  		<option value="Non Bangunan">NON Bangunan</option>
				  		<option value="Kendaraan" selected>Kendaraan</option>
		  			@endif
		  		@endif
		  	</select>
		  </div>
		  <div class="form-group row" id="checkbox_bangunan">
				<label class="col-12 col-form-label">Bangunan</label>
				<div class="col-9 col-form-label">
					<div class="checkbox-inline">
						<label class="checkbox">
						<input type="checkbox" class="bangunan" name="objek[]" value="Perumahan/Rumah Warga">
						<span></span>Perumahan/Rumah Warga</label>
						<label class="checkbox">
						<input type="checkbox" class="bangunan" name="objek[]" value="Industri (Pabrik)">
						<span></span>Industri (Pabrik)</label>
						<label class="checkbox">
						<input type="checkbox" class="bangunan" name="objek[]" value="Umum dan Dagang (Pertokoan)">
						<span></span>Umum dan Dagang (Pertokoan)</label>
						<label class="checkbox">
						<input type="checkbox" class="bangunan" name="objek[]" value="Perkantoran Non Pemerintah">
						<span></span>Perkantoran Non Pemerintah</label>
						<label class="checkbox">
						<input type="checkbox" class="bangunan" name="objek[]" value="Kantor Pemerinahan">
						<span></span>Kantor Pemerinahan</label>
						<label class="checkbox">
						<input type="checkbox" class="bangunan" name="objek[]" value="Tempat Wisata">
						<span></span>Tempat Wisata</label>
						<label class="checkbox">
						<input type="checkbox" class="bangunan" name="objek[]" value="Lainnya">
						<span></span>Lainnya</label>
					</div>
				</div>
			</div>
		  <div class="form-group row" id="checkbox_nonbangunan">
				<label class="col-12 col-form-label">Non Bangunan</label>
				<div class="col-9 col-form-label">
					<div class="checkbox-inline">
						<label class="checkbox">
						<input type="checkbox" class="nonbangunan" name="objek[]" value="Lahan Kosong">
						<span></span>Lahan Kosong</label>
						<label class="checkbox">
						<input type="checkbox" class="nonbangunan" name="objek[]" value="Alang- alang">
						<span></span>Alang- alang</label>
						<label class="checkbox">
						<input type="checkbox" class="nonbangunan" name="objek[]" value="Sampah">
						<span></span>Sampah</label>
						<label class="checkbox">
						<input type="checkbox" class="nonbangunan" name="objek[]" value="Lainnya">
						<span></span>Lainnya</label>
					</div>
				</div>
			</div>
		  <div class="form-group row" id="checkbox_kendaraan">
				<label class="col-12 col-form-label">Kendaraan</label>
				<div class="col-9 col-form-label">
					<div class="checkbox-inline">
						<label class="checkbox">
						<input type="checkbox" class="kendaraan" name="objek[]" value="Roda 4">
						<span></span>Roda 4</label>
						<label class="checkbox">
						<input type="checkbox" class="kendaraan" name="objek[]" value="Roda 2">
						<span></span>Roda 2</label>
						<label class="checkbox">
						<input type="checkbox" class="kendaraan" name="objek[]" value="Roda > 4">
						<span></span>Roda lebih dari 4</label>
						<label class="checkbox">
						<input type="checkbox" class="kendaraan" name="objek[]" value="Lainnya">
						<span></span>Lainnya</label>
					</div>
				</div>
			</div>
		  <div class="form-group row" id="radio_sumber">
				<label class="col-12 col-form-label">Sumber Kebakaran</label>
				<div class="col-9 col-form-label">
					<div class="radio-inline">
						<label class="radio">
						<input type="radio" name="sumber" value="Konsleting">
						<span></span>Konsleting</label>
						<label class="radio">
						<input type="radio" name="sumber" value="LPG / Kompor Gas">
						<span></span>LPG / Kompor Gas</label>
						<label class="radio">
						<input type="radio" name="sumber" value="Puntung Rokok">
						<span></span>Puntung Rokok</label>
						<label class="radio">
						<input type="radio" name="sumber" value="Cuaca Extreme">
						<span></span>Cuaca Extreme</label>
						<label class="radio">
						<input type="radio" name="sumber" value="Api Mekanik">
						<span></span>Api Mekanik</label>
						<label class="radio">
						<input type="radio" name="sumber" value="Dalam Penyelidikan">
						<span></span>Dalam Penyelidikan</label>
						<label class="radio">
						<input type="radio" name="sumber" value="Lainnya">
						<span></span>Lainnya</label>
					</div>
				</div>
			</div>
		</div>
		<div id="jenis_non_kebakaran">
		  <div class="form-group row" id="checkbox_nonbangunan">
				<label class="col-12 col-form-label">Objek Evakuasi</label>
				<div class="col-9 col-form-label">
					<div class="checkbox-inline">
						<label class="checkbox">
						<input type="checkbox" name="objek[]" class="objeknonkebakaran" value="Hewan">
						<span></span>Hewan</label>
						<label class="checkbox">
						<input type="checkbox" name="objek[]" class="objeknonkebakaran" value="Manusia">
						<span></span>Manusia</label>
						<label class="checkbox">
						<input type="checkbox" name="objek[]" class="objeknonkebakaran" value="Barang Berharga">
						<span></span>Barang Berharga</label>
						<label class="checkbox">
						<input type="checkbox" name="objek[]" class="objeknonkebakaran" value="Lainnya">
						<span></span>Lainnya</label>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-6 mb-2">
			  	<label>Nilai Kerugian</label>
			  	<input type="text" class="rupiah form-control" value="{{$kejadian->nilai_kerugian}}" name="nilai_kerugian" id="nilai_kerugian" placeholder="isikan nilai kerugian. . ." required>
			</div>
			<div class="form-group col-md-6 mb-2">
			  	<label>Jumlah Korban</label>
			  	<input type="number" class="form-control" value="{{$kejadian->korban}}" name="korban" id="korban" min="0" oninput="this.value = Math.abs(this.value)" placeholder="isikan jumlah korban. . ." required>
			  </div>
			</div>
		<div class="row">
			<div class="form-group col-md-6 mb-2">
			  	<label>Jumlah Armada yg Berangkat</label>
			  	<input type="number" class="form-control" value="{{$kejadian->jumlah_armada}}" name="jumlah_armada" min="0" oninput="this.value = Math.abs(this.value)" id="jumlah_armada" placeholder="isikan nilai kerugian. . ." required>
			</div>
			<div class="form-group col-md-6 mb-2">
			  	<label>Jumlah Personel</label>
			  	<input type="number" class="form-control" value="{{$kejadian->jumlah_personel}}" name="jumlah_personel" min="0" oninput="this.value = Math.abs(this.value)" id="jumlah_personel" placeholder="isikan jumlah personel. . ." required>
			  </div>
			</div>
		<div class="row">
			<div class="form-group col-md-6 mb-2">
			  	<label>Dokumentasi</label>
			  	<input type="file" class="form-control" name="dokumentasi">
			</div>
			<div class="form-group col-md-6 mb-2">
			  	<label>Dokumentasi</label>
			  	<input type="file" class="form-control" name="dokumentasi_2">
			  </div>
			</div>
		<div class="form-group col-md-12 mb-2">
		  	<label>Kendala atau Permasalahan</label>
		  	<textarea class="form-control" name="kendala" id="kendala" rows="4">{{$kejadian->kendala}}</textarea>
		  </div>
		<div class="form-group col-md-12 mb-2">
		  	<label>Keterangan Tambahan</label>
		  	<textarea class="form-control" name="keterangan" id="keterangan" rows="4">{{$kejadian->keterangan}}</textarea>
		  </div>

	  <div class="form-group">
	  	<button type="submit" class="btn btn-success mr-2">SIMPAN KEJADIAN</button>
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

	$('#kecamatan').on('change',function(){
    $.ajax({
      method:'POST',
      url:'{{ url("ajax/filter-kelurahan") }}',
      data:{
        kota: {!! Auth::user()->kota !!},
        kecamatan: $(this).val(),
        '_token': $('input[name=_token]').val()
      },
      success:function(data){
        console.log(data);
        $('#kelurahan').html(data.view_kelurahan);
      }
    })
  })
	var kejadian = {!! $kejadian !!}
		console.log(kejadian.objek)
		console.log(kejadian.sumber)
	if(kejadian.koordinat !== null)
	{
		var objek = $.parseJSON(kejadian.objek)
		if(kejadian.jenis_kejadian == 'Kebakaran')
		{
			$('#jenis_non_kebakaran').hide()
			$("#jenis_objek").prop('required',true);
			$("input[name=sumber][value='" + kejadian.sumber + "']").attr('checked', true);
			if(kejadian.jenis_objek == 'Bangunan')
			{
				$('.kendaraan').prop('checked', false); 
				$('.nonbangunan').prop('checked', false); 
				$('#checkbox_bangunan').show()
				$('#checkbox_nonbangunan').hide()
				$('#checkbox_kendaraan').hide()
				$('.bangunan').each(function() {
			        if ($.inArray($(this).val(), objek) !== -1) { // Check if current checkbox value is in previous values array
			            $(this).prop('checked', true); // Set checked property of checkbox to true
			        }
			    });
			}
			else if(kejadian.jenis_objek == 'Kendaraan')
			{
				$('.bangunan').prop('checked', false); 
				$('.nonbangunan').prop('checked', false); 
				$('#checkbox_bangunan').hide()
				$('#checkbox_nonbangunan').hide()
				$('#checkbox_kendaraan').show()
				$('.kendaraan').each(function() {
			        if ($.inArray($(this).val(), objek) !== -1) { // Check if current checkbox value is in previous values array
			            $(this).prop('checked', true); // Set checked property of checkbox to true
			        }
			    });
			}
			else
			{
				$('.bangunan').prop('checked', false); 
				$('.kendaraan').prop('checked', false); 
				$('#checkbox_bangunan').hide()
				$('#checkbox_nonbangunan').show()
				$('#checkbox_kendaraan').hide()
				$('.nonbangunan').each(function() {
			        if ($.inArray($(this).val(), objek) !== -1) { // Check if current checkbox value is in previous values array
			            $(this).prop('checked', true); // Set checked property of checkbox to true
			        }
			    });
			}
		}
		else
		{
			$('#jenis_non_kebakaran').show()
			$('#jenis_kebakaran').hide()
			$("#jenis_objek").prop('required',false);
				$('.objeknonkebakaran').each(function() {
			        if ($.inArray($(this).val(), objek) !== -1) { // Check if current checkbox value is in previous values array
			            $(this).prop('checked', true); // Set checked property of checkbox to true
			        }
			    });
		}
	}
	else
	{
		$('#checkbox_bangunan').hide()
		$('#checkbox_nonbangunan').hide()
		$('#checkbox_kendaraan').hide()
		$('#jenis_kebakaran').hide()
		$('#jenis_non_kebakaran').hide()
	}
function jenisKejadian(val)
{
	console.log(val)
	if(val == 'Kebakaran')
	{
		$('#checkbox_bangunan').hide()
		$('#checkbox_nonbangunan').hide()
		$('#checkbox_kendaraan').hide()
		$('#jenis_kebakaran').show()
		$('#jenis_non_kebakaran').hide()
		$("#jenis_objek").prop('required',true);
		$("input[name=sumber]").prop('required', true);
	}
	else{
		$("input[name=sumber]").attr('checked', false);
		$(".bangunan").prop('checked',false);
		$(".nonbangunan").prop('checked',false);
		$(".kendaraan").prop('checked',false);
		$("input[name=sumber]").prop('required', false);
		$('#checkbox_bangunan').hide()
		$('#checkbox_nonbangunan').hide()
		$('#checkbox_kendaraan').hide()
		$('#jenis_kebakaran').hide()
		$('#jenis_non_kebakaran').show()
		$("#jenis_objek").prop('required',false);
		$("#jenis_objek").val($("#jenis_objek option:first").val());
	}
}

function jenisObjek(val)
{
	if(val == 'Bangunan')
	{
		$('.kendaraan').prop('checked', false); 
		$('.nonbangunan').prop('checked', false); 
		$('#checkbox_bangunan').show()
		$('#checkbox_nonbangunan').hide()
		$('#checkbox_kendaraan').hide()
	}
	else if(val == 'Kendaraan')
	{
		$('.bangunan').prop('checked', false); 
		$('.nonbangunan').prop('checked', false); 
		$('#checkbox_bangunan').hide()
		$('#checkbox_nonbangunan').hide()
		$('#checkbox_kendaraan').show()
	}
	else
	{
		$('.bangunan').prop('checked', false); 
		$('.kendaraan').prop('checked', false); 
		$('#checkbox_bangunan').hide()
		$('#checkbox_nonbangunan').show()
		$('#checkbox_kendaraan').hide()
	}
}
function responTime()
{
	var timeOfCall = $('#terima_berita').val(),
        timeOfResponse = $('#tiba').val(),

     hours = timeOfResponse.split(':')[0] - timeOfCall.split(':')[0];
        minutes = timeOfResponse.split(':')[1] - timeOfCall.split(':')[1];

    minutes = minutes.toString().length<2?'0'+minutes:minutes;
    if(minutes<0){
        hours--;
        minutes = 60 + minutes;
    }
    hours = hours.toString().length<2?'0'+hours:hours;
    console.log(hours);
    console.log(minutes);
    if(hours < 0){
    	$('#respon_time').val(parseInt(hours)*60+parseInt(minutes))
    }
    else {
    	$('#respon_time').val(parseInt(hours)*60+parseInt(minutes))
    }
}
</script>
@endsection