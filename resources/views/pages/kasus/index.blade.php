@extends('layouts.app')

@section('content')
<div class="col">
  <div class="card">
    <div class="card-body">
      <div class="row justify-content-between">
        <div class="col-4">
          <h5 class="card-title">Data Kasus</h5>
        </div>
        <div class="col-4">
          <div class="d-flex justify-content-end">
          <a href="{{ url('kasus/create/0')}} " type="button" class="btn btn-outline-primary m-b-xs "><i class="fas fa-plus-circle"></i> Input Data Kasus Baru</a>
        </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>id</th>
                <th>Judul Kasus</th>
                <th>Deskripsi Kasus</th>
                <th>Tanggal Informasi Kasus</th>
                <th>Lokasi</th>
                <th>Pelapor</th>
                <th>Pelanggar</th>
                <th>Status</th>
                <th>History</th>
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

        <div id="modal-verif" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-left">VERIFIKASI KASUS</h4>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{url('kasus/modal/verif')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="idkasus" value="">
                        <div class="form-group">
                            <label>STATUS KASUS SAAT INI:</label>
                            <select class="form-control" name="status" id="status_kasus">
                                <option value="">--PILIH STATUS KASUS--</option>
                                <option value="1">AKTIF</option>
                                <option value="2">DITERUSKAN KAB/KOTA</option>
                                <option value="3">DITERUSKAN DALAM PENANGANAN OPD</option>
                                <option value="4">DALAM PENANGANAN SATPOLPP PEMPROV</option>
                                <option value="5">SELESAI</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>KEWENANGAN</label>
                            <div class="radio-inline">
                                <label class="radio">
                                <input type="radio" class="kewenangan" name="kewenangan" value="1">
                                <span></span>OPD PEMPROV JATIM</label>
                                <label class="radio">
                                <input type="radio" class="kewenangan" name="kewenangan" value="2">
                                <span></span>KAB/KOTA</label>
                                <label class="radio">
                                <input type="radio" class="kewenangan" name="kewenangan" value="3">
                                <span></span>PEMERINTAH PUSAT</label>
                            </div>
                        </div>
                        <div class="form-group row" id="div_kota">
                            <label>Kabupaten/Kota</label>
                            <select style="width:95%;" class="form-control select2" name="kota" id="kota">
                                <option value="">--PILIH KAB/KOTA--</option>
                                @foreach($kota as $k)
                                    <option value="{{$k->nama}}">{{$k->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row" id="div_opd">
                            <label>Perangkat Daerah</label>
                            <select style="width:95%;" class="form-control select2" name="opd" id="opd">
                                <option value="">--PILIH OPD PEMPROV--</option>
                                @foreach($opd as $k)
                                    <option value="{{$k->nama}}">{{$k->nama}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>YANG MEMBIDANGI</label>
                            <div class="radio-inline">
                                <label class="radio">
                                <input type="radio" class="bidang" name="bidang" value="KETENTRAMAN DAN KETERTIBAN UMUM">
                                <span></span>BIDANG KETENTRAMAN DAN KETERTIBAN UMUM</label>
                                <label class="radio">
                                <input type="radio" class="bidang" name="bidang" value="PENEGAKAN PERATURAN DAERAH">
                                <span></span>BIDANG PENEGAKAN PERATURAN DAERAH</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>FORMAT BERITA ACARA</label>
                            <a href="#" target="_blank" class="btn btn-primary">Download Format Berita Acara</a>
                        </div>
                        <div class="form-group">
                            <label>BERITA ACARA</label>
                            <input type="file" name="ba" class="form-control" accept="application/pdf, application/vnd.ms-excel" >
                        </div>

                        <div class="alert alert-info" role="alert" id="alert_ba">
                            Berita acara sudah pernah dibuat silahkan <a href="" id="link_ba" target="_blank"> KLIK DISINI </a> untuk mendownload BERITA ACARA
                        </div>
                        <button type='submit'  class="btn btn-primary mr-2">SUBMIT VERIFIKASI</button>
                    </form>
                </div>
              </div>

            </div>
          </div>
<div id="modal-kasandra" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-left">POTENSI PELANGGARAN PERDA</h4>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{url('kasus/kasandra/save')}}">
                        {{ csrf_field() }}
                        <input type="hidden" id="idkasandra">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive" id="table-kasandra">
                                </div>
                                <button type="button" onclick="lihatKasandra()"  class="btn btn-lg btn-success border-0 font-weight-bold mr-2"> PILIH POTENSI PERDA YANG DILANGGAR</button>
                            </div>
                        </div>
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
        serverSide: false,
        paging:true,
        ajax:'{{ url('kasus/datatable') }}',
         columns: [
        {data: 'id', name:'id'},
        {data: 'judul', name:'judul'},
        {data: 'deskripsi_kasus', name:'deskripsi_kasus'},
        {data: 'tanggal_informasi', name:'tanggal_informasi'},
        {data: 'lokasi_kasus', name:'lokasi_kasus'},
        {data: 'data_pelapor', name:'data_pelapor'},
        {data: 'data_pelanggar', name:'data_pelanggar'},
        {data: 'status', name:'status'},
        {data: 'history', name:'history'},
        {data: 'aksi', name:'aksi'},
        ],
        "order": [[ 0, "desc" ]],
        // "columnDefs": [
        //     {
        //         "targets": [ 0 ],
        //         "visible": false,
        //         "searchable": false
        //     },
        //   ],
      })
    $('input[type=radio][name=kewenangan]').change(function() {
        console.log(this.value)
    if (this.value == '1') {
        $('#div_kota').hide();
        $('#div_opd').show();
    }
    else if(this.value == '2') {
        $('#div_kota').show();
        $('#div_opd').hide();
    }
    else{
        $('#div_kota').hide();
        $('#div_opd').hide();
    }
    })
    function verifKasus(id){
        $('#alert_ba').hide();
        $('#idkasus').val(id)
        $('#div_kota').hide();
        $('#div_opd').hide();
        $.ajax({
                method:'POST',
                url:'{{ url("kasus/modal/show-verif") }}',
                data:{
                  id:id,
                  '_token': $('input[name=_token]').val()
                },
                success:function(data){
                    // console.log(data.kasus.status)
                    if(data.kasus.status == 0){
                        $('#status_kasus').val($("#status_kasus option:first").val())
                        $('.kewenangan').prop('checked',false)
                        $('.bidang').prop('checked',false)
                        $('#kota').val($("#kota option:first").val())
                        $('#opd').val($("#opd option:first").val())
                    }
                    else{
                        if(data.kasus.ba !== null){

                            $('#alert_ba').show();
                        }
                        else
                        {
                            $('#alert_ba').hide();
                        }
                        $('#link_ba').attr("href", "{{ url('download/kasus-ba') }}/"+id)
                        $('#status_kasus').val(data.kasus.status)
                        $("input[name=kewenangan][value='"+data.kasus.kewenangan+"']").prop("checked",true);
                        $("input[name=bidang][value='"+data.kasus.bidang+"']").prop("checked",true);
                        console.log(data.kasus.keterangan_kewenangan)
                        if (data.kasus.kewenangan == '1') {
                            $('#div_kota').hide();
                            $('#div_opd').show();
                            $('#opd').val(data.kasus.keterangan_kewenangan).change()
                            $('#kota').val($("#kota option:first").val())
                        }
                        else if(data.kasus.kewenangan == '2'){

                            $('#div_kota').show();
                            $('#div_opd').hide();
                            $('#kota').val(data.kasus.keterangan_kewenangan).change()
                            $('#opd').val($("#opd option:first").val())
                        }
                        else {
                            $('#div_kota').hide();
                            $('#div_opd').hide();
                            $('#kota').val($("#kota option:first").val())
                            $('#opd').val($("#opd option:first").val())
                        }
                    }
                }
              }) 
    }
    function deleteKasus(id){
        Swal.fire({   
                      title: "Anda Yakin?",   
                      text: "Data Kasus akan terhapus",   
                      icon: "warning",   
                      showCancelButton: true,   
                      confirmButtonColor: "#e6b034",   
                      confirmButtonText: "Ya, Hapus Kasus" 
                       
                  }).then((result) => {
            if (result.value) {
                $.ajax({
                            method:'POST',
                            url:'{{ url("kasus/delete") }}',
                            data:{
                              id:id,
                              '_token': $('input[name=_token]').val()
                            },
                            success:function(data){
                                Swal.fire({title:"Terhapus!", text:"Kasus berhasil terhapus dari sistem", icon:"success"}
                                ).then((result) => {
                                    location.reload()
                                })
                              
                            }
                          }) 
            } 
         });
    }

    function kasandra(id)
    {
        $('#idkasandra').val(id)
         $.ajax({
                method:'POST',
                url:'{{ url("kasus/modal/show-kasandra") }}',
                data:{
                  id:id,
                  '_token': $('input[name=_token]').val()
                },
                success:function(data){
                  $('#table-kasandra').html(data.view);
                }
              }) 
    }
    function lihatKasandra(){
        window.open('{{ url('popup/kasandra-kasus') }}/'+$('#idkasandra').val(), 'Pilih Perda', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1800, height=700');
    }


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
    toastr.success("DATA KASUS BERHASIL DITAMBAHKAN");
</script>
@endif

@if(Session::get('success_verif'))
<script type="text/javascript">
    toastr.success("KASUS BERHASIL DIVERIFIKASI");
</script>
@endif
@endsection