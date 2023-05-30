<table class="datatabless table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th>SPT</th>
			<th>Kegiatan</th>
			<th>Pelaporan </th>
			<th>Lokasi</th>
			<th>Waktu Kegiatan</th>
		</tr>
	</thead>
	<tbody>
		@foreach($kegiatan as $k)
			<tr>
				<td>{{ $k->spt }}</td>
				<td>{{ $k->judul_kegiatan }}</td>
				<td>
					<?php
					$personel = App\KegiatanPersonel::where('kegiatan_id',$k->id)->where('ket','PELAPORAN')->first();
					?>
					@if(!isset($personel))
						<?php
						$personel = App\KegiatanPersonel::where('kegiatan_id',$k->id)->where('ket','PESERTA + PELAPORAN')->first();
						?>
							@if(!isset($personel))
							{{$k->penanggung_jawab}}
							@else
							{{$personel->nama}}
							@endif
					@else
					{{$personel->nama}}
					@endif
				</td>
				<td>{{ $k->lokasi }}</td>
				<td>
				@if($k->tanggal_mulai == $k->tanggal_selesai)
				{{ date("d F Y", strtotime($k->tanggal_mulai)) }}
				@else
				{{ date("d F Y", strtotime($k->tanggal_mulai))." s/d ".date("d F Y", strtotime($k->tanggal_selesai)) }}
				@endif
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
<script>
            $('.datatabless').DataTable()
</script>