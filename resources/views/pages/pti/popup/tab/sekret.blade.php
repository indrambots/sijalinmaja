
	<form method="POST" action="{{url('pti/absen-save')}}">
		{{csrf_field()}}
		<input type="hidden" name="id" value="{{$id}}">
		<input type="hidden" name="bidang" value="SEKRETARIAT">
		<button class="btn btn-lg btn-primary mt-5 mb-5">SIMPAN ABSENSI </button>
	<div class="table-responsive">
		<table class="datatable table table-bordered table-hover">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Ada Kegiatan</th>
					<th>HADIR</th>
					<th>TIDAK</th>
				</tr>
			</thead>
			<tbody>
				@foreach($sekret as $k)
				<tr>
					<td>{{$k->nama}}</td>
					<td>
					<?php $keg = DB::SELECT("SELECT
											p.nama,
											p.nip,
											k.spt,
											k.bentuk_kegiatan,
											k.tanggal_mulai,
											k.tanggal_selesai,
											k.jam_mulai,
											k.id
											FROM
											pegawai p
											INNER JOIN kegiatan_personel kp ON p.nip = kp.nip
											INNER JOIN kegiatan k ON kp.kegiatan_id = k.id
											WHERE '".$pti->tanggal."' BETWEEN tanggal_mulai AND tanggal_selesai AND p.nip = '".$k->nip."' AND k.bentuk_kegiatan <> 'PUSKOGAP' ");
						?>
					@if(!empty($keg))
						@foreach($keg as $kk)
							<a href=".{{url('download/spt/'.$kk->id)}}" target="_blank">{{$kk->spt}}</a>&nbsp; {{$kk->bentuk_kegiatan}} 
						(	@if($kk->tanggal_mulai == $kk->tanggal_selesai) 
	                {{date("d F Y", strtotime($kk->tanggal_mulai))}}
	            	@else
	                {{date("d F Y", strtotime($kk->tanggal_mulai))." s/d ".date("d F Y", strtotime($kk->tanggal_selesai))}}
	                @endif
	                )
							 <strong> => JAM MULAI {{$kk->jam_mulai}}</strong> <br>
						@endforeach
					@else
						-
					@endif
					</td>
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