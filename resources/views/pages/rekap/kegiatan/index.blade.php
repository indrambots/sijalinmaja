@extends('layouts.app')

@section('content')
<div class="row mb-2">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
                <table>
                    <tr>
                        <td style="padding-right: 5px;">Total Kegiatan Batal </td>
                        <td> : <strong>{{ $total_batal->tot}}</strong></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 5px;">Total Kegiatan Belum Laporan </td>
                        <td> : <strong>{{ $total_belum_laporan->tot}}</strong></td>
                    </tr>
                    <tr>
                        <td style="padding-right: 5px;">Total Kegiatan Sudah Laporan</td>
                        <td> : <strong>{{ $total_sudah}}</strong> (Presentase <strong>{{$progress}} %</label>) </td>
                    </tr>
                    <tr>
                        <td style="padding-right: 5px;">Total Kegiatan Seluruhnya </td>
                        <td> : <strong>{{ $grand->tot}}</strong> </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
      <div class="card">
        <div class="card-body">
            <div class="col-4">
              <h5 class="card-title">Rekap Kegiatan Per Seksi Subbag</h5>
            </div>
          <div class="row mt-2">
            <div class="table-responsive">
    <?php $grand_total = 0;?>
                <table id="datatable" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th> Bidang</th>
                            <th> Sub/Seksi</th>
                            <th> Jumlah Kegiatan</th>
                            <th> BATAL</th>
                            <th> Belum Laporan</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="card">
        <div class="card-body">
              <h5 class="card-title">Rekap Kegiatan Per Bidang</h5>
            <select id='bidang' class="form-control col-6 col-md-3 select2" onChange="onChangeFilter()">
        <option value='-'>Semua Bidang</option>
        @foreach($bidang as $b)
        <option value="{{$b->bidang}}">{{$b->bidang}}</option>
        @endforeach
      </select> 
          <div class="row mt-2">
            <div class="table-responsive" id="rekap_bidang">
                <table class="datatables table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th> Bidang</th>
                            <th> Jumlah Kegiatan</th>
                            <th> BATAL</th>
                            <th> Belum Laporan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kegiatan_bidang as $k)
                        <tr>
                            <td>{{$k->bentuk_kegiatan}}</td>
                            <td>{{$k->total}}</td>
                            <td>
                            <?php $btl = App\Kegiatan::select('id')->where('bentuk_kegiatan',$k->bentuk_kegiatan)->where('is_batal',1)->get();  ?>
                                
                            <button class="btn btn-danger" data-toggle="modal" data-target="#modal-batal-bentuk" onclick="modalBatalBentuk('{{$k->bentuk_kegiatan}}','-')">{{count($btl)}}</button>
                            </td>
                            <td>
                            <?php $blm = App\Kegiatan::select('id')->where('bentuk_kegiatan',$k->bentuk_kegiatan)->whereNull('hasil_kegiatan')->get();  ?>
                            <button class="btn btn-warning" data-toggle="modal" data-target="#modal-bentuk" onclick="blmBentuk('{{$k->bentuk_kegiatan}}','-')">{{count($blm)}}</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div id="modal-laporan-seksi" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-left">Kegiatan Yang Belum Dilaporkan</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive" id="res_seksi">
                    </div>
                </div>
              </div>

            </div>
          </div>
<div id="modal-bentuk" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-left">Kegiatan Yang Belum Dilaporkan</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive" id="res_bentuk">
                    </div>
                </div>
              </div>

            </div>
          </div>
<div id="modal-batal-seksi" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-left">Kegiatan Yang Batal</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive" id="res_batal_seksi">
                    </div>
                </div>
              </div>

            </div>
          </div>
<div id="modal-batal-bentuk" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-left">Kegiatan Yang Batal</h4>
                </div>
                <div class="modal-body">
                    <div class="table-responsive" id="res_batal_bentuk">
                    </div>
                </div>
              </div>

            </div>
          </div>
@endsection
@section('script')
<script type="text/javascript">

    function belumLaporan(bidang,seksi){
        $.ajax({
          method:'POST',
          url:'{{ url("rekap/kegiatan/lapor-seksi") }}',
          data:{
            bidang: bidang,
            sub_bidang: seksi,
            '_token': $('input[name=_token]').val()
          },
          success:function(data){
            $('#res_seksi').html(data.view)
            
          }
        })
    }

    function modalBatalSeksi(seksi){
        $.ajax({
          method:'POST',
          url:'{{ url("rekap/kegiatan/modal-batal-seksi") }}',
          data:{
            sub_bidang: seksi,
            '_token': $('input[name=_token]').val()
          },
          success:function(data){
            $('#res_batal_seksi').html(data.view)
            
          }
        })
    }
    function modalBatalBentuk(bentuk,bidang){
        $.ajax({
          method:'POST',
          url:'{{ url("rekap/kegiatan/modal-batal-bentuk") }}',
          data:{
            bidang: bidang,
            bentuk: bentuk,
            '_token': $('input[name=_token]').val()
          },
          success:function(data){
            $('#res_batal_bentuk').html(data.view)
            
          }
        })
    }

    function blmBentuk(bentuk,bidang){
        $.ajax({
          method:'POST',
          url:'{{ url("rekap/kegiatan/modal-bentuk") }}',
          data:{
            bidang: bidang,
            bentuk: bentuk,
            '_token': $('input[name=_token]').val()
          },
          success:function(data){
            console.log(data)
            $('#res_bentuk').html(data.view)
            
          }
        })
    }
    function onChangeFilter(){
        $.ajax({
          method:'POST',
          url:'{{ url("rekap/kegiatan-bidang") }}',
          data:{
            bidang: $('#bidang').val(),
            '_token': $('input[name=_token]').val()
          },
          success:function(data){
            console.log(data);
            $('#rekap_bidang').html(data.view)
          }
        })
    }
    $('.datatables').DataTable()
     var datatable = $('#datatable').DataTable({
        processing: true,
        serverSide: false,
        paging:false,
        ajax:'{{ url('rekap/datatable-rekap-kegiatan') }}',
         columns: [
        {data: 'bidang', name:'bidang'},
        {data: 'sub_bidang', name:'sub_bidang'},
        {data: 'total', name:'total'},
        {data: 'batal', name:'batal'},
        {data: 'belum_laporan', name:'belum_laporan'}
        ],
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": true,
                "searchable": true
            },
          ],
      })
</script>

@if(Session::get('success'))
<script type="text/javascript">
    toastr.success("DATA KEGIATAN BERHASIL TERSIMPAN");
</script>
@endif

@if(Session::get('success_barcode'))
<script type="text/javascript">
    toastr.success("LINK SPT BERHASIL TERSIMPAN");
</script>
@endif

@if(Session::get('success_laporan'))
<script type="text/javascript">
    toastr.success("LAPORAN BERHASIL DIBUAT");
</script>
@endif
@endsection