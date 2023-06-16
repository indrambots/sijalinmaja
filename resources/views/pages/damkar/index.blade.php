@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
@if($profil->id > 0)
<div class="col-md-4">

<div class="card card-custom mb-4">
     <div class="card-header">
          <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-graph-1 text-primary"></i>
                    </span>
           <h3 class="card-label">
            <small style="color: black;">Nilai SPM Urusan Kebakaran dan Penyelamatan</small>
           </h3>
          </div>
                <div class="card-toolbar">
                    <a href="javascript:void(0)" class="btn btn-sm btn-success font-weight-bold" data-toggle="modal" data-target="#modal-spm">
                        <i class="flaticon2-pen"></i> Perbaharui Nilai
                    </a>
                </div>
         </div>
         <div class="card-body">
            <div class="d-flex row-auto justify-content-center">
                <div class="d-flex flex-column">
                        <div class="text-center">
                            <div class="text-muted mb-2">Nilai SPM</div>
                            <h4 class="font-weight-bold my-2">{{$profil->nilai_spm}}</h4>
                            @if($profil->spm !== null)
                            <a href="{{ url('download/spm-damkar') }}" target="_blank" class="btn btn-outline-primary btn-md"><i class="flaticon-doc"></i>Dokumen Pendukung </a>
                            @else
                            <div class="alert alert-secondary" role="alert">Anda belum memperbaharui NILAI SPM</div>
                            @endif
                        </div>
                </div>
            </div>
         </div>
    </div>
<div class="card mb-6">
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap">
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex row-auto justify-content-center">
                    <!--begin::User-->
                    <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <!--end::Name-->
                        <div class="text-center mb-10">
                            <div class="symbol symbol-60 symbol-circle symbol-xl-90">
                                <div class="symbol-label" style="background-image:url('{{ asset('assets/logo/damkar.png') }}')"></div>
                            </div>
                            <div class="text-muted mb-2">Nomenlaktur Perangkat Daerah</div>
                            <h4 class="font-weight-bold my-2">{{$profil->nama_pd}}</h4>

                        <div class="col mt-4">
                            <div class="font-size-sm text-muted font-weight-bold">Nomenlaktur Lembaga</div>
                            <div class="font-size-h4 font-weight-bolder">{{ $profil->lembaga }}</div>
                        </div>
                        @if($profil->is_bergabung == 1)
                        <div class="col mt-2">
                            <div class="font-size-sm text-muted font-weight-bold">Nomenlaktur Bidang</div>
                            <div class="font-size-h4 font-weight-bolder">{{$profil->nama_bidang}}</div>
                        </div>
                        @endif
                        <div class="col mt-2">
                            <div class="font-size-sm text-muted font-weight-bold">TIPELOGI</div>
                            <div class="font-size-h4 font-weight-bolder">{{$profil->tipe}}</div>
                        </div>
                        <div class="col mt-2">
                            <div class="font-size-sm text-muted font-weight-bold">Kepala Perangkat Daerah</div>
                            <div class="font-size-h4 font-weight-bolder">{{$profil->ka_opd}}</div>
                            <div class="font-size-sm font-weight-bolder" style="text-decoration:underline;">{{$profil->golongan}}</div>
                        </div>
                        <div class="col mt-4">
                            <div class="font-size-sm text-muted font-weight-bold">Alamat Kantor</div>
                            <div class="font-size-h4 font-weight-bolder">{{$profil->alamat}}</div>
                        </div>
                        <div class="col mt-2 mb-4">
                            <div class="font-size-sm text-muted font-weight-bold">Anggaran</div>
                            <div class="font-size-h4 font-weight-bolder">Rp. {{number_format($profil->anggaran,2,',','.')}}</div>
                        </div>
                        <button href="#" class="btn btn-sm btn-primary me-3" data-toggle="modal" data-target="#modal-profil"><i class="flaticon2-edit"></i> &nbsp; Update Profil Kelembagaan</button>
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
@else
<div class="alert alert-custom alert-dark" role="alert">
    <div class="alert-icon">
        <i class="flaticon-warning"></i>
    </div>
    <div class="alert-text">Anda Belum Mengisi Kelengkapaan Profil Kelembagaan Silahkan <button data-toggle="modal" data-target="#modal-profil" class="btn btn-lg btn-primary"> Klik Disini </button> untuk mengisi profil kelembagaan</div>
