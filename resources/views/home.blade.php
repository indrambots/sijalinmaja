@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        @if(Auth::user()->level == 9 || Auth::user()->level ==2 || Auth::user()->level == 3 || Auth::user()->level == 1)
        <div class="col-lg-4 col-md-4">
            <div class="card mb-6">
                <div class="card-body pt-9 pb-0">
                    <!--begin::Details-->
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                        <div class="flex-grow-1">
                            <!--begin::Title-->
                            <div class="d-flex row-auto">
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
                                        <div class="font-size-h4 font-weight-bolder">{{Auth::user()->pegawai->pangkat}}</div>
                                    </div>
                                    <div class="col mt-2">
                                        <div class="font-size-sm text-muted font-weight-bold">Jabatan</div>
                                        <div class="font-size-h4 font-weight-bolder">{{Auth::user()->pegawai->nama_jabatan}}</div>
                                    </div>
                                    <div class="col mt-2">
                                        <div class="font-size-sm text-muted font-weight-bold">Unit Kerja</div>
                                        <div class="font-size-h4 font-weight-bolder">{{Auth::user()->pegawai->bidang}}</div>
                                        <div class="font-size-h5 font-weight-bolder">{{Auth::user()->pegawai->sub_bidang}}</div>
                                    </div>
                                    <div class="col mt-4">
                                        <div class="font-size-sm text-muted font-weight-bold">Nomor Telephone</div>
                                        <div class="font-size-h4 font-weight-bolder">{{Auth::user()->pegawai->no_telp}}</div>
                                    </div>
                                    <div class="col mt-4">
                                        <div class="font-size-sm text-muted font-weight-bold">ID Instagram</div>
                                        <div class="font-size-h4 font-weight-bolder">{{Auth::user()->pegawai->instagram}}</div>
                                    </div>
                                    <div class="col mt-4">
                                        <div class="font-size-sm text-muted font-weight-bold">Email Aktif</div>
                                        <div class="font-size-h4 font-weight-bolder">{{Auth::user()->pegawai->email}}</div>
                                    </div>
                                    <div class="col mt-4">
                                        <div class="font-size-sm text-muted font-weight-bold">ID Facebook</div>
                                        <div class="font-size-h4 font-weight-bolder">{{Auth::user()->pegawai->facebook}}</div>
                                    </div>
                                    <button href="#" class="btn btn-sm btn-primary me-3" data-toggle="modal" data-target="#modal-profil"><i class="flaticon2-edit"></i> &nbsp; Update Profil Anda</button>
                                    </div>
                                    <!--begin::Info-->                        
                                    <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                    </div>
                                    <!--end::Info-->
                                </div>
                            </div>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Details-->   

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card card-custom gutter-b">
            <div class="card-header bg-warning">
                <div class="card-title">
                    <h3 class="card-label">Penugasan</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="alert alert-custom alert-outline-dark fade show mb-5" role="alert">
                    <div class="alert-icon">
                        <i class="flaticon-warning"></i>
                    </div>
                    <div class="alert-text">DALAM PENGEMBANGAN</div>
                    <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">
                                <i class="ki ki-close"></i>
                            </span>
                        </button>
                    </div>
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
        @endif
        @foreach($data as $d)
         {!! $d !!}
        @endforeach
    </div>

@endsection
@section('script')
    
@if(Session::get('success_profil'))
<script type="text/javascript">
    toastr.success("PROFIL BERHASIL TERUPDATE");
</script>
@endif
@endsection
