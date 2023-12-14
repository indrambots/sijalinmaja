<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/logo/sigap.png') }}">
    <meta name="description" content="Sistem Integrasi Jaga Lindungi Masyarakat Jawa Timur" />
    <meta name="keywords" content="Sistem Integrasi Jaga Lindungi Masyarakat Jawa Timur SIJALINMAJA" />
    <meta name="author" content="Satpol PP Provinsi Jawa Timur" />


    <link href="{{ asset('assets/landing/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/landing/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- font-awesome -->
    <link href="{{ asset('assets/landing/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Web Fonts -->
    <link href="{{ asset('assets/landing/css/fonts.css')}}" rel="stylesheet">
    <!-- Flaticon Css -->
    <link href="{{ asset('assets/landing/flaticon/flaticon.css')}}" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="{{ asset('assets/landing/css/owl.theme.default.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/landing/css/owl.carousel.css')}}" rel="stylesheet">
    <!-- Style CSS -->
    <link href="{{ asset('assets/landing/css/style.css')}}" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="{{ asset('assets/landing/css/responsive.css')}}" rel="stylesheet">
    <style type="text/css">
        .menu_fixed
        {
            background-color:white;
                box-shadow: 0px 0px 10px rgba(0,0,0,0.15)!important;
        }
        .menu_fixed ul > li > a
        {
            color:#28a745;
        }
        .menu_fixed ul > .active > a
        {
            color:#28a745;
        }
        .main_menu_wrapper ul > li > a {
            font-weight:750;
        }

        body{
            overflow-x: hidden;
        }
    </style>
</head>

<body style="">

    <a href="javascript:" id="return-to-top"><i class="fas fa-arrow-up"></i> <br>top</a>

    <!-- Preloader start -->
    <div id="preloader">
        <div id="status">
            <div class="status-mes"></div>
        </div>
    </div>
    <!-- Preloader end -->

    <div data-scroll='0' class="full_width">
        <!-- serach-header start -->
        <div class="serach-header">
            <div class="searchbox">
                <button class="close">×</button>
                <form>
                    <input type="search" placeholder="Search …">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <!-- serach-header end -->
        <!--header Start-->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-6 col-lg-3">

                        <div class="logo_wrapper">
                            <a href="{{ url('') }}">
                                <img src="{{ asset('assets/logo/logo.png')}}" style="width:250px;" alt="" />
                            </a>
                        </div>

                        <div class="menu_fixed_logo">
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-9 col-md-9 col-sm-6 col-6 offset-xl-2 resp_main_heade">

                        <div class="main_menu_wrapper d-none d-sm-none d-md-none d-lg-block d-xl-block">
                            <nav class="menu_scroll">
                                <ul>
                                    <li><a href="{{ url('') }}">Home</a></li>
                                    <li><a target="_blank" href="{{ url('peta') }}">Peta</a></li>
                                    <li><a target="_blank" href="{{ url('kasandra') }}">Kasandra</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="menu_right_wrapper">
                            <div id="toggle" class="d-block d-sm-block d-md-block d-lg-none d-xl-none">
                                <button class="toggle_bar"><i class="fas fa-bars"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--header wrapper end-->
        <div id="sidebar" class="d-block d-sm-block d-md-block d-lg-none d-xl-none">
            <a class="sidebar_logo" href="#">
                <img src="images/agency_01/sidebar_logo.png" alt="">
            </a>
            <div id="toggle_close">&times;</div>
            <div id='cssmenu' class="menu_scroll">
                <ul class="sidebb">
                    <li><a href="{{ url('') }}">Home</a></li>
                    <li><a target="_blank" href="{{ url('peta') }}">Peta</a></li>
                    <li><a target="_blank" href="{{ url('kasandra') }}">Kasandra</a></li>
                    <li><a target="_blank" href="{{ url('login') }}">Login</a></li>
                </ul>
            </div>
        </div>
        <!-- responsive header end -->
        <!-- slider wrapper start-->
        @yield('content')
        <!--location wrapper end-->

        <!-- footer wrapper start-->

    <div data-scroll='4' class="full_width">
        <div class="footer_wrapper full_width" style="background: rgb(32,201,151);
background: linear-gradient(90deg, rgba(32,201,151,1) 0%, rgba(32,201,151,1) 38%, rgba(163,251,225,1) 100%);
    color: white;
    font-weight: 750;
">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sub-footer">
                            <p>Copyright © 2021 | Satuan Polisi Pamong Praja Pemerintah Provinsi Jawa Timur</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer wrapper end-->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- Bootstrap js -->
    <script src="{{ asset('assets/landing/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/bootstrap.min.js') }}"></script>
    <!-- Counter js -->
    <script src="{{ asset('assets/landing/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('assets/landing/js/jquery.inview.min.js') }}"></script>
    <!-- owl carousel js -->
    <script src="{{ asset('assets/landing/js/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/landing/js/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/jquery.magnific-popup.js') }}"></script>
    <!-- Custom js -->
    <script src="{{ asset('assets/landing/js/testimonial.js') }}"></script>
    <!-- Contact Form js -->
    <script src="{{ asset('assets/landing/js/contact_form.js') }}"></script>
    <script src="{{ asset('assets/landing/js/custom.js') }}"></script>
    <script src="{{ asset('assets/landing/plugin/apexcharts.js') }}"></script>
    @yield('script')

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyB6fouhBbFhJmgiFuFNFuYAtfF7Sy_VxDg&libraries=places&callback=initMap"></script>

</body>

</html>
