@extends('layouts.app')

@section('content')
<div class="col">
  <div class="card">
    <div class="card-body">
      <div class="row justify-content-between">
        <div class="col-4">
          <h5 class="card-title">Data User Sistem</h5>
        </div>
      </div>
      <div class="row mt-2">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>id</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th>Level</th>
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
<div id="modal-level" class="modal fade" role="dialog">
            <div class="modal-dialog modal-xl">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-left">Ubah Level User</h4>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{url('user/update-level')}}">
                        {{ csrf_field() }}
                        <input type="hidden" id="id_user" name="id">
                        <div class="form-group">
                            <label>LEVEL:</label>
                            <select class="select2 form-control" style="width:90%;" name="level" required>
                                <option value="">--PILIH LEVEL USER--</option>
                                <option value="1">KASAT/SEKRETARIS</option>
                                <option value="2">KEPALA BIDANG</option>
                                <option value="3">KEPALA SUB BIDANG/SUB BAGIAN</option>
                                <option value="6">ASPRI</option>
                                <option value="7">ADMIN</option>
                                <option value="8">OPERATOR KEGIATAN / SPT</option>
                                <option value="9">STAFF</option>
                                <option value="10">TIM KASANDRA / KASUS</option>
                            </select>
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
        serverSide: false,
        paging:true,
        ajax:'{{ url('user/datatable') }}',
         columns: [
        {data: 'id', name:'id'},
        {data: 'name', name:'name'},
        {data: 'username', name:'username'},
        {data: 'jabatan', name:'jabatan'},
        {data: 'level', name:'level'},
        {data: 'aksi', name:'aksi'},
        ],
        "order": [[ 0, "asc" ]],
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
          ],
      })
    function updateLevel(id)
    {
        $('#id_user').val(id)
    }
    function resetPassword(id)
    {
         Swal.fire({   
                      title: "Anda Yakin?",   
                      text: "Password akan direset",   
                      icon: "warning",   
                      showCancelButton: true,   
                      confirmButtonColor: "#e6b034",   
                      confirmButtonText: "Ya, Reset Password" 
                       
                  }).then((result) => {
            if (result.value) {
                $.ajax({
                            method:'POST',
                            url:'{{ url("user/reset-password") }}',
                            data:{
                              id:id,
                              '_token': $('input[name=_token]').val()
                            },
                            success:function(data){
                                Swal.fire({title:"Berhasil!", text:"Password Berhasil Tereset", icon:"success"}
                                ).then((result) => {
                                    location.reload()
                                })
                              
                            }
                          }) 
            } 
         });
    }

</script>

@if(Session::get('success_level'))
<script type="text/javascript">
    toastr.success("BERHASIL MERUBAH HAK AKSES LEVEL USER");
</script>
@endif
@endsection