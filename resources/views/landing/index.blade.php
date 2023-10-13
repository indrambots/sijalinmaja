@extends('layouts.app_landing')
@section('content')
<div class="main_slider_wrapper slider-area">
            <div class="shape_top_header">

                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="486px" height="344.999px" viewBox="0 0 486 344.999" enable-background="new 0 0 486 344.999" xml:space="preserve">
                    <g id="BACKGROUND_2">
                    </g>
                    <g id="BACKGROUND_1">
                    </g>
                    <g id="DESIGNED_BY_FREEPIK">
                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#20c997" d="M0,344.999V0h486c0,0-74.201,168.502-221,165.998
        C118.201,163.494,32.721,226.949,0,344.999z" />
                        <path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd" fill="#a3fbe1" d="M354.1,0.999c0,0-69.616,226.501-242,224
        C64.547,221.375,11.816,246.264,0.1,251c-0.225-23.656,0-251,0-251L354.1,0.999z" />
                    </g>
                </svg>
            </div>
            <div class="top_righ_shape">

                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="1026.006px" height="846.013px" viewBox="0 0 1026.006 846.013" enable-background="new 0 0 1026.006 846.013" xml:space="preserve">
                    <g id="BACKGROUND_5">
                    </g>
                    <g id="BACKGROUND_4">
                    </g>
                    <g id="DESIGNED_BY_FREEPIK1">
                        <path id="shape1" fill-rule="evenodd" clip-rule="evenodd" fill="#a3fbe1" d="M32.549,0c0,0-100.091,133.221,50.767,204.402
        c57.884,26.133,177.617-8.613,195.383,236.479c2.771,74.912,78.289,144.637,191.985,137.805
        c113.697-6.834,150.346,151.813,227.664,202.453c77.318,50.64,160.75,85.168,327.658,51.465c-0.519-166.928,0-832.604,0-832.604
        H32.549z"></path>
                        <path id="shape2" fill-rule="evenodd" clip-rule="evenodd" fill="#6ee9c5" d="M149.008,0c0,0,20.801,69.754,172.293,34.349
        c57.863-13.34,413.253-78.83,520.664,158.849c44.697,86.629,46.218,146.645,56.8,219.361S955.56,646.686,1025.662,700
        c0.774-111.96,0-700,0-700H149.008z"></path>
                    </g>
                </svg>

            </div>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="carousel-captions caption-1">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                                        <div class="slider_main_img_wrapper">
                                            <img src="{{ asset('assets/landing/images/ibu.png')}}" alt="slider_img" style="width:746px;">
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                                        <div class="content">

                                            <h2 data-animation="animated bounceInUp">SIJALINMAJA</h2>

                                            <p data-animation="animated bounceInUp">Sistem Integrasi Jaga Lindungi Masyarakat. <br>Sajian data Ketentraman dan Ketertiban Umum serta Pemadam Kebakaran dan Penyelamatan Se-Jawa Timur.</p>
                                            <div class="header_btn slider_btn full_width">
                                                <ul>
                                                    <li data-animation="animated bounceInLeft">
                                                        <a href="{{ url('login') }}">LOGIN</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider wrapper end-->
    </div>
    <div data-scroll='1' class="full_width">
        
        <!-- services wrapper start-->
        <div class="sp_category_wrapper full_width animated-row">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 animate" data-animate="fadeInUp">
                        <div class="sp_heading_wraper">

                            <h3>Peta Rawan Gangguan Ketentraman dan Ketertiban Umum serta Kebakaran dan Non Kebakaran</h3>
                        </div>
                    </div>
                   
                    <div class="col-lg-12 col-md-12 col-sm-12 animate" data-animate="fadeInUp">
                        <div id="map_trantibum" style="width:100%; height:800px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- services wrapper end-->
    <!--about us wrapper start-->
    <div data-scroll='2' class="full_width" style="margin-bottom: 200px;">
        <!--about us wrapper end-->
        <div class="testimonial_wrapper full_width">
            <div class="testi_shape2">

                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="892.992px" height="804.02px" viewBox="0 0 892.992 804.02" enable-background="new 0 0 892.992 804.02" xml:space="preserve">
                    <g id="BACKGROUND2">
                    </g>
                    <g id="BACKGROUND1">
                    </g>
                    <g id="DGPIK">
                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#cbfff0" d="M53.5,748.734c0,0-117.32-93.501-4.494-169.878
        c30.723-23.512,156.328,5.582,172.296-214.713c2.489-67.333,70.367-130.004,172.56-123.863
        c102.191,6.143,135.133-136.453,204.627-181.97c69.495-45.517,144.484-76.552,294.504-46.258c-0.467,150.038,0,676.46,0,676.46
        S508.023,822.896,281.799,801.765C86.444,783.518,53.5,748.734,53.5,748.734z" />
                    </g>
                </svg>

            </div>

            <div id="testimonial-section" class="testimonial-bg" >

                <div id="container-general" class="ready anim-section-features anim-section-desc anim-section-quote">

                    <div id="section-quote">
                        <!--Center Testimonials-->
                        <div class="container-quote" style="margin-top: 0px; margin-bottom: 400px;">
                            <h3>Pelanggaran Gangguan Trantibum Berdasarkan Urusan</h3>
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <div id="jenis_pelanggaran"></div>
                                </div>
                            </div>
                        </div>

                        <!--Right Bubble Images-->
                        <div class="container-pe-quote right">
                            <div class="pp-quote li-quote-7" style="height: 100px; width: 100px;" >
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-8" style="height: 100px; width: 100px;">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-9" style="height: 100px; width: 100px;">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-10" style="height: 100px; width: 100px;">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-13" style="height: 100px; width: 100px;">
                                <div class="img animated bounce"></div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div data-scroll='3' class="full_width" style="margin-bottom:200px;">
        <!--about us wrapper end-->
        <div class="testimonial_wrapper full_width">
            <div class="testi_shape1">

                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="811.241px" height="806.584px" viewBox="0 0 811.241 806.584" enable-background="new 0 0 811.241 806.584" xml:space="preserve">
                    <g id="BACKGROUN">
                    </g>
                    <g id="BACKGROUN1">
                    </g>
                    <g id="DESIGNED_BY">
                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#e2ffd9" d="M1.667,148.974c0,0-43.346,344.303,312.017,592.622
        c81.672,52.459,147.443,129.156,333.018-31.758c88.138-86.176,201.525-218.85,152.834-398.592
        C779.605,233.893,608.176,27.593,338.502,3.692C137.706-9.618,49.979,7.463,1.667,148.974z" />
                    </g>
                </svg>
            </div>

            <div id="testimonial-section" class="testimonial-bg">

                <div id="container-general" class="ready anim-section-features anim-section-desc anim-section-quote">

                    <div id="section-quote">
                        <!--Center Testimonials-->
                        <div class="container-quote" style="margin-top: 0px; margin-bottom: 400px;">
                            <h3>Jumlah Pelanggaran Trantibum di Jawa Timur</h3>
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <div id="kab_pelanggar"></div>
                                </div>
                            </div>
                        </div>

                        <!--Right Bubble Images-->
                        <div class="container-pe-quote left">
                            <div class="pp-quote li-quote-1" data-textquote="quote-text-1">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-2" data-textquote="quote-text-2">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-3" data-textquote="quote-text-3">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-5" data-textquote="quote-text-5">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-6" data-textquote="quote-text-6">
                                <div class="img animated bounce"></div>
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

     <div data-scroll='3' class="full_width" >
        <!--about us wrapper end-->
        <div class="testimonial_wrapper full_width">
            <div class="testi_shape2">

                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="892.992px" height="804.02px" viewBox="0 0 892.992 804.02" enable-background="new 0 0 892.992 804.02" xml:space="preserve">
                    <g id="BACKGROUND2">
                    </g>
                    <g id="BACKGROUND1">
                    </g>
                    <g id="DGPIK">
                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#cbfff0" d="M53.5,748.734c0,0-117.32-93.501-4.494-169.878
        c30.723-23.512,156.328,5.582,172.296-214.713c2.489-67.333,70.367-130.004,172.56-123.863
        c102.191,6.143,135.133-136.453,204.627-181.97c69.495-45.517,144.484-76.552,294.504-46.258c-0.467,150.038,0,676.46,0,676.46
        S508.023,822.896,281.799,801.765C86.444,783.518,53.5,748.734,53.5,748.734z" />
                    </g>
                </svg>

            </div>

            <div id="testimonial-section" class="testimonial-bg" >

                <div id="container-general" class="ready anim-section-features anim-section-desc anim-section-quote">

                    <div id="section-quote">
                        <!--Center Testimonials-->
                        <div class="container-quote" style="margin-top: 0px; height:auto;">
                            <h3>Statistik Kerawanan Kejadian Kebakaran di Jawa Timur</h3>
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <div id="kebakaran_jatim"></div>
                                </div>
                            </div>
                        </div>

                        <!--Right Bubble Images-->
                        <div class="container-pe-quote right">
                            <div class="pp-quote li-quote-7" style="height: 100px; width: 100px;" >
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-8" style="height: 100px; width: 100px;">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-9" style="height: 100px; width: 100px;">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-10" style="height: 100px; width: 100px;">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-13" style="height: 100px; width: 100px;">
                                <div class="img animated bounce"></div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div data-scroll='4' class="full_width">
        <!--about us wrapper end-->
        <div class="testimonial_wrapper full_width">
            <div class="testi_shape1">

                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="811.241px" height="806.584px" viewBox="0 0 811.241 806.584" enable-background="new 0 0 811.241 806.584" xml:space="preserve">
                    <g id="BACKGROUN">
                    </g>
                    <g id="BACKGROUN1">
                    </g>
                    <g id="DESIGNED_BY">
                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#e2ffd9" d="M1.667,148.974c0,0-43.346,344.303,312.017,592.622
        c81.672,52.459,147.443,129.156,333.018-31.758c88.138-86.176,201.525-218.85,152.834-398.592
        C779.605,233.893,608.176,27.593,338.502,3.692C137.706-9.618,49.979,7.463,1.667,148.974z" />
                    </g>
                </svg>
            </div>

            <div id="testimonial-section" class="testimonial-bg">

                <div id="container-general" class="ready anim-section-features anim-section-desc anim-section-quote">

                    <div id="section-quote">
                        <!--Center Testimonials-->
                        <div class="container-quote" style="margin-top: 0px; margin-bottom:600px;">
                            <h3>Statistik Sumber Penyebab Kebakaran di Jawa Timur</h3>
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <div id="sumber_kebakaran"></div>
                                </div>
                            </div>
                        </div>

                        <!--Right Bubble Images-->
                        <div class="container-pe-quote left">
                            <div class="pp-quote li-quote-1" data-textquote="quote-text-1">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-2" data-textquote="quote-text-2">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-3" data-textquote="quote-text-3">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-5" data-textquote="quote-text-5">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-6" data-textquote="quote-text-6">
                                <div class="img animated bounce"></div>
                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

     <div data-scroll='5' class="full_width" >
        <!--about us wrapper end-->
        <div class="testimonial_wrapper full_width">
            <div class="testi_shape2">

                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="892.992px" height="804.02px" viewBox="0 0 892.992 804.02" enable-background="new 0 0 892.992 804.02" xml:space="preserve">
                    <g id="BACKGROUND2">
                    </g>
                    <g id="BACKGROUND1">
                    </g>
                    <g id="DGPIK">
                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#cbfff0" d="M53.5,748.734c0,0-117.32-93.501-4.494-169.878
        c30.723-23.512,156.328,5.582,172.296-214.713c2.489-67.333,70.367-130.004,172.56-123.863
        c102.191,6.143,135.133-136.453,204.627-181.97c69.495-45.517,144.484-76.552,294.504-46.258c-0.467,150.038,0,676.46,0,676.46
        S508.023,822.896,281.799,801.765C86.444,783.518,53.5,748.734,53.5,748.734z" />
                    </g>
                </svg>

            </div>

            <div id="testimonial-section" class="testimonial-bg" >

                <div id="container-general" class="ready anim-section-features anim-section-desc anim-section-quote">

                    <div id="section-quote">
                        <!--Center Testimonials-->
                        <div class="container-quote" style="margin-top: 0px; height:auto;">
                            <h3>Standar Operasional Prosedur (SOP) Satpol PP Provinsi Jawa Timur</h3>
                            <div class="row mt-2">
                                <div class="col-md-8 offset-md-2">
                                    <iframe src="https://drive.google.com/file/d/1NJ9H_k6GTglHFg_7eI_wOo8wm_Wv4bMc/preview" width="80%" height="480" allow="autoplay"></iframe>
                                </div>
                            </div>
                        </div>

                        <!--Right Bubble Images-->
                        <div class="container-pe-quote right">
                            <div class="pp-quote li-quote-7" style="height: 100px; width: 100px;" >
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-8" style="height: 100px; width: 100px;">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-9" style="height: 100px; width: 100px;">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-10" style="height: 100px; width: 100px;">
                                <div class="img animated bounce"></div>
                            </div>

                            <div class="pp-quote li-quote-13" style="height: 100px; width: 100px;">
                                <div class="img animated bounce"></div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- newsletter wrapper start-->
