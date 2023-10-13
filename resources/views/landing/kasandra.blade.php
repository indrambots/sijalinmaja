@extends('layouts.app_landing')
@section('content')
{{ csrf_field() }}
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
                                            <img src="{{ asset('assets/landing/images/kasandra.png')}}" alt="slider_img" style="width:746px;">
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                                        <div class="content">

                                            <h2 data-animation="animated bounceInUp">KASANDRA</h2>

                                            <p data-animation="animated bounceInUp">Kamus Penegakan Peraturan Daerah dan Penegakan Kepala Daerah.</p>
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
        <div data-scroll='4' class="full_width">
        <!--location wrapper start-->
        <div class="location_wrapper full_width">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 abt_section">
                        <div class="abt_heading_wrapper">
                            <h1>Mesin Pencari Penegakan Peraturan Daerah dan Kepala Daerah</h1>

                        </div>
                        <form>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-6 col-12">
                                    <div class="contect_form1">
                                        <input type="text" id="keyword" name="keyword" placeholder="Cari apapun terkait perda perkada. . ." class="require">
                                    </div>
                                    <div id="res_search" style="margin-top:50px;"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
	
    $("#keyword").on('keyup',function(){
        if($(this).val().length > 2){

        $.ajax({
                  method:'POST',
                  url:'{{ url("kasandra/search") }}',
                  data:{
                    keyword: $(this).val(),
                    '_token': $('input[name=_token]').val()
                  },
                  success:function(data){
                    console.log(data);
                    $('#res_search').html('');
                    $('#res_search').html(data.html);
                  }
                })
    }
    else{
        $('#res_search').html('')
    }
    })
</script>
@endsection