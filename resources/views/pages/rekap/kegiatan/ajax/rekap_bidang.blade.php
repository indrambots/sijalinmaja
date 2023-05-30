<table class="datatabless table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th> Bidang</th>
                            <th> Jumlah Kegiatan</th>
                            <th> Belum Laporan</th>
                        </tr>
                    </thead>
                    <tbody>
@foreach($kegiatan as $k)
<tr>
	<td>{{$k->bentuk_kegiatan}}</td>
	<td>{{$k->total}}</td>
	<td>
	@if($bidang == '-')
	<?php $blm = App\Kegiatan::select('id')->where('bentuk_kegiatan',$k->bentuk_kegiatan)->whereNull('hasil_kegiatan')->get();	?>
	<button class="btn btn-warning" onclik="blmBidang('{{$k->bentuk_kegiatan}}','-')">{{count($blm)}}</button>
	@else
	<?php $blm = App\Kegiatan::select('id')->where('bentuk_kegiatan',$k->bentuk_kegiatan)->where('bidang',$bidang)->whereNull('hasil_kegiatan')->get();	?>
	<button class="btn btn-warning" data-toggle="modal" data-target="#modal-bentuk"  onclick="blmBentuk('{{$k->bentuk_kegiatan}}','{{$bidang}}')">{{count($blm)}}</button>
	@endif
	</td>
</tr>
@endforeach
</tbody>
</table>
<script>
            $('.datatabless').DataTable()
</script>