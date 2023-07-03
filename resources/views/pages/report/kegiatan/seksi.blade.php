@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-0" style="padding-bottom:0px; padding-top:10px;">
          <div class="card-title font-weight-bolder">
            <div class="card-label">Report Kegiatan</div>
          </div>
        </div>
        <div class="card-body">

          <form class="form" id="form">
            {{ csrf_field() }}
        </form>
          <div class="row mt-2">
            <div class="col-md-8">
                <label>Penugasan Kegiatan</label>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th> id </th>
                                <th> SPT </th>
                                <th> Kegiatan</th>
                                <th> Lokasi Kegiatan</th>
                                <th> Tanggal Kegiatan</th>
                                <th> Anggota</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <label>Penugasan PUSKOGAP</label>
                <div class="table-responsive">
                    <table id="datatable_puskogap" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th> id </th>
                                <th> SPT </th>
                                <th> Lokasi</th>
                                <th> Anggota</th>
                                <th> Periode</th>
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
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
    })

    $('.datatables').DataTable()
     var datatable = $('#datatable').DataTable({
        processing: true,
        serverSide: false,
        paging:true,
        ajax:  {
            "url": '{{ url('report/kegiatan/seksi-grid') }}',
            data: function(d){
                d.bulan = $('#bulan_sub').val();
            }
        },
         columns: [
        {data: 'id', name:'id'},
        {data: 'spt', name:'spt'},
        {data: 'kegiatan', name:'kegiatan'},
        {data: 'lokasi', name:'lokasi'},
        {data: 'waktu_kegiatan', name:'waktu_kegiatan'},
        {data: 'anggota', name:'anggota'},
        ],
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": true
            },
          ],
      })
    $('.datatables').DataTable()

     var datatable_puskogap = $('#datatable_puskogap').DataTable({
        processing: true,
        serverSide: false,
        paging:true,
        ajax:  {
            "url": '{{ url('report/kegiatan/datatable-puskogap') }}',
            data: function(d){
                d.bulan = $('#bulan_sub').val();
            }
        },
         columns: [
        {data: 'id', name:'id'},
        {data: 'spt', name:'spt'},
        {data: 'lokasi', name:'lokasi'},
        {data: 'anggota', name:'anggota'},
        {data: 'waktu_kegiatan', name:'waktu_kegiatan'},
        ],
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": true
            },
          ],
      })
</script>
@endsection