@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-0" style="padding-bottom:0px; padding-top:10px;">
          <div class="card-title font-weight-bolder">
            <div class="card-label">Data Kejadian Kebakaran</div>
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
                url : "{{ url('damkar/report/kejadian-grid') }}",
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
            height:800,
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
                rowRenderingMode: 'virtual',
                columnRenderingMode: 'virtual',
            },
            columnAutoWidth: true,
            export: {
                enabled: false,
                fileName: "Data Kejadian di Jawa Timur",
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
                    caption: "Jenis Kejadian",
                    dataField: "jenis_kejadian",
                    dataType: "string",
                },
                {
                    caption: "Jenis Objek",
                    dataField: "jenis_objek",
                    dataType: "string",
                },
                {
                    caption: "Objek",
                    dataField: "objek",
                    dataType: "string", 
                },
                {
                    caption: "Sumber",
                    dataField: "sumber",
                    dataType: "string",
                },
                {
                    caption: "Kota/Kab",
                    dataField: "kota",
                    dataType: "string",
                },
                {
                    caption: "Kecamatan",
                    dataField: "kecamatan",
                    dataType: "string",
                },
                {
                    caption: "Kelurahan",
                    dataField: "kelurahan",
                    dataType: "string",
                },
                {
                    caption: "Alamat",
                    dataField: "alamat",
                    dataType: "string",
                },
                {
                    caption: "Tanggal Kejadian",
                    dataField: "tanggal_kejadian",
                    dataType: "string",
                },
                {
                    caption: "Jam",
                    dataField: "jam",
                    dataType: "string",
                },
                {
                    caption: "Respon Time",
                    dataField: "respon_time",
                    dataType: "string",
                },
                {
                    caption: "Respon Time",
                    dataField: "respon_time",
                    dataType: "string",
                },
                {
                    caption: "Korban",
                    dataField: "korban",
                    dataType: "string",
                },
                {
                    caption: "Nilai Kerugian",
                    dataField: "kerugian",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "kendala",
                    dataField: "kendala",
                    dataType: "string",
                },
                {
                    caption: "Jumlah Armada",
                    dataField: "jumlah_armada",
                    dataType: "string",
                },
                {
                    caption: "Jumlah Armada",
                    dataField: "jumlah_personel",
                    dataType: "string",
                },
                {
                    caption: "Sumber Berita",
                    dataField: "sumber_berita",
                    dataType: "string",
                },
                
            ],
        }).dxDataGrid("instance");
    return dataGrid;
  }
</script>
@endsection