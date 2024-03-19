@extends('layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item pe-3">
        @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_dinas_dan_damkar)
            <a href="{{url('anggaran/kelembagaan')}}" class="pe-3">
                Kelembagaan
            </a>
        @else
            <a href="{{url('anggaran')}}" class="pe-3">
                Data Kab/Kota
            </a>
        @endif
    </li>
    <li class="breadcrumb-item px-3 text-muted">Laporan Data Pegawai Se-Jawa Timur</li>
</ol>
<div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-label"><h4>Laporan Penyelenggaraan Trantibum Se-Jawa Timur</h4></div>
                        <hr>
                        <div class="row mt-2">
                            <div class="table-responsive">
                              <table id="datatable" data-page-length="40" data-buttons="['excel','pdf']" class="table table-striped table-hover">
                                <thead>
                                  <tr>
                                    <th>Kabupaten/Kota</th>
                                    <th>ASN</th>
                                    <th>NON-ASN</th>
                                    <th>Fungsional</th>
                                    <th>Struktural</th>
                                    <th>PPNS</th>
                                    <th>Pria</th>
                                    <th>Wanita</th>
                                    <th>Terakhir Input</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($kabkot as $k)
<?php
$asn = DB::SELECT("SELECT COUNT(*) AS tot FROM pegawai_kab WHERE kab_kota_id = ".$k->kota." AND status_pegawai = 'Pegawai Negeri Sipil (PNS)' OR 'Pegawai Pemerintah dengan Perjanjian Kerja (PPPK)'  ")[0];
$nonasn = DB::SELECT("SELECT COUNT(*) AS tot FROM pegawai_kab WHERE kab_kota_id = ".$k->kota." AND status_pegawai <> 'Pegawai Negeri Sipil (PNS)' OR 'Pegawai Pemerintah dengan Perjanjian Kerja (PPPK)'  ")[0];
$jabatan = DB::SELECT("SELECT COUNT(is_struktural) AS struktural, COUNT(is_dasar_pp) AS diksar ,COUNT(is_ppns) AS ppns, COUNT(is_fungsional) AS fungsional FROM pegawai_kab WHERE kab_kota_id = ".$k->kota."")[0];
$ll = DB::SELECT("SELECT COUNT(*) AS tot FROM pegawai_kab WHERE kab_kota_id = ".$k->kota." AND jenis_kelamin = 'L' ")[0];
$pp = DB::SELECT("SELECT COUNT(*) AS tot FROM pegawai_kab WHERE kab_kota_id = ".$k->kota." AND jenis_kelamin = 'P' ")[0];
$last_input = \App\PegawaiKab::where('kab_kota_id',$k->kota)->orderBy('updated_at','desc')->first();
?>
                                    <tr>
                                        <td>{{$k->nama}}</td>
                                        <td>{{$asn->tot}}</td>
                                        <td>{{$nonasn->tot}}</td>
                                        <td>{{$jabatan->fungsional}}</td>
                                        <td>{{$jabatan->struktural}}</td>
                                        <td>{{$jabatan->ppns}}</td>
                                        <td>{{$ll->tot}}</td>
                                        <td>{{$pp->tot}}</td>
                                        <td>@if(isset($last_input))
                                            {{date("d F Y", strtotime($last_input->updated_at))}}
                                            @else
                                            BELUM MENGISI
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    var datatable = $('#datatable').DataTable({ })
    $(document).ready(function () {
    })

    

</script>
@endsection