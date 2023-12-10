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
        <a href="{{url('anggaran/perlindungan/posko-satlinmas')}}" class="pe-3">Data Posko Satlinmas</a>
    </li>
    @if($data)
        <li class="breadcrumb-item px-3 text-muted">Edit - {{$data->lokasi}}</li>
    @else
        <li class="breadcrumb-item px-3 text-muted">Tambah</li>
    @endif
</ol>
<form class="form" method="POST" action="{{url('anggaran/perlindungan/posko-satlinmas/store')}}">
    @csrf
    @method('post')
    <input type="hidden" name="dataid" value="{{@$data->id}}">
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">FORM POSO SATLINMAS</h3>
        </div>
        <div class="card-body">
            <div id="map_canvas" class="row mb-10" style="height: 500px;"></div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Lokasi / Alamat Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" value="{{@$data->lokasi}}" name="lokasi" id="lokasi"
                            placeholder="Lokasi / Alamat Lengkap. . ." required>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Koordinat <span class="text-danger">*</span></label>
                        <input type="text" class="form-control readonly" value="{{@$data->koordinat}}" name="koordinat"
                            id="koordinat"
                            placeholder="Silahkan mengisi lokasi atau menandai secara langsung di peta. . ."
                            autocomplete="off" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Kabupaten / Kota <span class="text-danger">*</span> :</label>
                        <select name="kota" id="kotaid" onchange="getLocation('kotaid')" required class="form-control select2">
                            <option value="">--Pilih Kota</option>
                            @foreach ($kota as $k)
                                <option value="{{$k->id}}" {{$k->id == @$data->kota ? 'selected' : ''}}>{{$k->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Kecamatan <span class="text-danger">*</span> :</label>
                        <select name="kecamatan" id="kecamatanid" onchange="getLocation('kecamatanid')" required
                            class="form-control select2">
                            <option value="">--Pilih Kecamatan</option>
                            @if($kecamatan)
                                @foreach ($kecamatan as $kec)
                                    <option value="{{$kec->id}}" {{$kec->id == @$data->kecamatan ? 'selected' : ''}}>{{$kec->nama}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label>Kelurahan <span class="text-danger">*</span> :</label>
                        <select name="kelurahan" id="kelurahanid" required class="form-control select2">
                            <option value="">--Pilih Kelurahan</option>
                            @if($kelurahan)
                                @foreach ($kelurahan as $kel)
                                    <option value="{{$kel->id}}" {{$kel->id == @$data->kelurahan ? 'selected' : ''}}>{{$kel->nama}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Bentuk Bangunan <span class="text-danger">*</span> :</label>
                        <select name="bentuk_bangunan" required class="form-control select2">
                            <option value="">--Pilih Bentuk Bangunan--</option>
                            <option value="Permanen" {{@$data->bentuk_bangunan == 'Permanen' ? 'selected' : ''}}>Permanen</option>
                            <option value="Non Permanen" {{@$data->bentuk_bangunan == 'Non Permanen' ? 'selected' : ''}}>Non Permanen</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Luas Bangunan (M2) <span class="text-danger">*</span> :</label>
                        <input type="number" name="luas_bangunan" min="1" class="form-control" value="{{@$data->luas_bangunan}}" placeholder="Luas Bangunan (M2)" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success mr-2">SIMPAN</button>
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
    $(".readonly").on('keydown paste focus mousedown', function(e){
        if(e.keyCode != 9) e.preventDefault();
    });

    var map;
    var mylocation;
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
        baselayer.loadGeoJson('{{ asset('js/jawa_timur.json') }}');
        baselayer.setStyle({
            fillColor: 'green',
            fillOpacity:0.0,
            opacity: 0.1,
            strokeColor:'red',
            strokeWeight: 1,
            clickable: false
        });
        baselayer.setMap(map);
        @if(@$data->id)
            var koordinat = JSON.parse($('#koordinat').val())
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(koordinat[0], koordinat[1]),
                map: map,
                draggable: true
            });
        @else
            marker = new google.maps.Marker({
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
            $('#koordinat').val('['+event.latLng.lat()+','+event.latLng.lng()+']');
        });

       var input = document.getElementById("lokasi");
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
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
        locationButton.addEventListener("click", () => {
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
                handleLocationError(false, infoWindow, map.getCenter());
            }
        });

    }
    window.initMap = initMap;
</script>
@endsection
