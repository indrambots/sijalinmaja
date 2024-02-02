@extends('layouts.app')

@section('content') 
<div class="row mb-2">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header border-0" style="padding-bottom:0px;">
          <div class="card-title font-weight-bolder" style="margin-bottom:-5px;">
            <div class="card-label">CARI PERSONEL YANG TIDAK ADA PENUGASAN</div>
          </div>
        </div>
        <div class="card-body">
          <form class="form" id="frm-penugasan">
            {{ csrf_field() }}
           
            <div class="row">
              <div class="col-lg-2">
                <label class="font-weight-bold mt-5">Tanggal Awal :</label><br>
                <input type="text"  class="datepicker form-control" id="tanggal_mulai" name="tanggal_mulai"  required>
              </div>
              <div class="col-lg-2">
                <label class="font-weight-bold mt-5">Tanggal Akhir:</label><br>
                <input type="text"  class="datepicker form-control" id="tanggal_selesai" name="tanggal_selesai"  required>
              </div>
              <div class="col-lg-2">
                <label class="font-weight-bold mt-5">Bidang :</label><br>
                <select class="form-control" id="bidang">
                    <option class="-">Semua Bidang</option>
                    <option class="SEKRETARIAT">SEKRETARIAT</option>
                    <option class="PENEGAKAN PERATURAN DAERAH">PENEGAKAN PERATURAN DAERAH</option>
                    <option class="KETENTRAMAN DAN KETERTIBAN UMUM">KETENTRAMAN DAN KETERTIBAN UMUM</option>
                    <option class="PELINDUNGAN MASYARAKAT">PELINDUNGAN MASYARAKAT</option>
                    <option class="PEMADAM KEBAKARAN DAN PENYELAMATAN">PEMADAM KEBAKARAN DAN PENYELAMATAN</option>
                </select>
              </div>
          </div>
            <div class="row mt-2">
              <div class="col-lg-3">
                <button type="submit" class="btn btn-lg btn-outline-primary btn-success" id="btnproses"> CARI</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<div class="row" id="row-datatable">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-0" style="padding-bottom:0px; padding-top:10px;">
          <div class="card-title font-weight-bolder">
            <div class="card-label">Personel Di bawah ini merupakan personel yang sedang tidak ada penugasan pada tanggal <span id="tanggal"> </span> </div>
          </div>
        </div>
        <div class="card-body">

        <form class="form" id="form">
            {{ csrf_field() }}
        </form>
          <div class="row mt-2">
            <div class="col-md-12">
                <label>Penugasan Kegiatan</label>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th> Nama </th>
                                <th> Bidang </th>
                                <th> Kompetensi</th>
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
      $('#row-datatable').hide();
    })
     var datatable = $('#datatable').DataTable({
        processing: true,
        serverSide: false,
        paging:true,
        ajax:  {
            "url": '{{ url('kegiatan/penugasan/filter') }}',
            data: function(d){
                d.tanggal_mulai = $('#tanggal_mulai').val();
                d.tanggal_selesai = $('#tanggal_selesai').val();
                d.bidang = $('#bidang').val();
            }
        },
         columns: [
        {data: 'nama', name:'nama'},
        {data: 'bidang', name:'bidang'},
        {data: 'kompetensi', name:'kompetensi'},
        ],
        "order": [[ 1, "asc" ]],
      })
    $('#frm-penugasan').on('submit',function(e){
      $('#row-datatable').slideDown();
        e.preventDefault();
        datatable.ajax.reload();
        $('#tanggal').html($('#tanggal_mulai').val()+' '+$('#tanggal_selesai').val())
    })
</script>
@endsection