</div>
@endif
        <div class="col-8 col-lg-8 col-xl-8 mb-2">
            <div class="row">
                <div class="col-12 mb-5">

                    <div class="card card-custom wave wave-animate-fast wave-primary">
                        <div class="card-body text-center">
                            <a href="{{ url('damkar/laporan-kejadian') }}">
                                <span class="svg-icon svg-icon-primary svg-icon-6x">
                                    <i class="icon-6x text-info mb-10 mt-10 fa-solid flaticon2-warning" aria-hidden="true"></i>
                                </span>
                            </a>
                            <br>
                            <a href="{{ url('damkar/laporan-kejadian') }}"
                                class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">Laporan Kejadian Kebakaran dan Non Kebakaran
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                     <div class="card card-custom gutter-b">
                        <div class="card-header card-header-tabs-line">
                            <div class="card-toolbar">
                                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#sarana_pencegahan">
                                            <span class="nav-text">Sarana Pencegahan</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#sarana_pemadaman_pengendalian">
                                            <span class="nav-text">Sarana Pemadaman dan Pengendalian</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#sarana_penyelamatan">
                                            <span class="nav-text">Sarana Penyelamatan</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#sarana_penanganan_bahan_berbahaya">
                                            <span class="nav-text">Sarana Penanganan Bahan Berhaya dan Beracun</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#prasarana_damkar">
                                            <span class="nav-text">Prasarana Damkar</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="sarana_pencegahan" role="tabpanel" aria-labelledby="sarana_pencegahan">
                                    @include('pages.damkar.tab.sarana_pencegahan')
                                </div>
                                <div class="tab-pane fade" id="sarana_pemadaman_pengendalian" role="tabpanel" aria-labelledby="sarana_pemadaman_pengendalian">
                                    @include('pages.damkar.tab.sarana_pemadaman_pengendalian')                                
                                </div>
                                <div class="tab-pane fade" id="sarana_penyelamatan" role="tabpanel" aria-labelledby="sarana_penyelamatan">
                                    @include('pages.damkar.tab.sarana_penyelamatan')                                
                                </div>
                                <div class="tab-pane fade" id="sarana_penanganan_bahan_berbahaya" role="tabpanel" aria-labelledby="sarana_penanganan_bahan_berbahaya">
                                    @include('pages.damkar.tab.sarana_penanganan_bahan_berbahaya')
                                </div>
                                <div class="tab-pane fade" id="prasarana_damkar" role="tabpanel" aria-labelledby="prasarana_damkar">
                                    @include('pages.damkar.tab.prasarana_damkar')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                     <div class="card card-custom gutter-b">
                        <div class="card-header card-header-tabs-line">
                            <div class="card-toolbar">
                                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#inspeksi_peralatan_potensi_kebakaran">
                                            <span class="nav-text">Sarana Inspeksi Peralatan Potensi Kebakaran</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#investigasi_kejadian_kebakaran">
                                            <span class="nav-text">Sarana Investigasi Kejadian Kebakaran</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#pemberdayaan_masyarakat">
                                            <span class="nav-text">Sarana Pemberdayaan Masyarakat</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#perlindungan_diri_petugas">
                                            <span class="nav-text">Alat Perlindungan Diri Petugas</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="inspeksi_peralatan_potensi_kebakaran" role="tabpanel" aria-labelledby="inspeksi_peralatan_potensi_kebakaran">
                                    @include('pages.damkar.tab.inspeksi_peralatan_potensi_kebakaran')
                                </div>
                                <div class="tab-pane fade" id="investigasi_kejadian_kebakaran" role="tabpanel" aria-labelledby="investigasi_kejadian_kebakaran">
                                    @include('pages.damkar.tab.investigasi_kejadian_kebakaran')
                                </div>
                                <div class="tab-pane fade" id="pemberdayaan_masyarakat" role="tabpanel" aria-labelledby="pemberdayaan_masyarakat">
                                    @include('pages.damkar.tab.pemberdayaan_masyarakat')
                                </div>
                                <div class="tab-pane fade" id="perlindungan_diri_petugas" role="tabpanel" aria-labelledby="perlindungan_diri_petugas">
                                    @include('pages.damkar.tab.perlindungan_diri_petugas')
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <form class="form" method="POST" action="{{url('damkar/profil/save')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                        <div class="form-group">
                            <label>Gabung Dinas :</label>
                            <div class="radio-inline">
                              <label class="radio">
                                <input type="radio" class="is_bergabung" onchange="status_gabung(1)" name="is_bergabung" value="1"><span></span>Ya
                              </label>
                              <label class="radio">
                                <input type="radio" class="is_bergabung" onchange="status_gabung(0)" name="is_bergabung" value="0" ><span></span>Tidak
                              </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nomenlaktur Lembaga :</label>
                            <select class="form-control" name="lembaga" id="lembaga" required>
                                <option value="">--Pilih Nomenlaktur Lembaga--</option>
                                <option value="DINAS">DINAS</option>
                                <option value="SATPOL PP">SATPOL PP</option>
                                <option value="BPBD">BPBD</option>
                                <option value="BIRO">BIRO</option>
                                <option value="BAGIAN">BAGIAN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nomenlaktur Perangkat Daerah:</label>
                            <input class="form-control" type="text" name="nama_pd" id="nama_pd" value="" required placeholder="Satuan Polisi Pamong Praja dan Pemadam Kebakaran Kabupaten XXX">
                            <span class="form-text text-danger">Isi Sesuai Nomenlaktur.</span>
                        </div> 
                        <div class="form-group" id="div_bidang">
                            <label>Nomenlaktur Bidang :</label>
                            <input class="form-control" type="text" name="nama_bidang" id="nama_bidang" value="" placeholder="Sebutkan Nomenklatur Bidang apa, jika masih bergabung dengan Satpol PP atau BPBD">
                            <span class="form-text text-danger">Isi Sesuai Nomenlaktur.</span>
                        </div>

                        <div class="form-group">
                            <label>Tipelogi :</label>
                            <select class="form-control" name="tipe" id="tipe" required>
                                <option value="">--Pilih Tipelogi--</option>
                                <option value="A">TIPE A</option>
                                <option value="B">TIPE B</option>
                                <option value="C">TIPE C</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama Ka OPD :</label>
                            <input class="form-control" type="text" name="ka_opd" id="ka_opd" value="" required placeholder="isikan nama ka opd lengkap dengan gelar">
                        </div>
                        <div class="form-group">
                            <label>Ruang / Golongan :</label>
                            <select class="form-control" name="golongan" id="golongan" required>
                                <option value="">--Pilih Ruang / Golongan--</option>
                                <option value="Pembina / IV a">Pembina / IV a</option>
                                <option value="Pembina Tingkat I / IV b">Pembina Tingkat I / IV b</option>
                                <option value="Pembina Utama Muda / IV c">Pembina Utama Muda / IV c</option>
                                <option value="Pembina Utama Madya / IV d">Pembina Utama Madya / IV d</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alamat Kantor :</label>
                            <input class="form-control" type="text" name="alamat" id="alamat" value="" required placeholder="isikan alamat kantor">
                        </div>
                        <div class="form-group">
                            <label>Email :</label>
                            <input class="form-control" type="text" name="email" id="email" value="" required placeholder="isikan alamat email aktif">
                        </div>
                        <div class="form-group">
                            <label>Anggaran :</label>
                            <input class="form-control rupiah" type="text" name="anggaran" id="anggaran" value="" required placeholder="isikan anggaran damkarmat">
                        </div>
                        <button type='submit'  class="btn btn-primary mr-2">SIMPAN</button>
                    </form>
                    </div>
                </div>
              </div>

            </div>
