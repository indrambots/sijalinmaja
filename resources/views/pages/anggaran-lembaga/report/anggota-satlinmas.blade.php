@extends('layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item pe-3">
        <a href="{{url('anggaran')}}" class="pe-3">Data Kab/Kota</a>
    </li>
    <li class="breadcrumb-item px-3 text-muted">Laporan Sarpras</li>
</ol>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-label"><h4>Data Sarpras</h4></div>
                <hr>
                <form class="form" id="form">
                    <table width="30%">
                        <tbody>
                            <tr>
                                <td>TOTAL SATLINMAS</td>
                                <td>: <strong>{{$total_satlinmas}}</strong></td>
                            </tr>
                            <tr>
                                <td>SATLINMAS TERBANYAK</td>
                                <td>: <strong>{{$satlinmas_terbanyak['nama_kota']}}, {{$satlinmas_terbanyak['total']}} Data</strong></td>
                            </tr>
                        </tbody>
                    </table>

                    {{ csrf_field() }}
                </form>
                <div class="row mt-2">
                    <div id="initGrid"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-sarpras" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-left">Detail <span class="set-title"></span></h4>
            </div>
            <div class="modal-body" id="set-data" style="padding:0px;max-height:80vh;overflow-y:scroll"></div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            type: "POST",
            url: "{{ url('anggaran/report/satlinmas-grid') }}",
            dataType: "json",
            data: $("#form").serialize(),
            success: function (response) {
                show_grid(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown)
            }
        });
    })
    function show_grid(data) {
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
                fileName: "Data Anggota Satlinmas",
                allowExportSelectedData: true
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
            columns: [
                {
                    caption: "Kabupaten/Kota",
                    dataField: "nama_kota",
                    dataType: "string",
                },
                {
                    caption: "Jumlah Pria",
                    dataField: "total_pria",
                    dataType: "string",
                    width: 130,
                },
                {
                    caption: "Jumlah Wanita",
                    dataField: "total_wanita",
                    width: 130,
                },
                {
                    caption: "Total",
                    dataField: "total",
                    dataType: "string",
                    width: 130,
                }

            ]

        }).dxDataGrid("instance");

        return dataGrid;
    }
</script>
@endsection
