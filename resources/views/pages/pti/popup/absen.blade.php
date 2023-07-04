@extends('layouts.app_peta')
@section('content')
<div class="container-fluid" style="background-color:white;">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-custom gutter-b">
                <div class="card-header card-header-tabs-line">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#gakda">
                                    <span class="nav-text">GAKDA</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tibum">
                                    <span class="nav-text">TIBUM</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#linmas">
                                    <span class="nav-text">LINMAS</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#damkar">
                                    <span class="nav-text">DAMKAR</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#sekret">
                                    <span class="nav-text">SEKRETARIAT</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
		            <div class="tab-content">
		                <div class="tab-pane fade show active" id="gakda" role="tabpanel" aria-labelledby="gakda">
		                    @include('pages.pti.popup.tab.gakda')
		                </div>
		                <div class="tab-pane fade" id="tibum" role="tabpanel" aria-labelledby="tibum">
		                    @include('pages.pti.popup.tab.tibum')                                
		                </div>
		                <div class="tab-pane fade" id="sekret" role="tabpanel" aria-labelledby="sekret">
		                    @include('pages.pti.popup.tab.sekret')                                
		                </div>
		                <div class="tab-pane fade" id="damkar" role="tabpanel" aria-labelledby="damkar">
		                    @include('pages.pti.popup.tab.damkar')
		                </div>
		                <div class="tab-pane fade" id="linmas" role="tabpanel" aria-labelledby="linmas">
		                    @include('pages.pti.popup.tab.linmas')
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	$('.datatable').DataTable({
		 lengthMenu: [
            [50, -1],
            [50, 'All'],
        ],
	})
	$('#frm_kasandra').on('submit',function(e){
		e.preventDefault()
    $(this).ajaxSubmit({
            success:function(data){
            	Swal.fire({title:"Berhasil!", text:"Absen berhasil dilakukan", icon:"success"}
                            ).then((result) => {
					        window.opener.location.reload(true);
					        window.close();
                            })
            }
		})
	})
</script>
@endsection