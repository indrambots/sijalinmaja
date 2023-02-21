<!DOCTYPE html>
<html lang="en">
    <!--begin::Head-->
    <head><base href="">
        <meta charset="utf-8" />
        <title>SIJALINMAJA</title>
        <meta name="description" content="Updates and statistics" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name       = "csrf-token" content="{{ csrf_token() }}">
        <meta name       = "base_url" content="{{ url('/') }}">
  <link rel        = "shortcut icon" href="{{ asset('images/logo/logo-sby.png') }}">
  <link rel="canonical" href="https://keenthemes.com/metronic" />
        <!--begin::Fonts-->

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!--end::Fonts-->
        <!--begin::Page Vendors Styles(used by this page)-->
        <link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
        {{-- <meta http-equiv="X-Frame-Options" content="SAMEORIGIN"> --}}
        <!--end::Page Vendors Styles-->
        <!--begin::Global Theme Styles(used by all pages)-->
        <link href="{{ asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/pemetaan.css')}}" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/devextreme/21.1.5/css/dx.light.css" rel="stylesheet">

        {{-- <link data-theme="generic.light" href="{{ asset('plugins/devex/css/dx.light.css')}}" data-active="true"/>
        <link href="{{ asset('plugins/devex/css/dx.common.css')}}"/> --}}

        <!--end::Global Theme Styles-->
        <!--begin::Layout Themes(used by all pages)-->
        <!--end::Layout Themes-->
        <style type="text/css">
            .exs{
              background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' stroke='%23505050D1' stroke-width='4' stroke-dasharray='14%2c 23%2c 16' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
            }
            td.details-control {
    background: url('{{ asset("img/icon/details_open.png") }}') no-repeat center center;
    cursor: pointer;
}
tr.details td.details-control {
    background: url('{{ asset("img/icon/details_close.png") }}') no-repeat center center;
}
@media only screen and (max-width: 768px) {

    .card-body {
      padding: 1rem !important;
    }
}
.exs{
              background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' stroke='%23505050D1' stroke-width='4' stroke-dasharray='14%2c 23%2c 16' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
            } 
            .custom-map-control-button {
  background-color: #fff;
  border: 0;
  border-radius: 2px;
  box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
  margin: 10px;
  padding: 0 0.5em;
  font: 400 18px Roboto, Arial, sans-serif;
  overflow: hidden;
  height: 40px;
  cursor: pointer;
}
.custom-map-control-button:hover {
  background: rgb(235, 235, 235);
}
        </style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-44S1H0GN2F"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-44S1H0GN2F');
</script>
    </head>
    <!--end::Head-->
    <!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed page-loading">
        <!--begin::Main-->
        <!--begin::Header Mobile-->
<!--end::Header Mobile-->
            @yield('content')
        <!--end::Main-->
        <!-- begin::User Panel-->

        <!-- end::User Panel-->
        <!--begin::Quick Panel-->

        <!--end::Quick Panel-->
        <!--begin::Chat Panel-->
        <!--end::Chat Panel-->
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop">
            <span class="svg-icon">
                <!--begin::Svg Icon | path:media/svg/icons/Navigation/Up-2.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </div>

        <div style="position: fixed; width:100%;height:100%; top:0px; left:0px;z-index:200000;background-color:rgba(0,0,0,0.6);" class="d-none" id="loading">
            <img src="{{asset('GSA/img/loading.gif')}}" style="position: absolute;z-index:10; top:0; bottom:0;left:0;right:0; margin:auto; width:5%;">
        </div>
        <!--end::Scrolltop-->
        <!--begin::Sticky Toolbar-->
        <!--end::Sticky Toolbar-->
        <!--begin::Demo Panel-->
        <!--end::Demo Panel-->
        <!--begin::Global Config(global config for global JS scripts)-->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#0BB783", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#D7F9EF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
        <!--end::Global Config-->
        <!--begin::Global Theme Bundle(used by all pages)-->
        <script src = "{{ asset('js/default/axios.js') }}"></script>
        <script src="{{ asset('plugins/global/plugins.bundle.js')}}"></script>
        <script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
        <script src="{{ asset('plugins/forms/submit/jquery.form.js')}}"></script>
        <script src="{{ asset('js/scripts.bundle.js')}}"></script>
        <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
        <!--end::Global Theme Bundle-->
        <!--begin::Page Vendors(used by this page)-->
        <script src="{{ asset('js/pages/features/miscellaneous/sweetalert2.js')}}"></script>
        <script src="{{ asset('js/pages/features/miscellaneous/toastr.js')}}"></script>
        <script src="{{ asset('plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
        <!--end::Page Vendors-->
        <!--begin::Page Scripts(used by this page)-->
        <script src={{ asset('js/pages/jquery.number.js') }}></script>
        <script src="{{ asset('js/pages/widgets.js')}}"></script>
        <script src="{{ asset('plugins/devex/js/jszip.min.js')}}"></script>
        <script src="{{ asset('plugins/devex/js/dx.all.js')}}"></script>
        <script src = "{{ asset('js/jquery.countdown.min.js') }}"></script>
        <script src = "{{ asset('js/livewireGlobalVariable.js') }}"></script>
        <script>
            $.ajaxSetup({headers: {'X-CSRF-TOKEN':  document.querySelector('meta[name="csrf-token"]').content }});
        </script>
        <script type="text/javascript">
            var timertyping = null;
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "2000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            };
            $('.select2').select2({
        });
            var base_url = "{{ url('/') }}";
            $('.rupiah').number(true)

var loadPanel = $(".loadpanel").dxLoadPanel({
        shadingColor: "rgba(0,0,0,0.4)",
        position: { of: "#awb" },
        visible: false,
        showIndicator: true,
        showPane: true,
        shading: true,
        closeOnOutsideClick: false,
        onShown: function(){
            setTimeout(function () {
                loadPanel.hide();
            }, 2000);
        },
        onHidden: function(){
        }
    }).dxLoadPanel("instance");
    $('.datepicker').datepicker({
               rtl: KTUtil.isRTL(),
               todayHighlight: true,
               orientation: "bottom left",
               autoclose: true,
               format:'yyyy-mm-dd'
              });
      $('.timepickers').timepicker({
   minuteStep: 1,
   defaultTime: '',
   showSeconds: false,
   showMeridian: false,
   snapToStep: true
  });
    $('.datepicker_readonly').datepicker({
               rtl: KTUtil.isRTL(),
               todayHighlight: true,
               orientation: "bottom left",
               minDate: 0,
               maxDate:0,
              }).attr('readonly','readonly');
        </script>
        @yield('script')
        <!--end::Page Scripts-->
        <script type="text/javascript">
            $(document).ajaxStart(function () {
                $('#loading').removeClass('d-none')
            }).ajaxStop(function () {
                $('#loading').addClass('d-none')
            });
            $( document ).ready(function() {
                $('[data-toggle="popover"]').popover()
            });
        </script>
    </body>

@if(Session::get('message') == "Password Updated")
<script type="text/javascript">
    toastr.success("Password berhasil dirubah!");
</script>
@endif
    <!--end::Body-->
@stack('scriptTambahan')
<script src = "{{ asset('js/default/alpinejs.js') }}"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyB6fouhBbFhJmgiFuFNFuYAtfF7Sy_VxDg&libraries=places&callback=initMap"></script>
</html>
