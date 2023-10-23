
	<form method="POST" action="{{url('pti/absen-save')}}">
		{{csrf_field()}}
		<input type="hidden" name="id" value="{{$id}}">
		<button class="btn btn-lg btn-primary mt-5 mb-5">SIMPAN ABSENSI </button>
	<div class="table-responsive">
		<table class="datatable table table-bordered table-hover">
			<thead>
				<tr>
					<th>Nama</th>
					<th >HADIR</th>
					<th >TIDAK HADIR</th>
				</tr>
			</thead>
			<tbody>
				@foreach($spt as $k)
				<tr>
					<td>{{$k->nama}}</td>
										<td>
<?php $hadir = App\KehadiranPti::where('pti_id',$id)->where('nip',$k->nip)->first(); ?>
						@if($hadir !== null)
							@if($hadir->hadir == 1)
								<div class="radio-inline">
									<label class="radio radio-lg">
									<input type="radio" checked="checked" name="hadir[{{$loop->iteration}}]" value="{{$k->nip}}1">
									<span></span></label>
								</div>
							@else
								<div class="radio-inline">
									<label class="radio radio-lg">
									<input type="radio" name="hadir[{{$loop->iteration}}]" value="{{$k->nip}}1">
									<span></span></label>
								</div>
							@endif
						@else
								<div class="radio-inline">
									<label class="radio radio-lg">
									<input type="radio" name="hadir[{{$loop->iteration}}]" value="{{$k->nip}}1">
									<span></span></label>
								</div>
						@endif
					</td>
					<td>
<?php $hadir = App\KehadiranPti::where('pti_id',$id)->where('nip',$k->nip)->first(); ?>
						@if($hadir !== null)
							@if($hadir->hadir == 0)
								<div class="radio-inline">
									<label class="radio radio-lg">
									<input type="radio" checked="checked" name="hadir[{{$loop->iteration}}]" value="{{$k->nip}}0">
									<span></span></label>
								</div>
								@else

								<div class="radio-inline">
									<label class="radio radio-lg">
									<input type="radio" name="hadir[{{$loop->iteration}}]" value="{{$k->nip}}0">
									<span></span></label>
								</div>
								@endif
						@else
								<div class="radio-inline">
									<label class="radio radio-lg">
									<input type="radio" name="hadir[{{$loop->iteration}}]" value="{{$k->nip}}0">
									<span></span></label>
								</div>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</form>