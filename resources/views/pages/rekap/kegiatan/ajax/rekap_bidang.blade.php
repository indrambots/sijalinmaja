<table class="datatabless table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th> Bidang</th>
                            <th> Jumlah Kegiatan</th>
                            <th> BATAL </th>
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
	<?php $btl = App\Kegiatan::select('id')->where('bentuk_kegiatan',$k->bentuk_kegiatan)->whereNull('hasil_kegiatan')->where('is_batal',1)->get();	?>
		@if($bulan !== '-')
	<?php $btl = App\Kegiatan::select('id')->where('bentuk_kegiatan',$k->bentuk_kegiatan)->whereNull('hasil_kegiatan')->whereMonth('tanggal_mulai',$bulan)->where('is_batal',1)->get();	?>
		@endif
          <button class="btn btn-danger" data-toggle="modal" data-target="#modal-batal-bentuk" onclick="modalBatalBentuk('{{$k->bentuk_kegiatan}}','-')">{{count($btl)}}</button>
	@else
	<?php $btl = App\Kegiatan::select('id')->where('bentuk_kegiatan',$k->bentuk_kegiatan)->whereNull('hasil_kegiatan')->where('is_batal',1)->where('bidang',$bidang)->get();	?>
		@if($bulan !== '-')
	<?php $btl = App\Kegiatan::select('id')->where('bentuk_kegiatan',$k->bentuk_kegiatan)->whereNull('hasil_kegiatan')->whereMonth('tanggal_mulai',$bulan)->where('bidang',$bidang)->where('is_batal',1)->get();	?>
		@endif
                                
          <button class="btn btn-danger" data-toggle="modal" data-target="#modal-batal-bentuk" onclick="modalBatalBentuk('{{$k->bentuk_kegiatan}}','{{$bidang}}')">{{count($btl)}}</button>
    @endif
	</td>
	<td>
	@if($bidang == '-')
	<?php $blm = App\Kegiatan::select('id')->where('bentuk_kegiatan',$k->bentuk_kegiatan)->whereNull('hasil_kegiatan')->where('is_batal',0)->get();	?>
		@if($bulan !== '-')
	<?php $blm = App\Kegiatan::select('id')->where('bentuk_kegiatan',$k->bentuk_kegiatan)->whereNull('hasil_kegiatan')->whereMonth('tanggal_mulai',$bulan)->where('is_batal',0)->get();	?>
		@endif
	<button class="btn btn-warning" onclik="blmBidang('{{$k->bentuk_kegiatan}}','-')">{{count($blm)}}</button>
	@else
	<?php $blm = App\Kegiatan::select('id')->where('bentuk_kegiatan',$k->bentuk_kegiatan)->whereNull('hasil_kegiatan')->where('is_batal',0)->where('bidang',$bidang)->get();	?>
		@if($bulan !== '-')
	<?php $blm = App\Kegiatan::select('id')->where('bentuk_kegiatan',$k->bentuk_kegiatan)->whereNull('hasil_kegiatan')->whereMonth('tanggal_mulai',$bulan)->where('bidang',$bidang)->where('is_batal',0)->get();	?>
		@endif
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