@endsection
@section('script')
<script>
    var map; 
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
        var infowindow = new google.maps.InfoWindow();
        var myLatLng = new google.maps.LatLng(-7.9666200, 112.6326600);
        var mapOptions = {
          zoom: 8,
          center: myLatLng,
                mapTypeId: 'hybrid'
        };
        map = new google.maps.Map(document.getElementById("map_trantibum"), mapOptions);
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

       var nonkebakaran; var array_nonkebakaran = {!!$nonkebakaran!!}
       console.log(array_nonkebakaran.length)
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
       console.log(nonkebakarans.length)
       // 
       // for(var i = 0; i < array_opor.length; i++){
       //  var koordinat = JSON.parse(array_opor[i].koordinat_fix);
       //    opor = new google.maps.Marker({
       //      position: { lat: koordinat[0], lng: koordinat[1] },
       //      map: map,
       //      draggable: false,
       //      icon:'{{ asset('js/icon/blue.png') }}', // anchor
       //      scaledSize: new google.maps.Size(22, 27), // scaled size
       //      origin: new google.maps.Point(0,0), // origin
       //      anchor: new google.maps.Point(0, 0)
       //    });
       //    google.maps.event.addListener(opor, 'click', (function(marker, i) {
       //      return function() {
       //        infowindow.setContent(array_opor[i].nama_tempat);
       //        infowindow.open(map, marker);
       //      }
       //    })(opor, i));
       //    opors.push(opor)
       // }

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
      var options = {
          series: [{
          data: {!! $urusan_jumlah_kasus !!}
        }],
          chart: {
          type: 'bar',
          height: 500
        },
         fill: {
          type: 'gradient',
          gradient: {
            shade: 'dark',
            gradientToColors: [ '#FDD835'],
            shadeIntensity: 1,
            type: 'horizontal',
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100, 100, 100]
          },
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: true
        },
        xaxis: {
          categories: {!! $urusan_kasus !!}
        }
        };

        var chart = new ApexCharts(document.querySelector("#jenis_pelanggaran"), options);
        chart.render();

        var options_kab = {
          series: [{
          data: {!! $kab_jumlah !!}
        }],
          chart: {
          type: 'bar',
          height: 500
        },
         fill: {
          type: 'gradient',
          gradient: {
            shade: 'dark',
            gradientToColors: [ '#FDD835'],
            shadeIntensity: 1,
            type: 'horizontal',
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100, 100, 100]
          },
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: true
        },
        xaxis: {
          categories: {!! $kota_nama !!}
        },

        yaxis: {
            reversed: true
        }
        };

        var chart_kab = new ApexCharts(document.querySelector("#kab_pelanggar"), options_kab);
        chart_kab.render();


        var options_kebakaran = {
          series: [{
          data: {!! $kebakaran_jumlah !!}
        }],
          chart: {
          type: 'bar',
          height: 500
        },
         fill: {
          type: 'gradient',
          gradient: {
            shade: 'dark',
            gradientToColors: [ '#FDD835'],
            shadeIntensity: 1,
            type: 'horizontal',
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100, 100, 100]
          },
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: true
        },
        xaxis: {
          categories: {!! $kebakaran_nama_kab !!}
        },
        yaxis: {
            reversed: true
        }
        };

        var chart_kebakaran = new ApexCharts(document.querySelector("#kebakaran_jatim"), options_kebakaran);
        chart_kebakaran.render();



        var options_sumber_kebakaran = {
          series: [{
          data: {!! $sumber_jumlah !!}
        }],
          chart: {
          type: 'bar',
          height: 500
        },
         fill: {
          type: 'gradient',
          gradient: {
            shade: 'dark',
            gradientToColors: [ '#FDD835'],
            shadeIntensity: 1,
            type: 'horizontal',
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100, 100, 100]
          },
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: true
        },
        xaxis: {
          categories: {!! $sumber_nama !!}
        },
        yaxis: {
            reversed: false
        }
        };

        var chart_sumber_kebakaran = new ApexCharts(document.querySelector("#sumber_kebakaran"), options_sumber_kebakaran);
        chart_sumber_kebakaran.render();
})
</script>
@endsection