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
    <li class="breadcrumb-item px-3 text-muted">Laporan Penyelenggaraan Trantibum</li>
</ol>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-label"><h4>Laporan Penyelenggaraan Trantibum</h4></div>
                <hr>
                <input type="hidden" id="dataColumn" value="{{$dataColumn}}">
                <form class="form" id="form">
                    {{ csrf_field() }}
                    <table width="40%">
                        <tbody>
                            <tr>
                                <td>TOTAL TERBANYAK</td>
                                <td>: <strong>{{$total->nama_kota}} ( {{$total->jenis_kegiatan}} : {{$total->total}} Kegiatan )</strong></td>
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
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        requestData();
    })

    function requestData(){
        $.ajax({
            type: "POST",
            url: "{{ url('anggaran/report/trantibum-grid') }}",
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
            scrolling: {
                rowRenderingMode: 'virtual'
            },
            columnAutoWidth: true,
            width: '100%',
            export: {
                enabled: false,
                fileName: "Laporan Penyelenggaraan Trantibum",
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
