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
            url: "{{ url('anggaran/report/sarpras-grid') }}",
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
                fileName: "Data Sarpras",
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
                    caption: "Kab/Kota",
                    dataField: "nama_kota",
                    dataType: "string",
                },
                {
                    caption: "Layak",
                    dataField: "layak",
                    dataType: "string",
                    width: 120,
                },
                {
                    caption: "Tidak Layak",
                    dataField: "tidak_layak",
                    dataType: "string",
                    width: 120,
                },
                {
                    caption: "Total",
                    dataField: "total",
                    width: 120,
                }

            ],
            customizeColumns: function(columns) {
                columns[0].cellTemplate = function(callback, res) {
                    $(callback).html(`
                        <a href="javascript:;" onclick="getDetailData('`+res.data.kotaid+`')">
                            `+res.data.nama_kota+`
                        </a>
                    `);
                },
                columns[3].cellTemplate = function(callback, res) {
                    let total = res.data.total ? res.data.total : '';
                    $(callback).html(`
                        <a href="javascript:;" onclick="getDetailData('`+res.data.kotaid+`')">
                            `+total+`
                        </a>
                    `);
                }
            }

        }).dxDataGrid("instance");
        return dataGrid;
    }

    function getDetailData(kotaid){
        $.ajax({
            url: "{{url('anggaran/report/sarpras/detail')}}",
            method: 'post',
            data: {
                kotaid: kotaid,
            },
            success: function(res){
                $('#set-data').html(res);
                $('#modal-sarpras').modal('show');
            }
        });
    }
</script>
@endsection