<div id="modal-spm" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title text-left">FORM PERBAHARUI NILAI SPM</h4>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="{{url('damkar/profil/spm-save')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label>Nilai SPM :</label>
                        <input class="form-control" type="number" name="nilai_spm" step="any" id="nilai_spm" required placeholder="isikan nilai spm">
                    </div>
                    <div class="form-group">
                        <label>Bukti Nilai SPM :</label>
                        <input class="form-control" type="file" name="spm" id="spm" accept="application/pdf,application/vnd.ms-excel" required>
                        <span>Mohon upload bukti nilai SPM yang telah ditandatangani Pejabat terkait</span>
                    </div>
                    <button type='submit'  class="btn btn-primary mr-2">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    var profil = {!!$profil!!}
    console.log(profil)
    if(profil !== undefined)
    {
        $("input[name=is_bergabung][value=" + profil.is_bergabung + "]").attr('checked', 'checked');
        if(profil.is_bergabung == 1){
            $('#div_bidang').show()
        }
        else{
            $('#div_bidang').hide()
        }
        $("#lembaga").val(profil.lembaga).change();
        $("#nama_pd").val(profil.nama_pd);
        $("#nama_bidang").val(profil.nama_bidang);
        $("#tipe").val(profil.tipe).change();
        $("#ka_opd").val(profil.ka_opd);
        $("#golongan").val(profil.golongan).change();
        $("#email").val(profil.email);
        $("#alamat").val(profil.alamat);
        $("#anggaran").val(profil.anggaran);
    }
    function status_gabung(val){
        console.log(val)
        if(val == 1){

            $('#div_bidang').show()
        }
        else{

            $('#div_bidang').hide()
        }
    }
</script>
@if(Session::get('success_profil'))
<script type="text/javascript">
    toastr.success("PROFIL BERHASIL TERUPDATE");
</script>
@endif
@endsection
