@extends('layouts.app_nologin')

@section('content')
<div class="col">
  <div class="card">
    <div class="card-body">
      <div class="row justify-content-between">
        <div class="col-8">
          <h5 class="card-title">Data Kegiatan</h5>
              <select id='filter_bidang' class="form-control col-6 col-md-3 select2">
                <option value='-'>Tampilkan Semua Bidang</option>
                @foreach($bidang as $b)
                    <option value="{{$b->bidang}}">{{$b->bidang}}</option>
                @endforeach
                <option value="saya">Tampilkan Yang Saya Buat</option>
              </select> 
        </div>
      </div>
      <div class="row mt-2">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>id</th>
                <th>Judul Kegiatan</th>
                <th>Waktu Kegiatan</th>
                <th>Lokasi</th>
                <th>Kota</th>
                <th>Penanggung Jawab</th>
                <th>Aksi</th>
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
        paging:true,
        ajax:  {
            "url": '{{ url('dokumentasi/datatable') }}',
            data: function(d){
                d.bidang = $('#filter_bidang').val();
            }
        },
         columns: [
        {data: 'id', name:'id'},
        {data: 'judul_kegiatan', name:'judul_kegiatan'},
        {data: 'waktu_kegiatan', name:'waktu_kegiatan'},
        {data: 'lokasi', name:'lokasi'},
        {data: 'kota', name:'kota'},
        {data: 'penanggung_jawab', name:'penanggung_jawab'},
        {data: 'aksi', name:'aksi'},
        ],
        "order": [[ 0, "desc" ]],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
          ],
      })

    $('#filter_bidang').on('change',function(e){
        datatable.ajax.reload()
    })
$(document).ready(function(){
})
</script>
@endsection