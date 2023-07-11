@extends('layouts.app')

@section('content')
<div class="col-3 mb-2">
  <div class="card">
    <div class="card-body" style="padding-left: 0; padding-right: 0;">
        <div class="col-12">
          <div class="d-flex justify-content-start">
          <button id="btn-rekam" data-toggle="modal" data-target="#modal-create" type="button" class="btn btn-outline-primary m-b-xs " onclick="createHistory(0)"><i class="fas fa-plus-circle" ></i> Tambah Rekam Jejak Kasus</button>
        </div>
        </div>
    </div>
  </div>
</div>
<div class="col">
  <div class="card">
    <div class="card-body">
      <div class="row justify-content-between">
        <div class="col-12">
          <h5 class="card-title">Rekam Jejak Kasus ID <strong>{{ $kasus->id }} </strong> terkait  {{$kasus->judul}} </h5>
        </div>
      </div>
      <div class="row mt-2">
        <div class="timeline timeline-4">
    <div class="timeline-bar"></div>
    <div class="timeline-items">
      @foreach($kasus->history as $h)
        @if($loop->iteration % 2 == 0)
        <div class="timeline-item timeline-item-right">
        @else
        <div class="timeline-item timeline-item-left">
          @endif
            <div class="timeline-badge">
                <div class="bg-danger"></div>
            </div>

            <div class="timeline-label">
                <span class="text-primary font-weight-bolder">Data terakam pada tanggal {{date('d F Y, H.i',strtotime($h->created_at))}}</span> 
                @if($h->data_pendukung !== null)
                  Lampiran/ data pendukung dapat didownload pada <a class="btn btn-primary" href="{{url('download/kasus-history/'.$h->id)}}"> <i class="fas fa-file-download"></i> LINK INI </a>
                @endif
            </div>

            <div class="timeline-content">
                {{$h->keterangan}}
            </div>
            <div class="timeline-label mt-2">
             Informasi didapat dari <strong> {{$h->oleh}} </strong>
            </div>
        </div>
        @endforeach
    </div>
</div>
      </div>
    </div>
  </div>
</div>
<div id="modal-create" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-left">REKAM JEJAK KASUS</h4>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{url('kasus/history/save')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="kasus_id" id="kasus_id" value="{{$kasus->id}}">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="form-group">
                            <label>Tanggal Masuk Informasi:</label>
                            <input type="text" name="tanggal" value="" id="tanggal" class="datepicker form-control" style="width:95%;">
                        </div>
                        <div class="form-group">
                            <label>Asal Informasi/ Dilakukan oleh:</label>
                            <input type="text" name="oleh" value="" id="oleh" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>File/Data Pendukung yang memuat informasi dimaksud (lebih dari 1 file dijadikan 1 PDF)</label>
                            <input type="file" name="data_pendukung" class="form-control" accept="application/pdf, application/vnd.ms-excel" required >
                        </div>
                        <div class="form-group">
                            <label>Keterangan Informasi :</label>
                            <textarea name="keterangan" id="keterangan" rows="4" class="form-control"></textarea>
                        </div>
                        <button type='submit'  class="btn btn-primary mr-2">SIMPAN REKAM JEJAK</button>
                    </form>
                </div>
              </div>

            </div>
          </div>
@endsection
@section('script')
<script type="text/javascript">
  function createHistory(id){
    $.ajax({
                method:'POST',
                url:'{{ url("kasus/history/create") }}',
                data:{
                  id:id,
                  '_token': $('input[name=_token]').val()
                },
                success:function(data){
                  $('#oleh').val(data.history.oleh)
                  $('#tanggal').val(data.history.tanggal)
                  $('#id').val(id)
                }
              })
  }
  
</script>

@if(Session::get('success'))
<script type="text/javascript">
    toastr.success("DATA REKAM JEJAK KASUS BERHASIL DITAMBAHKAN");
</script>
@endif
@endsection