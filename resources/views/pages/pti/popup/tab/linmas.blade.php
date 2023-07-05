
	<form method="POST" action="{{url('pti/absen-save')}}">
		{{csrf_field()}}
		<input type="hidden" name="id" value="{{$id}}">
		<input type="hidden" name="bidang" value="PELINDUNGAN MASYARAKAT">
		<button class="btn btn-lg btn-primary mt-5 mb-5">SIMPAN ABSENSI </button>
	<div class="table-responsive">
		<table class="datatable table table-bordered table-hover">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Ada Kegiatan</th>
					<th>HADIR</th>
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
											k.judul_kegiatan,
											k.tanggal_mulai,
											k.tanggal_selesai,
											k.id
											FROM
											pegawai p
											INNER JOIN kegiatan_personel kp ON p.nip = kp.nip
											INNER JOIN kegiatan k ON kp.kegiatan_id = k.id
											WHERE '".$pti->tanggal."' BETWEEN tanggal_mulai AND tanggal_selesai AND p.nip = '".$k->nip."' ");
						?>
					@if(!empty($keg))
						@foreach($keg as $kk)
							<a href=".{{url('download/spt/'.$kk->id)}}" target="_blank">{{$kk->spt}}</a>&nbsp; {{$kk->judul_kegiatan}} 
							( @if($kk->tanggal_mulai == $kk->tanggal_selesai) 
	                {{date("d F Y", strtotime($kk->tanggal_mulai))}}
	            	@else
	                {{date("d F Y", strtotime($kk->tanggal_mulai))." s/d ".date("d F Y", strtotime($kk->tanggal_selesai))}}
	                @endif )
							<br>
						@endforeach
					@else
						-
					@endif
					</td>
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