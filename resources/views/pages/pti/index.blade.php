@extends('layouts.app')

@section('content')
<div class="col">
  <div class="card">
    <div class="card-body">
      <div class="row justify-content-between">
        <div class="col-4">
          <h5 class="card-title">Data PTI (Petugas Tindak Internal)</h5>
        </div>
        <div class="col-4">
          <div class="d-flex justify-content-end">
          <button onClick="create(0)" data-toggle="modal" data-target="#modal-create" type="button" class="btn btn-outline-primary m-b-xs "><i class="fas fa-plus-circle"></i> INPUT KEGIATAN</button>
        </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>id</th>
                <th>Kegiatan</th>
                <th>Tanggal</th>
                <th>Tidak Hadir</th>
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

        <div id="modal-create" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-left">FORM ABSENSI KEGIATAN</h4>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{url('pti/save')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="idkegiatan" value="">
                        <div class="form-group">
                            <label>JENIS KEGIATAN</label>
                            <div class="radio-inline">
                                <label class="radio">
                                <input type="radio" class="jenis" name="jenis" value="rutin">
                                <span></span>KEGIATAN RUTIN</label>
                                <label class="radio">
                                <input type="radio" class="jenis" name="jenis" value="spt">
                                <span></span>KEGIATAN BER-SPT</label>
                            </div>
                        </div>
                        <div class="form-group row" id="div_spt">
                            <label>Kegiatan</label>
                            <select style="width: 98%;" class="form-control select2" onchange="tanggalSPT(this.value)" name="spt" id="spt">
                                <option value="">--PILIH KEGIATAN--</option>
                                @foreach($kegiatan as $k)
                                    <option value="{{$k->spt}}">{{$k->spt}} | {{$k->bentuk_kegiatan}} {{$k->judul_kegiatan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row" id="div_rutin">
                            <label>Nama Kegiatan</label>
                            <select style="width: 98%;" class="form-control select2" name="nama_kegiatan" id="nama_kegiatan">
                                <option value="">--PILIH KEGIATAN--</option>
                                <option value="SAMAPTA">SAMAPTA/TARUNG DRAJAT</option>
                                <option value="APEL PAGI">APEL PAGI</option>
                                <option value="APEL DADAKAN">APEL DADAKAN</option>
                                <option value="GLAGAPAN RABU">GLAGAPAN RABU</option>
                                <option value="SIDAK RUANGAN">SIDAK RUANGAN</option>
                                <option value="UPACARA HARI BESAR">UPACARA HARI BESAR</option>
                            </select>
                        </div>
                        <div class="form-group row" id="div_spt">
                            <label>Tanggal Kegiatan</label>
                            <input style="width: 98%;" type="text" id="tanggal" name="tanggal" class="form-control datepicker" placeholder="tanggal kegiatan. . ." autocomplete="off">
                        </div>
                        <div class="form-group row">
                            <label>Keterangan Kegiatan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="4" placeholder="Keterangan kegiatan. . ."></textarea>
                        </div>
                        <button type='submit' class="btn btn-primary mr-2">SIMPAN</button>
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
        ajax:'{{ url('pti/datatable') }}',
         columns: [
        {data: 'id', name:'id'},
        {data: 'nama_kegiatan', name:'nama_kegiatan'},
        {data: 'tanggal', name:'tanggal'},
        {data: 'kehadiran', name:'kehadiran'},
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
    $('#div_rutin').hide()
    $('#div_spt').hide()

    $('input[type=radio][name=jenis]').change(function() {
        console.log(this.value)
    if (this.value == 'rutin') {
        $('#div_rutin').show()
        $('#div_spt').hide()
        $('#spt').removeAttr('required');
        $("#spt").val('').change();

    }
    else {
        $('#div_rutin').hide()
        $('#div_spt').show()
        $('#spt').prop('required',true);
    }
    })
    function tanggalSPT(no)
    {
        $.ajax({
          method:'POST',
          url:'{{ url("pti/filter-tanggal-spt") }}',
          data:{
            no: no,
            '_token': $('input[name=_token]').val()
          },
          success:function(data){
            console.log(data)
            if(data.tanggal.tanggal_mulai !== null){
                $('#tanggal').val(data.tanggal.tanggal_mulai);   
            }      
          }
        })
    }
    function create(id)
    {
        $('#idkegiatan').val(id)
        $.ajax({
          method:'POST',
          url:'{{ url("pti/create") }}',
          data:{
            id: id,
            '_token': $('input[name=_token]').val()
          },
          success:function(data){
            console.log(data.pti)
            if(id == 0)
            {
                $('#div_rutin').hide()
                $('#div_spt').hide()
                $('input[name=jenis]').attr('checked', false);
                $('#keterangan').val('')
                $('#tanggal').val('')
            }   
            else
            {
                $('#tanggal').val(data.pti.tanggal)
                $('#keterangan').val(data.pti.keterangan)
                $('input[name=jenis][value='+data.pti.jenis+']').attr('checked', 'checked');
                if(data.pti.jenis == 'rutin'){
                    $('#div_rutin').show()
                    $('#div_spt').hide()
                    $('#spt').removeAttr('required');
                    $("#spt").val('').change();
                    $('#nama_kegiatan').val(data.pti.nama_kegiatan).change();
                }
                else{
                    $('#div_rutin').hide()
                    $('#div_spt').show()
                    $('#spt').prop('required',true); 
                    $("#spt").val(data.pti.spt).change();
                }
            }         
          }
        })
    }
    function absen(id){
        window.open('{{ url('pti/absen') }}/'+id, 'Absen PTI', 'toolbar=no, location=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1800, height=700');
    }
    function deleteKeg(id)
    {
        Swal.fire({   
                      title: "Anda Yakin?",   
                      text: "Data Kegiatan akan terhapus beserta data absennya",   
                      icon: "warning",   
                      showCancelButton: true,   
                      confirmButtonColor: "#e6b034",   
                      confirmButtonText: "Ya, Hapus Kegiatan" 
                       
                  }).then((result) => {
            if (result.value) {
                $.ajax({
                            method:'POST',
                            url:'{{ url("pti/delete") }}',
                            data:{
                              id:id,
                              '_token': $('input[name=_token]').val()
                            },
                            success:function(data){
                                Swal.fire({title:"Terhapus!", text:"Kegiatan  berhasil terhapus dari sistem", icon:"success"}
                                ).then((result) => {
                                    location.reload()
                                })
                              
                            }
                          }) 
            } 
         });
    }
</script>

@if(Session::get('success'))
<script type="text/javascript">
    toastr.success("DATA KEGIATAN BERHASIL DITAMBAHKAN");
</script>
@endif

@endsection