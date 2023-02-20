@extends('layouts.app_peta')
@section('content')
<div id="map" style="width: 100%; height: 100%;">
@endsection

@section('script')
<script>
	var map;
      var mylocation;
      function initMap() {
        var infowindow = new google.maps.InfoWindow();
        var myLatLng = new google.maps.LatLng(-7.9666200, 112.6326600);
        var mapOptions = {
          zoom: 8,
          center: myLatLng,
  				mapTypeId: 'hybrid'
        };
        map = new google.maps.Map(document.getElementById("map"), mapOptions); 
      var baselayer = new google.maps.Data();
      baselayer.loadGeoJson('{{ asset('js/kota_all.json') }}')
      baselayer.setStyle({
    fillColor: 'yellow',
    opacity: 0.1,
    strokeWeight: 0.5,
    strokeColor:'red',
    clickable: false
  });
      baselayer.setMap(map);
       mylocation = new google.maps.Marker({
          position: { lat: -7.9666200, lng: 112.6326600 },
          map: map,
          // icon:'{{asset('js/icon/mylock.gif')}}'
        });
       var opor; var array_opor = {!!$opor!!}
       console.log(array_opor.length)
       for(var i = 0; i < array_opor.length; i++){
        var koordinat = JSON.parse(array_opor[i].koordinat_fix);
        console.log(koordinat);
          opor = new google.maps.Marker({
            position: { lat: koordinat[0], lng: koordinat[1] },
            map: map,
            draggable: false,
            icon:'{{ asset('js/icon/opor_resize.png') }}', // anchor
            scaledSize: new google.maps.Size(22, 27), // scaled size
            origin: new google.maps.Point(0,0), // origin
            anchor: new google.maps.Point(0, 0)
          });
          google.maps.event.addListener(opor, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(array_opor[i].nama_tempat);
              infowindow.open(map, marker);
            }
          })(opor, i));
       }
  }


       function getLocation() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(
            function (position) {
              var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
              };
              mylocation.setPosition(pos);
              map.setCenter(pos);
            },
            function () {
              handleLocationError(true, mylocation, map.getCenter());
            }
          );
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, mylocation, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, mylocation, pos) {
        mylocation.setPosition(pos);
        mylocation.setContent(
          browserHasGeolocation
            ? "Error: The Geolocation service failed."
            : "Error: Your browser doesn't support geolocation."
        );
      }
$(document).ready(function(){
	getLocation()
})
</script>
@endsection