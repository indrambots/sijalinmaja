@extends('layouts.app_peta')
@section('content')
<style type="text/css">
  #tabel_peta td {

    padding-bottom:3px;    
    padding-top:3px;
    padding-left:5px;
  }
</style>
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

           {{-- <div class="card">
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
           </div> --}}

           <div class="card">
            <div class="card-header">
             <div class="card-title collapsed" data-toggle="collapse" data-target="#kebakaranTab">
              <i class="flaticon-danger"></i> Kebakaran dan Non Kebakaran
             </div>
            </div>
            <div id="kebakaranTab" class="collapse" data-parent="#accordionExample4">
             <div class="card-body">
              <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                Kebakaran
                <input type="checkbox" checked="checked" name="kebakaran" id="kebakaran">
              <span></span></label>
              <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary">
                Non Kebakaran
                <input type="checkbox" checked="checked" name="nonkebakaran" id="nonkebakaran">
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
  var kebakarans = []; var btnkebakaran;
  var nonkebakarans = []; var btnnonkebakaran;
  var cases_aktif = []; var btnaktif;
  var cases_proses = []; var btnproses;
  var cases_selesai = []; var btnselesai;
  function initMap() 
{
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
        // btnopor = document.getElementById("opor")
        // btnopor.addEventListener("click",function(){
        //   if (btnopor.checked){
        //     for(var i = 0; i < opors.length; i++){
        //       opors[i].setVisible(true);
        //     }
        //   }
        //   else
        //   {
        //     for(var i = 0; i < opors.length; i++){
        //       opors[i].setVisible(false);
        //     }
        //   }
        // });

        btnkebakaran = document.getElementById("kebakaran")
        btnkebakaran.addEventListener("click",function(){
          if (btnkebakaran.checked){
            for(var i = 0; i < kebakarans.length; i++){
              kebakarans[i].setVisible(true);
            }
          }
          else
          {
            for(var i = 0; i < kebakarans.length; i++){
              kebakarans[i].setVisible(false);
            }
          }
        });

        btnnonkebakaran = document.getElementById("nonkebakaran")
        btnnonkebakaran.addEventListener("click",function(){
          if (btnnonkebakaran.checked){
            for(var i = 0; i < kebakarans.length; i++){
              nonkebakarans[i].setVisible(true);
            }
          }
          else
          {
            for(var i = 0; i < kebakarans.length; i++){
              nonkebakarans[i].setVisible(false);
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
            console.log(array_cased[i])
            cased = new google.maps.Marker({
              position: { lat: koordinat[0], lng: koordinat[1] },
              map: map,
              icon:'{{ asset('js/icon/red.png')}}',
              draggable: false,
            });
            cases_aktif.push(cased)
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
            console.log(array_cased[i])
              infowindow.setContent(`<strong>`+array_cased[i].judul+`</strong>
                <table id="tabel_peta">
                  <tr> 
                    <td><strong>Lokasi</strong></td>
                    <td>`+array_cased[i].lokasi_kejadian+`,`+array_cased[i].lokasi_kejadian+`, `+array_cased[i].kota_nama+`, `+array_cased[i].kec_nama +`, `+array_cased[i].kel_nama+`</td>
                  </tr>
                  <tr> 
                    <td><strong>Pelanggar</strong></td>
                    <td>`+array_cased[i].nama_pelanggar+`</td>
                  </tr>
                  <tr> 
                    <td><strong>Urusan</strong></td>
                    <td>`+array_cased[i].urusan+`</td>
                  </tr>
                  <tr> 
                    <td><strong>Jenis Trantibum</strong></td>
                    <td>`+array_cased[i].jenis_trantib+`</td>
                  </tr>
                  <tr> 
                    <td><strong>Potensi PAD</strong></td>
                    <td class="rupiah">`+formatRupiah(array_cased[i].potensi_pad)+`</td>
                  </tr>
                  <tr> 
                    <td><strong>Waktu Kejadian</strong></td>
                    <td>`+array_cased[i].waktu_kejadian+`</td>
                  </tr>
                  <tr> 
                    <td><strong>Pelapor</strong></td>
                    <td>`+array_cased[i].pelapor+` (`+array_cased[i].no_telp_pelapor+`)</td>
                  </tr>
                  <tr> 
                    <td><strong>Sumber Informasi</strong></td>
                    <td>`+array_cased[i].sumber_informasi+`</td>
                  </tr>
                  <tr> 
                    <td><strong>Tanggal Informasi</strong></td>
                    <td>`+array_cased[i].tanggal_informasi+`</td>
                  </tr>
                 </table>`);
              infowindow.open(map, marker);
            }
          })(cased, i));
       }

        var kebakaran; var array_kebakaran = {!!$kebakaran!!}
       var nonkebakaran; var array_nonkebakaran = {!!$nonkebakaran!!}
        for(var i = 0; i < array_nonkebakaran.length; i++){
        var koordinat = JSON.parse(array_nonkebakaran[i].koordinat);
            nonkebakaran = new google.maps.Marker({
              position: { lat: koordinat[0], lng: koordinat[1] },
              map: map,
              icon:'{{ asset('js/icon/nonflame.png')}}',
              draggable: false,
            });
            nonkebakarans.push(nonkebakaran)
          google.maps.event.addListener(nonkebakaran, 'click', (function(marker, i) {
            return function() {
              infowindow.setContent(`<strong>Kejadian `+array_nonkebakaran[i].jenis_kejadian+`</strong> <br>
                <table>
                  <tr>
                  <th>Tanggal Kejadian</th>
                  <td>`+array_nonkebakaran[i].tanggal_kejadian+`</td>
                  </tr>
                  <tr>
                  <th>Tanggal Kejadian</th>
                  <td>`+array_nonkebakaran[i].lokasi_kejadian+`</td>
                  </tr>
                  <tr>
                  <th>Jenis Objek</th>
                  <td>`+array_nonkebakaran[i].jenis_objek+`</td>
                  </tr>
                  <tr>
                  <th>Objek</th>
                  <td>`+array_nonkebakaran[i].objek+`</td>
                  </tr>
                  <tr>
                  <th>Sumber Kejadian</th>
                  <td>`+array_nonkebakaran[i].sumber+`</td>
                  </tr>
                  <tr>
                  <th>Jumlah Korban</th>
                  <td>`+array_nonkebakaran[i].korban+`</td>
                  </tr>
                  <tr>
                  <th>Jumlah Armada</th>
                  <td>`+array_nonkebakaran[i].jumlah_armada+`</td>
                  </tr>
                  <tr>
                  <th>Jumlah Personel</th>
                  <td>`+array_nonkebakaran[i].jumlah_personel+`</td>
                  </tr>
                  <tr>
                  <th>Sumber Berita</th>
                  <td>`+array_nonkebakaran[i].sumber_berita+`</td>
                  </tr>
                  <tr>
                  <th>Kendala</th>
                  <td>`+array_nonkebakaran[i].kendala+`</td>
                  </tr>
                  <tr>
                  <th>Keterangan lain</th>
                  <td>`+array_nonkebakaran[i].keterangan+`</td>
                  </tr>
                </table>`);
              infowindow.open(map, marker);
              array_nonkebakaran[i].objek
            }
          })(nonkebakaran, i));
       }
       console.log(array_kebakaran)
       var reg = new RegExp("^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}");
        for(var i = 0; i < array_kebakaran.length; i++){
        var koordinat = JSON.parse(array_kebakaran[i].koordinat);
            kebakaran = new google.maps.Marker({
              position: { lat: koordinat[0], lng: koordinat[1] },
              map: map,
              icon:'{{ asset('js/icon/flame.png')}}',
              draggable: false,
            });
            kebakarans.push(kebakaran)
          google.maps.event.addListener(kebakaran, 'click', (function(marker, i) {
            return function() {
            console.log(array_kebakaran[i])
              infowindow.setContent(`<strong>Kejadian `+array_kebakaran[i].jenis_kejadian+`</strong> <br>
                <table>
                  <tr>
                  <th>Tanggal Kejadian</th>
                  <td>`+array_kebakaran[i].tanggal_kejadian+`</td>
                  </tr>
                  <tr>
                  <th>Tanggal Kejadian</th>
                  <td>`+array_kebakaran[i].lokasi_kejadian+`</td>
                  </tr>
                  <tr>
                  <th>Jenis Objek</th>
                  <td>`+array_kebakaran[i].jenis_objek+`</td>
                  </tr>
                  <tr>
                  <th>Objek</th>
                  <td>`+array_kebakaran[i].objek+`</td>
                  </tr>
                  <tr>
                  <th>Sumber Kebakaran</th>
                  <td>`+array_kebakaran[i].sumber+`</td>
                  </tr>
                  <tr>
                  <th>Jumlah Korban</th>
                  <td>`+array_kebakaran[i].korban+`</td>
                  </tr>
                  <tr>
                  <th>Jumlah Armada</th>
                  <td>`+array_kebakaran[i].jumlah_armada+`</td>
                  </tr>
                  <tr>
                  <th>Jumlah Personel</th>
                  <td>`+array_kebakaran[i].jumlah_personel+`</td>
                  </tr>
                  <tr>
                  <th>Sumber Berita</th>
                  <td>`+array_kebakaran[i].sumber_berita+`</td>
                  </tr>
                  <tr>
                  <th>Kendala</th>
                  <td>`+array_kebakaran[i].kendala+`</td>
                  </tr>
                  <tr>
                  <th>Keterangan lain</th>
                  <td>`+array_kebakaran[i].keterangan+`</td>
                  </tr>
                </table>`);
              infowindow.open(map, marker);
              array_kebakaran[i].objek
            }
          })(kebakaran, i));
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

  function formatRupiah(bilangan){
    var number_string = bilangan.toString()
    console.log(number_string)
      sisa  = number_string.length % 3,
      rupiah  = number_string.substr(0, sisa),
      ribuan  = number_string.substr(sisa).match(/\d{3}/g);
        
    if (ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }
    return rupiah;
  }
$(document).ready(function(){
	// getLocation()
})
</script>
@endsection