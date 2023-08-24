@extends('layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item pe-3">
        <a href="{{url('anggaran')}}" class="pe-3">Anggaran Kab/Kota</a>
    </li>
    <li class="breadcrumb-item px-3 text-muted">Laporan Anggaran Kabupaten atau Kota</li>
</ol>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-label"><h4>Laporan Anggaran Kabupaten atau Kota</h4></div>
                <hr>
                <form class="form" id="form">
                    @csrf
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
        $.ajax({
            type: "POST",
            url: "{{ url('anggaran/report/anggaran-grid') }}",
            dataType: "json",
            data: $("#form").serialize(),
            success: function (response) {
                console.log(response.data)
                show_grid(response)
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
            export: {
                enabled: false,
                fileName: "Data Anggaran Kabupaten atau Kota",
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
            columns: [

                {
                    caption: "Kab/Kota",
                    dataField: "kab_kota",
                    dataType: "string",
                    width: 150,
                },
                {
                    caption: "Nomenlaktur Lembaga",
                    dataField: "nomenlaktur",
                    dataType: "string",
                    width: 200,
                },
                {
                    caption: "Nama Kepala Satuan",
                    dataField: "nama_kepala_satuan",
                    dataType: "string",
                },
                {
                    caption: "Golongan",
                    dataField: "golongan",
                    dataType: "string",
                },
                {
                    caption: "Unit Kerja",
                    dataField: "unit_kerja",
                    dataType: "string",
                },
                {
                    caption: "Anggaran",
                    dataField: "anggaran",
                    dataType: "number",
                    format: "#,##0",
                },
                {
                    caption: "Tahun Anggaran",
                    dataField: "tahun_anggaran",
                    dataType: "string",
                },

            ],
        }).dxDataGrid("instance");
        return dataGrid;
    }
</script>
@endsection
