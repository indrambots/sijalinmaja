@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-0" style="padding-bottom:0px; padding-top:10px;">
          <div class="card-title font-weight-bolder">
            <div class="card-label">Data Kelembagaan Pemadam Kebakaran dan Penyelamatan di Jawa Timur</div>
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
                url : "{{ url('damkar/report/kelembagaan-grid') }}",
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
            height:600,
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
                fileName: "Data Kelembagaan Damkar Jawa Timur",
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

                {
                    caption: "Kab/Kota",
                    dataField: "kota",
                    dataType: "string",
                    width:150,
                },
                {
                    caption: "Nomenlaktur Lembaga",
                    dataField: "lembaga",
                    dataType: "string",
                    width:200,
                },
                {
                    caption: "Nama PD",
                    dataField: "nama_pd",
                    dataType: "string", 
                },
                {
                    caption: "Alamat",
                    dataField: "alamat",
                    dataType: "string",
                },
                {
                    caption: "Email",
                    dataField: "email",
                    dataType: "string",
                },
                {
                    caption: "Anggaran",
                    dataField: "anggaran",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Gabung Dinas",
                    dataField: "gabung_dinas",
                    dataType: "string",
                },
                {
                    caption: "Tipe",
                    dataField: "tipe",
                    dataType: "string",
                },
                {
                    caption: "SPM",
                    dataField: "nilai_spm",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Kepala Perangkat Daerah",
                    dataField: "ka_opd",
                    dataType: "string",
                },
                {
                    caption: "Golongan",
                    dataField: "golongan",
                    dataType: "string",
                },
                
            ],
        }).dxDataGrid("instance");
    return dataGrid;
  }
</script>
@endsection