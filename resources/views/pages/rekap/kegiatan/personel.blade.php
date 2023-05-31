@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-0" style="padding-bottom:0px; padding-top:10px;">
          <div class="card-title font-weight-bolder">
            <div class="card-label">Report Kegiatan</div>
          </div>
        </div>
        <div class="card-body">

          <form class="form" id="form">
            {{ csrf_field() }}
        </form>
          <div class="row mt-2">
            <div class="table-responsive">
                {{-- <table id="datatable" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th> SPT </th>
                            <th> Jenis Kegiatan</th>
                            <th> Bentuk Kegiatan</th>
                            <th> Judul Kegiatan</th>
                            <th> Lokasi Kegiatan</th>
                            <th> Penanggung Jawab</th>
                            <th> Waktu Kegiatan </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table> --}}
            </div>
            <div id="kegiatan"></div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
                type : "POST",
                url : "{{ url('rekap/kegiatan/personel-grid') }}",
                dataType : "json",
                data :  $("#form").serialize(),
                success : function(response) {
                    console.log(response)
                    show_grid(response.data)
                },
                error : function(jqXHR, textStatus, errorThrown) {
                    alert(errorThrown)
                }
            });
    })
  function show_grid(data){
    var dataGrid = $("#kegiatan").dxDataGrid({
            dataSource: data,
            height:570,
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
                // mode: "virtual",
                rowRenderingMode: 'virtual'
            },
            columnAutoWidth: true,
            export: {
                enabled: false,
                fileName: "Report Kegiatan",
                allowExportSelectedData: true
            },
            onToolbarPreparing: function (e) {
                e.toolbarOptions.items.push({
                    widget: 'dxButton',
                    showText: 'always',
                    options: {
                        icon: 'export',
                        // text: 'Export to Excel',
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
            wordWrapEnabled:true,
            columns: [
                // {
                //     caption: "No",
                //     dataType: "number",
                //     alignment: 'center',
                //     width: 70,
                //     cellTemplate: function(container, row) {
                //         $(container).html(row.rowIndex + 1);
                //     }
                // },
                {
                    caption: "Spt",
                    dataField: "spt",
                    dataType: "string",
                    width:110,
                },
                {
                    caption: "Jenis Kegiatan",
                    dataField: "jenis_kegiatan",
                    dataType: "string", 
                },
                {
                    caption: "Bentuk Kegiatan",
                    dataField: "bentuk_kegiatan",
                    dataType: "string",
                },
                {
                    caption: "Judul Kegiatan",
                    dataField: "judul_kegiatan",
                    dataType: "string",
                },
                {
                    caption: "Lokasi",
                    dataField: "lokasi",
                    dataType: "string",
                },
                {
                    caption: "Tanggal",
                    dataField: "tanggal",
                    dataType: "string",
                },
                {
                    caption: "Jam",
                    dataField: "jam",
                    dataType: "string",
                },
                {
                    caption: "Penanggung Jawab",
                    dataField: "penanggung_jawab",
                    dataType: "string",
                },
                {
                    caption: "Status",
                    dataField: "status",
                    dataType: "string",
                },
                
            ],
        }).dxDataGrid("instance");
    return dataGrid;
  }
</script>
@endsection