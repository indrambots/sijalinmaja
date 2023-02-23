@extends('layouts.app_peta')
@section('content')
<div id="map" style="width: 100%; height: 100%;"></div>
<button type="button" id="kt_demo_panel_toggle">MENU</button>
  <div id="kt_demo_panel" class="offcanvas offcanvas-right">
      <!--begin::Header-->
      <div class="offcanvas-header d-flex align-items-center justify-content-between p-7">
        <h4 class="font-weight-bold m-0">DATABASE KASUS</h4>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_demo_panel_close">
          <i class="ki ki-close icon-xs text-muted"></i>
        </a>
      </div>
      <!--end::Header-->
      <!--begin::Content-->
      <div class="offcanvas-content">
        <!--begin::Wrapper-->
        <div class="offcanvas-wrapper mb-5 scroll-pull">
          <div class="accordion" id="accordionExample4">
           <div class="card">
            <div class="card-header" id="headingOne4">
             <div class="card-title">
              <i class="flaticon2-layers-1" data-toggle="collapse" data-target="#collapseOne4"></i> Batas Wilayah
             </div>
            </div>
            <div id="collapseOne4" class="collapse" data-parent="#accordionExample4">
             <div class="card-body">
              <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                Jawa Timur &nbsp;&nbsp;&nbsp;
                <input type="checkbox" checked="checked" name="jawa_timur" id="jawa_timur">
              <span></span></label>
             </div>
            </div>
           </div>
           <div class="card">
            <div class="card-header" id="headingTwo4">
             <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo4">
              <i class="flaticon-danger"></i> Kasus
             </div>
            </div>
            <div id="collapseTwo4" class="collapse" data-parent="#accordionExample4">
             <div class="card-body">
              <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                KASUS AKTIF &nbsp;&nbsp;&nbsp;
                <input type="checkbox" checked="checked" name="aktif" id="aktif">
              <span></span></label>
              <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                PROSES &nbsp;&nbsp;&nbsp;
                <input type="checkbox" checked="checked" name="proses" id="proses">
              <span></span></label>
              <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                SELESAI &nbsp;&nbsp;&nbsp;
                <input type="checkbox" checked="checked" name="selesai" id="selesai">
              <span></span></label>
             </div>
            </div>
           </div>

           <div class="card">
            <div class="card-header">
             <div class="card-title collapsed" data-toggle="collapse" data-target="#oporTab">
              <i class="flaticon-danger"></i> Peduli Lindungi
             </div>
            </div>
            <div id="oporTab" class="collapse" data-parent="#accordionExample4">
             <div class="card-body">
              <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                OPOR SIGAP &nbsp;&nbsp;&nbsp;
                <input type="checkbox" checked="checked" name="opor" id="opor">
              <span></span></label>
             </div>
            </div>
           </div>
          </div>
        </div>
        <!--end::Wrapper-->
        <!--begin::Purchase-->
        <!--end::Purchase-->
      </div>
      <!--end::Content-->
    </div>
@endsection

@section('script')
<script>
	var map; 
  var btnjatim;
  var btnopor;
  var baselayer;
  var mylocation;  
  var menubtn; 
  var opors = [];
  var cases_aktif = []; var btnaktif;
  var cases_proses = []; var btnproses;
  var cases_selesai = []; var btnselesai;
      function initMap() {
        btnjatim = document.getElementById("jawa_timur")
        btnjatim.addEventListener("click",function(){
          if (btnjatim.checked){
            baselayer.setMap(map);
          }
          else
          {
            baselayer.setMap(null);
          }
        });
        btnopor = document.getElementById("opor")
        btnopor.addEventListener("click",function(){
          if (btnopor.checked){
            for(var i = 0; i < opors.length; i++){
              opors[i].setVisible(true);
            }
          }
          else
          {
            for(var i = 0; i < opors.length; i++){
              opors[i].setVisible(false);
            }
          }
        });
        menubtn = document.getElementById("kt_demo_panel_toggle");
        menubtn.textContent = "MENU";
        menubtn.classList.add("custom-map-control-button");
        menubtn.setAttribute("id", "kt_demo_panel_toggle");
        menubtn.type = 'button';
        var infowindow = new google.maps.InfoWindow();
        var myLatLng = new google.maps.LatLng(-7.9666200, 112.6326600);
        var mapOptions = {
          zoom: 8,
          center: myLatLng,
  				mapTypeId: 'hybrid'
        };
        map = new google.maps.Map(document.getElementById("map"), mapOptions);
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(menubtn); 
      baselayer = new google.maps.Data();
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
          // position: { lat: -7.9666200, lng: 112.6326600 },
          map: map,
          // icon:'{{asset('js/icon/mylock.gif')}}'
        });

       var cased;
        var array_cased = {!!$cased!!};
       for(var i = 0; i < array_cased.length; i++){
        var koordinat = JSON.parse(array_cased[i].koordinat);
          if(array_cased[i].status <= 1){
            cased = new google.maps.Marker({
              position: { lat: koordinat[0], lng: koordinat[1] },
              map: map,
              icon:'{{ asset('js/icon/red.png')}}',
              draggable: false,
            });
            cased_aktif.push(cased)
          }
          else if(array_cased[i].status > 1 && array_cased[i].status < 5){
            cased = new google.maps.Marker({
              position: { lat: koordinat[0], lng: koordinat[1] },
              map: map,
              icon:'{{ asset('js/icon/yellow.png')}}',
              draggable: false,
            });
            cases_proses.push(cased)
          }
          else if(array_cased[i].status == 5){
            cased = new google.maps.Marker({
              position: { lat: koordinat[0], lng: koordinat[1] },
              map: map,
              icon:'{{ asset('js/icon/green.png')}}',
              draggable: false,
            });
            cases_selesai.push(cased)
          }
          google.maps.event.addListener(cased, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(array_cased[i].judul);
              infowindow.open(map, marker);
            }
          })(cased, i));
       }

       var opor; var array_opor = {!!$opor!!}
       for(var i = 0; i < array_opor.length; i++){
        var koordinat = JSON.parse(array_opor[i].koordinat_fix);
          opor = new google.maps.Marker({
            position: { lat: koordinat[0], lng: koordinat[1] },
            map: map,
            draggable: false,
            icon:'{{ asset('js/icon/blue.png') }}', // anchor
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
          opors.push(opor)
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
	// getLocation()
})
</script>
@endsection