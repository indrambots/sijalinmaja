@extends('layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    @if(auth()->user()->level == AliasName::level_satpolpp || auth()->user()->level == AliasName::level_admin)
        <li class="breadcrumb-item pe-3">
            <a href="{{url('anggaran')}}" class="pe-3">Data Kab/Kota</a>
        </li>
    @endif
    <li class="breadcrumb-item px-3 text-muted">Laporan Penegakan Perda</li>
</ol>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

            <ul class="nav nav-tabs nav-tabs-line">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#kabkota">Per Kab Kota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#jatim">Se-Jawa Timur</a>
                </li>
            </ul>
            <div class="tab-content mt-5" id="myTabContent">
                <div class="tab-pane fade show active" id="kabkota" role="tabpanel" aria-labelledby="jatim">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-label"><h4>Rekapitulasi Penegakan Perda</h4></div>
                                    <hr>
                                    <input type="hidden" id="dataColumn" value="{{$dataColumn}}">
                                    <form class="form" id="form">
                                        {{ csrf_field() }}
                                        <table width="40%">
                                            <tbody>
                                                <tr>
                                                    <td>TOTAL TERBANYAK</td>
                                                    <td>: <strong>{{$total->nama_kota}} ( {{$total->jenis}} : {{$total->total}} Data )</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>FILTER KAB/KOTA</td>
                                                    <td>:
                                                        <select name="kotaid" class="form-control select2" onchange="requestData()" style="width:70%">
                                                            <option value="">--Semua--</option>
                                                            @foreach ($kota as $k)
                                                                <option value="{{$k->id}}">{{$k->nama}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                    <div class="row mt-2">
                                        <div id="initGrid"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="jatim" role="tabpanel" aria-labelledby="kt_tab_pane_2">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                     <div class="table-responsive">
                              <table id="datatable" data-page-length="40" data-buttons="['excel','pdf']" class="table table-striped table-hover">
                                <thead>
                                  <tr>
                                    <th>Kabupaten/Kota</th>
                                    @foreach($jenis_pelanggaran as $j)
                                    <th>{{$j->jenis_pelanggaran}}</th>
                                    @endforeach
                                    <th>Total</th>
                                    <th>Terakhir Input</th>
                                  </tr>
                                </thead>
                                <tbody>
@foreach($kabkot as $k)
                                    <tr>
                                        <td>{{$k->nama}}</td>
@foreach($jenis_pelanggaran as $j)
<?php 
    $count = DB::SELECT("SELECT COUNT(*) AS tot FROM penegakan_perda WHERE created_by = ".$k->id." AND jenis_pelanggaran = '".$j->jenis_pelanggaran."' ")[0];
?> 
    <td>{{$count->tot}}</td>
@endforeach
<?php 
    $last_input = \App\PenegakanPerda::where('created_by',$k->id)->orderBy('updated_at','desc')->first();
    $total = DB::SELECT("SELECT COUNT(*) AS tot FROM penegakan_perda WHERE created_by = ".$k->id."")[0];
?>
<td>{{$total->tot}}</td>
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
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    var datatable = $('#datatable').DataTable({ })
    $(document).ready(function () {
        requestData();
    })

    function requestData(){
        $.ajax({
            type: "POST",
            url: "{{ url('anggaran/report/penegakan-grid') }}",
            dataType: "json",
            data: $("#form").serialize(),
            success: function (response) {
                show_grid(response)
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown)
            }
        });
    }

    function show_grid(data) {
        let dataColumn = JSON.parse($("#dataColumn").val());
        var dataGrid = $("#initGrid").dxDataGrid({
            dataSource: data,
            height: 600,
            paging: {
                pageSize: 1000,
            },
            pager: {
                visible: true,
                showNavigationButtons: true,
                showInfo: true,
                showPageSizeSelector: true,
                allowedPageSizes: [100, 250, 500, 1000]
            },
            filterRow: {
                visible: true,
                applyFilter: "auto"
            },
            headerFilter: {
                visible: true
            },
            hoverStateEnabled: true,
            groupPanel: {
                visible: true
            },
            grouping: {
                autoExpandAll: false
            },
            columnAutoWidth: true,
            width: '100%',
            export: {
                enabled: false,
                fileName: "Laporan Penegakan Perda",
                allowExportSelectedData: true
            },
            summary: {
                totalItems: [{
                    column: 'kota',
                    summaryType: 'count',
                    displayFormat: 'Total Data : {0}',
                    showInColumn: 'kota',
                }],
            },
            onToolbarPreparing: function (e) {
                e.toolbarOptions.items.push({
                    widget: 'dxButton',
                    showText: 'always',
                    options: {
                        icon: 'export',
                        onClick: function () {
                            e.component.exportToExcel(false);
                        }
                    },
                    location: 'after'
                });
            },
            allowColumnReordering: true,
            allowColumnResizing: true,
            showBorders: true,
            wordWrapEnabled: true,
            columns: dataColumn,
        }).dxDataGrid("instance");
        return dataGrid;
    }
</script>
@endsection
