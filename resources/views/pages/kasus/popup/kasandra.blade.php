@extends('layouts.app_peta')
@section('content')
<div class="container-fluid" style="background-color:white;">
	<form method="POST" action="{{url('popup/kasandra-kasus/save')}}" id="frm_kasandra">
		<input type="hidden" name="id" value="{{$id}}">
		<button class="btn btn-lg btn-primary mt-5 mb-5">SUBMIT POTENSI PELANGGARAN </button>
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
				<table id="datatable" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Perda</th>
							<th>Urusan, Jenis Trantib</th>
							<th>Kewajiban</th>
							<th>Sanksi Administratif</th>
							<th>Sanksi Pidana</th>
							<th>OPD Pengampu</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($kasandra as $k)
						<tr>
							<td>{{$k->perda}}</td>
							<td>{{$k->urusan_pemerintahan}}, {{$k->jenis_tertib}}</td>
							<td><strong>PASAL {{$k->pasal_kewajiban}}</strong> <br> {{$k->kewajiban}}</td>
							<td><strong>PASAL {{$k->pasal_sanksi_adm}}</strong> <br> {{$k->sanksi_adm}}</td>
							<td><strong>PASAL {{$k->pasal_sanksi_pidana}}</strong> <br> {{$k->sanksi_pidana}}</td>
							<td>{{$k->opd}}</td>
							<td>
								<label class="checkbox checkbox-lg">
								@if(!empty($k->kasus))
								<input type="checkbox" checked="checked" name="kasandra[]" value="{{$k->id}}">
								@else
								<input type="checkbox" name="kasandra[]" value="{{$k->id}}">
								@endif
								<span></span></label>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	</form>
</div>
@endsection
@section('script')
<script>
	$('#datatable').DataTable({
		 lengthMenu: [
            [50, -1],
            [50, 'All'],
        ],
	})
	$('#frm_kasandra').on('submit',function(e){
		e.preventDefault()
    $(this).ajaxSubmit({
            success:function(data){
            	Swal.fire({title:"Berhasil!", text:"Perda berhasil ditambahkan dalam kasus", icon:"success"}
                            ).then((result) => {
					        window.opener.location.reload(true);
					        window.close();
                            })
            }
		})
	})
</script>
@endsection