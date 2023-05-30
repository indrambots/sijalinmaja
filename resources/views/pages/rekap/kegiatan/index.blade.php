@extends('layouts.app')

@section('content')
<div class="col-6">
  <div class="card">
    <div class="card-body">
      <div class="row justify-content-between">
        <div class="col-4">
          <h5 class="card-title">Rekap Kegiatan Bidang</h5>
        </div>
        <div class="col-4">
          <div class="d-flex justify-content-end">
        </div>
        </div>
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
@endsection
@section('script')
<script type="text/javascript">
     var datatable = $('#datatable').DataTable({
        processing: true,
        serverSide: false,
        paging:false,
        ajax:'{{ url('rekap/datatable-rekap-kegiatan') }}',
         columns: [
        {data: 'bidang', name:'bidang'},
        {data: 'sub_bidang', name:'sub_bidang'},
        {data: 'total', name:'total'},
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
    function belumLaporan(bidang,seksi){
        $.ajax({
          method:'POST',
          url:'{{ url("rekap/kegiatan/belum-lapor") }}',
          data:{
            bidang: bidang,
            sub_bidang: seksi,
            '_token': $('input[name=_token]').val()
          },
          success:function(data){
            console.log(data);
            
          }
        })
    }
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