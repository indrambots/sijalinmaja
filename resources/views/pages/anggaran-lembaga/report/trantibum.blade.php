@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
                    <li class="breadcrumb-item pe-3">
                        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
                    </li>
                    @if(auth()->user()->level == AliasName::level_satpolpp || auth()->user()->level == AliasName::level_admin)
                        <li class="breadcrumb-item pe-3">
                            <a href="{{url('anggaran')}}" class="pe-3">Data Kab/Kota</a>
                        </li>
                    @endif
                    <li class="breadcrumb-item px-3 text-muted">Laporan Penyelenggaraan Trantibum</li>
                </ol>
            </div>
        </div>
    </div>
</div>
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
                                    @foreach($jenis_kegiatan as $j)
                                    <th>{{$j->nama}}</th>
                                    @endforeach
                                    <th>Total</th>
                                    <th>Terakhir Input</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($kabkot as $k)
                                    <tr>
                                        <td>{{$k->nama}}</td>
                                        @foreach($jenis_kegiatan as $j)
                                        <td>
                                            <?php $giat = DB::SELECT("SELECT COUNT(*) AS total FROM form_kegiatan WHERE created_by = ".$k->id." AND jenis_kegiatan = '".$j->nama."' ORDER BY created_at DESC")[0];
                                            ?>
                                            {{$giat->total}}
                                        </td>
                                        @endforeach
                                        <?php  $total_giat = DB::SELECT("SELECT COUNT(*) AS total, created_at FROM form_kegiatan WHERE created_by = ".$k->id." ORDER BY created_at DESC")[0]; ?>
                                        <td>{{ $total_giat->total }}</td>
                                        <td>{{ date("d F Y", strtotime($total_giat->created_at)) }}</td>
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
