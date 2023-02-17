@extends('layouts.app_peta')
@section('content')
<div id="map" style="width: 100%; height: 100%;">
@endsection

@section('script')
<script>
	var map;
      var marker;
      var mylocation;
      function initMap() {
        var myLatLng = new google.maps.LatLng(-7.9666200, 112.6326600);
        var mapOptions = {
          zoom: 8,
          center: myLatLng,
  				mapTypeId: 'hybrid'
        };
        map = new google.maps.Map(document.getElementById("map"), mapOptions); 

      var baselayer = new google.maps.Data();
      baselayer.loadGeoJson('{{ asset('js/jawa_timur.json') }}')
      baselayer.setStyle({
    fillColor: 'green',
    opacity: 0.1,
    strokeWeight: 0.5,
    clickable: false
  });
      baselayer.setMap(map);
       mylocation = new google.maps.Marker({
          position: { lat: -7.9666200, lng: 112.6326600 },
          map: map,
          // icon:'{{asset('js/icon/mylock.gif')}}'
        });
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