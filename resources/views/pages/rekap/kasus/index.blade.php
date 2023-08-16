@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-0" style="padding-bottom:0px; padding-top:10px;">
          <div class="card-title font-weight-bolder">
            <div class="card-label">Report Kasus</div>
          </div>
        </div>
        <div class="card-body">

          <form class="form" id="form">
            {{ csrf_field() }}
        </form>
          <div class="row mt-2">
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
                url : "{{ url('rekap/kasus/kasus-grid') }}",
                dataType : "json",
                data :  $("#form").serialize(),
                success : function(response) {
                    console.log(response.data)
                    show_grid(response)
                },
                error : function(jqXHR, textStatus, errorThrown) {
                    alert(errorThrown)
                }
            });
    })
  function show_grid(data){
    var dataGrid = $("#kegiatan").dxDataGrid({
            dataSource: data,
            height:750,
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
                fileName: "Report Kasus",
                allowExportSelectedData: true
            },
            summary: {
              totalItems: [{
                column: 'id',
                summaryType: 'count',
                displayFormat: 'Total Kasus : {0}',
                showInColumn: 'id',
              }],
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
                    caption: "id",
                    dataField: "id",
                    dataType: "string",
                },
                {
                    caption: "Judul",
                    dataField: "judul",
                    dataType: "string",
                },
                {
                    caption: "Nama Pelanggar",
                    dataField: "nama_pelanggar",
                    dataType: "string", 
                },
                {
                    caption: "NIK Pelanggar",
                    dataField: "nik_pelanggar",
                    dataType: "string",
                },
                {
                    caption: "Alamat Pelanggar",
                    dataField: "alamat_pelanggar",
                    dataType: "string",
                },
                {
                    caption: "Lokus",
                    dataField: "lokasi_kejadian",
                    dataType: "string",
                },
                {
                    caption: "Kota",
                    dataField: "kota",
                    dataType: "string",
                },
                {
                    caption: "Kecamatan",
                    dataField: "kecamatan",
                    dataType: "string",
                },
                {
                    caption: "Kel/Desa",
                    dataField: "kelurahan",
                    dataType: "string",
                },
                {
                    caption: "Waktu Kejadian",
                    dataField: "waktu_kejadian",
                    dataType: "datetime",
                    format:"EEEE, MMMM dd yyyy"
                },
                {
                    caption: "Status",
                    dataField: "status",
                    dataType: "string",
                },
                {
                    caption: "Kewenangan",
                    dataField: "kewenangan",
                    dataType: "string",
                },
                {
                    caption: "Ket Kewenangan",
                    dataField: "keterangan_kewenangan",
                    dataType: "string",
                },
                {
                    caption: "Diampu Bidang",
                    dataField: "bidang",
                    dataType: "string",
                },
                {
                    caption: "Pelapor",
                    dataField: "pelapor",
                    dataType: "string",
                },
                {
                    caption: "No Telp Pelapor",
                    dataField: "no_telp_pelapor",
                    dataType: "string",
                },
                {
                    caption: "Sumber Informasi",
                    dataField: "sumber_informasi",
                    dataType: "string",
                },
                {
                    caption: "Tanggal Informasi",
                    dataField: "tanggal_informasi",
                    dataType: "datetime",
                    format:"EEEE, MMMM dd yyyy"
                },
                {
                    caption: "Tanggal Input",
                    dataField: "created_at",
                    dataType: "datetime",
                    format:"EEEE, MMMM dd yyyy"
                },
                {
                    caption: "Kasus Milik",
                    dataField: "input_by",
                    dataType: "string",
                },
                
            ],
        }).dxDataGrid("instance");
    return dataGrid;
  }
</script>
@endsection