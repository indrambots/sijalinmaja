@extends('layouts.app')

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
        <div class="col-4">
          <div class="d-flex justify-content-end">
            @if(Auth::user()->level == 8 || Auth::user()->level == 7)
          <a href="{{ url('kegiatan/create/0')}} " type="button" class="btn btn-outline-primary m-b-xs "><i class="fas fa-plus-circle"></i> Buat Kegiatan</a>
          @endif
        </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>id</th>
                <th>SPT</th>
                <th>Judul Kegiatan</th>
                <th>Waktu Kegiatan</th>
                <th>Lokasi</th>
                <th>Kota</th>
                <th>Penanggung Jawab</th>
                <th>Status</th>
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

        <div id="modal-upload" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-left">UPLOAD SPT</h4>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{url('kegiatan/update-link-spt')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="idspt" value="">
                        <div class="form-group">
                            <label>Upload SPT:</label>
                            <input type="file" required class="form-control" id="link" name="link_spt" value="" />
                        </div>
                        <button type='submit'  class="btn btn-primary mr-2">SIMPAN SPT</button>
                    </form>
                </div>
              </div>

            </div>
          </div>
           <div id="modal-laporan" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-left">FORM LAPORAN KEGIATAN</h4>
                </div>
                <div class="modal-body">
                    <form class="form" enctype="multipart/form-data" method="POST" action="{{url('kegiatan/laporan')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id_laporan" value="">
                        <div class="form-group">
                            <label>POINT PENTING / HASIL KEGIATAN :</label>
                            <textarea name="hasil_kegiatan" id="hasil_kegiatan" class="form-control" ></textarea>
                        </div>
                        <div class="form-group">
                            <label>DOKUMENTASI 1 :</label>
                            <input type="file" class="form-control" name="dokumentasi_1" required>
                        </div>
                        <div class="form-group">
                            <label>DOKUMENTASI 2 :</label>
                            <input type="file" class="form-control" name="dokumentasi_2" required>
                        </div>
                        <div class="form-group">
                            <label>DOKUMENTASI 3 :</label>
                            <input type="file" class="form-control" name="dokumentasi_3" required>
                        </div>
                        <button type='submit'  class="btn btn-primary mr-2">SIMPAN</button>
                    </form>
                </div>
              </div>

            </div>
          </div>
@endsection
@section('script')
<script type="text/javascript">
    var datatable = $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        paging:true,
        ajax:  {
            "url": '{{ url('kegiatan/datatable') }}',
            data: function(d){
                d.bidang = $('#filter_bidang').val();
            }
        },
         columns: [
        {data: 'id', name:'id'},
        {data: 'spt', name:'spt'},
        {data: 'judul_kegiatan', name:'judul_kegiatan'},
        {data: 'waktu_kegiatan', name:'waktu_kegiatan'},
        {data: 'lokasi', name:'lokasi'},
        {data: 'kota', name:'kota'},
        {data: 'penanggung_jawab', name:'penanggung_jawab'},
        {data: 'status', name:'status'},
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
    function personel(id){

    }
    function deleteKeg(id,nospt){
        Swal.fire({   
                      title: "Anda Yakin?",   
                      text: "Data Kegiatan bernomor "+nospt+" akan terhapus",   
                      icon: "warning",   
                      showCancelButton: true,   
                      confirmButtonColor: "#e6b034",   
                      confirmButtonText: "Ya, Hapus Kegiatan" 
                       
                  }).then((result) => {
            if (result.value) {
                $.ajax({
                            method:'POST',
                            url:'{{ url("kegiatan/delete") }}',
                            data:{
                              id:id,
                              '_token': $('input[name=_token]').val()
                            },
                            success:function(data){
                                Swal.fire({title:"Terhapus!", text:"Kegiatan nomor "+nospt+" berhasil terhapus dari sistem", icon:"success"}
                                ).then((result) => {
                                    location.reload()
                                })
                              
                            }
                          }) 
            } 
         });
    }

     function batalkan(id){
        Swal.fire({   
                      title: "Anda Yakin?",   
                      text: "SPT Kegiatan akan dibatalkan",   
                      icon: "warning",   
                      showCancelButton: true,   
                      confirmButtonColor: "#e6b034",   
                      confirmButtonText: "Ya, Batalkan Kegiatan" 
                       
                  }).then((result) => {
            if (result.value) {
                $.ajax({
                            method:'POST',
                            url:'{{ url("kegiatan/batalkan") }}',
                            data:{
                              id:id,
                              '_token': $('input[name=_token]').val()
                            },
                            success:function(data){
                                Swal.fire({title:"Berhasil!", text:"SPT Kegiatan berhasil dibatalkan", icon:"success"}
                                ).then((result) => {
                                    location.reload()
                                })
                              
                            }
                          }) 
            } 
         });
    }

    function uploadBarcode(id){
      $('#idspt').val(id)
    }

    function laporan(id){
      $('#id_laporan').val(id)
    }
    $('#filter_bidang').on('change',function(e){
        datatable.ajax.reload()
    })
$(document).ready(function(){
  tinymce.init({
  selector: 'textarea#hasil_kegiatan',
  height: 500,
  plugins: [
    'advlist', 'autolink', 'lists', 'link',
    'searchreplace', 'visualblocks', 'code', 'fullscreen',
    'insertdatetime', 'table', 'wordcount'
  ],
  toolbar: 'undo redo | blocks | ' +
  'bold italic backcolor | alignleft aligncenter ' +
  'alignright alignjustify | bullist numlist outdent indent | ' +
  'removeformat',
  content_style: 'body { font-family:Arial,sans-serif; font-size:12px }'
});
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