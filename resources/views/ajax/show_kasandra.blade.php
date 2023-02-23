@if(count($kasandra) > 0)
<table class="table table-striped table-hover table-bordered">
	<tr>
		<th>Perda</th>
		<th>Urusan, Jenis Trantib</th>
		<th>Kewajiban</th>
		<th>Sanksi Administratif</th>
		<th>Sanksi Pidana</th>
		<th>OPD Pengampu</th>
	</tr>
		@foreach($kasandra as $k)
		<tr>
			<td>{{$k->perda->perda}}</td>
			<td>{{$k->perda->urusan_pemerintahan}}, {{$k->perda->jenis_tertib}}</td>
			<td><strong>PASAL {{$k->perda->pasal_kewajiban}}</strong> <br> {{$k->perda->kewajiban}}</td>
			<td><strong>PASAL {{$k->perda->pasal_sanksi_adm}}</strong> <br> {{$k->perda->sanksi_adm}}</td>
			<td><strong>PASAL {{$k->perda->pasal_sanksi_pidana}}</strong> <br> {{$k->perda->sanksi_pidana}}</td>
			<td>{{$k->perda->opd}}</td>
		</tr>
		@endforeach
@else
<div class="alert alert-custom alert-notice alert-light-warning fade show mb-5" role="alert">
	<div class="alert-icon">
		<i class="flaticon-warning"></i>
	</div>
	<div class="alert-text"><strong>Anda belum memilih potensi perda yang dilanggar</strong></div>
	<div class="alert-close">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		</button>
	</div>
</div>
@endif
</table>