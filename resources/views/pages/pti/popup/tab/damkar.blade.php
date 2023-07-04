
	<form method="POST" action="{{url('pti/absen-save')}}">
		{{csrf_field()}}
		<input type="hidden" name="id" value="{{$id}}">
		<input type="hidden" name="bidang" value="PEMADAM KEBAKARAN DAN PENYELAMATAN">
		<button class="btn btn-lg btn-primary mt-5 mb-5">SIMPAN ABSENSI </button>
	<div class="table-responsive">
		<table class="datatable table table-bordered table-hover">
			<thead>
				<tr>
					<th>Nama</th>
					<th>TIDAK HADIR</th>
				</tr>
			</thead>
			<tbody>
				@foreach($damkar as $k)
				<tr>
					<td>{{$k->nama}}</td>
					<td>
						<label class="checkbox checkbox-lg">
<?php $hadir = App\KehadiranPti::where('pti_id',$id)->where('nip',$k->nip)->first(); ?>
						@if($hadir !== null)
						<input type="checkbox" checked="checked" name="absen[]" value="{{$k->nip}}">
						@else
						<input type="checkbox" name="absen[]" value="{{$k->nip}}">
						@endif
						<span></span></label>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</form>