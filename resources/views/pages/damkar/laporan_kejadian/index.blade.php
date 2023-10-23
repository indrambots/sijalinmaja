@extends('layouts.app')

@section('content')
<div class="col">
  <div class="card">
    <div class="card-body">
      <div class="row justify-content-between">
        <div class="col-4">
          <h5 class="card-title">Data Kejadian Kebakaran Dan Penyelamatan</h5>
        </div>
        <div class="col-4">
          <div class="d-flex justify-content-end">
          <a href="{{ url('damkar/laporan-kejadian/create/0')}} " type="button" class="btn btn-outline-primary m-b-xs "><i class="fas fa-plus-circle"></i> Buat Laporan Kejadian</a>
        </div>
        </div>
      </div>
      <div class="row justify-content-between">
        <div class="col-12">
            <select id='jenis' class="form-control col-6 col-md-3 select2">
                <option value='-'>Tampilkan Semua</option>
                <option value="Kebakaran">Kebakaran</option>
                <option value="Non Kebakaran">Non Kebakaran</option>
              </select> 
        </div>
    </div>
      <div class="row mt-2">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>id</th>
                <th>Jenis Kejadian</th>
                <th>Objek</th>
                <th>Lokasi Kejadian</th>
                <th>Waktu Kejadian</th>
                <th>Terima Berita</th>
                <th>Berangkat</th>
                <th>Tiba di Lokasi Kejadian</th>
                <th>Respon Time</th>
                <th>Kembali ke Pos</th>
                <th>Foto</th>
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
            "url": '{{ url('damkar/laporan-kejadian/datatable') }}',
            data: function(d){
                d.jenis = $('#jenis').val();
            }
        },
         columns: [
        {data: 'id', name:'id'},
        {data: 'jenis_kejadian', name:'jenis_kejadian'},
        {data: 'objek', name:'objek'},
        {data: 'lokasi_kejadian', name:'lokasi_kejadian'},
        {data: 'waktu_kejadian', name:'waktu_kejadian'},
        {data: 'terima_berita', name:'terima_berita'},
        {data: 'berangkat', name:'berangkat'},
        {data: 'tiba', name:'tiba'},
        {data: 'respon_time', name:'respon_time'},
        {data: 'kembali', name:'kembali'},
        {data: 'foto', name:'foto'},
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
    $('#jenis').on('change',function(e){
        datatable.ajax.reload()
    })
    function deleteKejadian(id){
        Swal.fire({   
                      title: "Anda Yakin?",   
                      text: "Data Kejadian akan terhapus dari sistem",   
                      icon: "warning",   
                      showCancelButton: true,   
                      confirmButtonColor: "#e6b034",   
                      confirmButtonText: "Ya, Hapus Kejadian" 
                       
                  }).then((result) => {
            if (result.value) {
                $.ajax({
                            method:'POST',
                            url:'{{ url("damkar/laporan-kejadian/delete") }}',
                            data:{
                              id:id,
                              '_token': $('input[name=_token]').val()
                            },
                            success:function(data){
                                Swal.fire({title:"Terhapus!", text:"Kejadian berhasil terhapus dari sistem", icon:"success"}
                                ).then((result) => {
                                    location.reload()
                                })
                              
                            }
                          }) 
            } 
         });
    }

$(document).ready(function(){
})
</script>

@if(Session::get('success'))
<script type="text/javascript">
    toastr.success("DATA KEJADIAN BERHASIL TERSIMPAN");
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