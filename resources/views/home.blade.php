@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        @if(Auth::user()->level == 9 || Auth::user()->level ==2 || Auth::user()->level == 3 || Auth::user()->level == 1 || Auth::user()->level == 8)
        <div class="col-lg-4 col-md-4">
            <div class="card mb-6">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <!--end::Name-->
                                    <div class="text-center mb-10">
                                        <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                            <div class="symbol-label" style="background-image:url('{{ asset('assets/logo/sigap.png') }}')"></div>
                                        </div>
                                        <div class="text-muted mb-2">{{Auth()->user()->pegawai->nip}}</div>
                                        <h4 class="font-weight-bold mb-4">{{Auth::user()->pegawai->nama}}</h4>
                                        <h4 class="font-weight-bolder text-info mb-4">ID PRAJA {{Auth::user()->pegawai->praja_id}}</h4> <br>
                                    <div class="col mt-4">
                                        <div class="font-size-sm text-muted font-weight-bold">Pangkat/Golongan/Ruang</div>
                                        <div class="font-size-md  font-weight-bolder">{{Auth::user()->pegawai->pangkat}}</div>
                                    </div>
                                    <div class="col mt-2">
                                        <div class="font-size-sm text-muted font-weight-bold">Jabatan</div>
                                        <div class="font-size-md font-weight-bolder">{{Auth::user()->pegawai->nama_jabatan}}</div>
                                    </div>
                                    <div class="col mt-2">
                                        <div class="font-size-sm text-muted font-weight-bold">Unit Kerja</div>
                                        <div class="font-size-md  font-weight-bolder">{{Auth::user()->pegawai->bidang}}</div>
                                        <div class="font-size-md font-weight-bolder">{{Auth::user()->pegawai->sub_bidang}}</div>
                                    </div>
                                    <div class="col mt-4">
                                        <div class="font-size-sm text-muted font-weight-bold">Nomor Telephone</div>
                                        <div class="font-size-md  font-weight-bolder">{{Auth::user()->pegawai->no_telp}}</div>
                                    </div>
                                    <div class="col mt-4">
                                        <div class="font-size-sm text-muted font-weight-bold">ID Instagram</div>
                                        <div class="font-size-md  font-weight-bolder">{{Auth::user()->pegawai->instagram}}</div>
                                    </div>
                                    <div class="col mt-4">
                                        <div class="font-size-sm text-muted font-weight-bold">Email Aktif</div>
                                        <div class="font-size-md  font-weight-bolder">{{Auth::user()->pegawai->email}}</div>
                                    </div>
                                    <div class="col mt-4">
                                        <div class="font-size-sm text-muted font-weight-bold">ID Facebook</div>
                                        <div class="font-size-md  font-weight-bolder">{{Auth::user()->pegawai->facebook}}</div>
                                    </div>
                                    <button href="#" class="btn btn-sm btn-primary me-3" data-toggle="modal" data-target="#modal-profil"><i class="flaticon2-edit"></i> &nbsp; Update Profil Anda</button>
                                    </div>
                                    <!--begin::Info-->                        
                                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                    </div>
                                    <!--end::Info-->
                                </div>
                            
                    <!--end::Details-->   

                </div>
            </div>
        </div>
        <div class="col-lg-8">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card card-custom gutter-b">
            <div class="card-header bg-warning">
                <div class="card-title">
                    <h3 class="card-label">Penugasan</h3>
                </div>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Kegiatan</th>
                                <th>Waktu Kegiatan</th>
                                <th>Lokasi Kegiatan</th>
                                <th>Seragam</th>
                                <th>Penugasan</th>
                                <th>SPT</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
               </div>
            </div>
        </div>

    <div id="modal-profil" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-left">LENGKAPI PROFIL</h4>
                </div>
                <div class="modal-body">
                    <form class="form" method="POST" action="{{url('profil/save')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="nip" id="nip" value="{{Auth::user()->pegawai->nip}}">
                        <div class="form-group">
                            <label>Nomor HP / WA Aktif :</label>
                            <input class="form-control" type="number" name="no_telp" id="no_telp" value="{{Auth::user()->pegawai->no_telp}}" required placeholder="isikan akun instagram. . .">
                        </div>
                        <div class="form-group">
                            <label>Email (GMAIL):</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{Auth::user()->pegawai->email}}" required placeholder="isikan alamat email aktif">
                        </div>
                        <div class="form-group">
                            <label>Akun Instagram (Tanpa @) :</label>
                            <input class="form-control" type="text" name="instagram" id="instagram" value="{{Auth::user()->pegawai->instagram}}" placeholder="isikan akun instagram. . .">
                        </div>
                        <div class="form-group">
                            <label>Akun Facebook :</label>
                            <input class="form-control" type="text" name="facebook" id="facebook" value="{{Auth::user()->pegawai->facebook}}"  placeholder="isikan akun facebook. . .">
                        </div>
                        <button type='submit'  class="btn btn-primary mr-2">SIMPAN</button>
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
    </div>
</div>

        @foreach($data as $d)
         {!! $d !!}
        @endforeach
</div>
        @else
        @foreach($data as $d)
         {!! $d !!}
        @endforeach
        @endif
</div>
@endsection
@section('script')
<script>
    var datatable = $('#datatable').DataTable({
        processing: true,
        serverSide: false,
        paging:true,
        ajax:'{{ url('kegiatan-datatable') }}',
         columns: [
        {data: 'id', name:'id'},
        {data: 'kegiatan', name:'kegiatan'},
        {data: 'waktu_kegiatan', name:'waktu_kegiatan'},
        {data: 'lokasi', name:'lokasi'},
        {data: 'seragam', name:'seragam'},
        {data: 'ket', name:'ket'},
        {data: 'link_spt', name:'link_spt'},
        {data: 'aksi', name:'aksi'}
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
    function laporan(id){
      $('#id_laporan').val(id)
    }
</script>
@if(Session::get('success_profil'))
<script type="text/javascript">
    toastr.success("PROFIL BERHASIL TERUPDATE");
</script>
@endif
@endsection
