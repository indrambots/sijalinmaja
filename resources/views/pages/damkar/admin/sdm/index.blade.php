@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-0" style="padding-bottom:0px; padding-top:10px;">
          <div class="card-title font-weight-bolder">
            <div class="card-label">Data Jumlah SDM Damkar Berdasarkan Golongan di Jawa Timur</div>
          </div>
        </div>
        <div class="card-body">
             <ul class="nav nav-tabs nav-bold nav-tabs-line">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#sdm_golongan">
                        <span class="nav-text">Jumlah SDM Damkar Berdasarkan Golongan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#sdm_fungsional">
                        <span class="nav-text">Jumlah SDM Damkar Berdasarkan Jabatan Fungsional</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#sdm_kualifikasi">
                        <span class="nav-text">Jumlah SDM Damkar Berdasarkan Kualifikasi</span>
                    </a>
                </li>
            </ul>

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="sdm_golongan" role="tabpanel" aria-labelledby="sdm_golongan">
                                      <form class="form" id="form">
                                        {{ csrf_field() }}
                                    </form>
                                      <div class="row mt-2">
                                        <div id="golongan"></div>
                                      </div>
                                </div>
                                <div class="tab-pane fade" id="sdm_fungsional" role="tabpanel" aria-labelledby="sdm_fungsional">
                                    <form class="form" id="form">
                                    {{ csrf_field() }}
                                    </form>
                                  <div class="row mt-2">
                                    <div id="fungsional"></div>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="sdm_kualifikasi" role="tabpanel" aria-labelledby="sdm_kualifikasi">
                                  <form class="form" id="form">
                                    {{ csrf_field() }}
                                </form>
                                  <div class="row mt-2">
                                    <div id="kualifikasi"></div>
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
    $(document).ready(function(){
        $.ajax({
                type : "POST",
                url : "{{ url('damkar/report/sdm-grid') }}",
                dataType : "json",
                data :  $("#form").serialize(),
                success : function(response) {
                    show_grid(response)
                },
                error : function(jqXHR, textStatus, errorThrown) {
                    alert(errorThrown)
                }
            });

        $.ajax({
                type : "POST",
                url : "{{ url('damkar/report/sdm-grid') }}",
                dataType : "json",
                data :  $("#form").serialize(),
                success : function(response) {
                    show_grid_fungsional(response)
                },
                error : function(jqXHR, textStatus, errorThrown) {
                    alert(errorThrown)
                }
            });

        $.ajax({
                type : "POST",
                url : "{{ url('damkar/report/sdm-grid') }}",
                dataType : "json",
                data :  $("#form").serialize(),
                success : function(response) {
                    show_grid_kualifikasi(response)
                },
                error : function(jqXHR, textStatus, errorThrown) {
                    alert(errorThrown)
                }
            });
    })
  function show_grid(data){
    var dataGrid = $("#golongan").dxDataGrid({
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
                  mode: 'virtual',
                  rowRenderingMode: 'virtual',
                
            },
            columnAutoWidth: true,
            export: {
                enabled: false,
                fileName: "Jumlah SDM Berdasarkan Golongan",
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
                    dataField: "nama",
                    dataType: "string",
                    width:150,
                },
                {
                    caption: "Total Keseluruhan",
                    dataField: "sdm_seluruhnya",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "PNS",
                    dataField: "pns",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "non pns",
                    dataField: "non_pns",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "gol_iv",
                    dataField: "gol_iv",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "gol_iii",
                    dataField: "gol_iii",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "struktural",
                    dataField: "jabatan_struktural",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "fungsional",
                    dataField: "jabatan_fungsional",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "pelaksana",
                    dataField: "jabatan_pelaksana",
                    dataType: "number",
                    format:"#,##0",
                },
                
                
                
            ],
        }).dxDataGrid("instance");
    return dataGrid;
  }


  function show_grid_fungsional(data){
    var dataGrid = $("#fungsional").dxDataGrid({
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
            // scrolling: {
            //       mode: 'virtual',
            //       rowRenderingMode: 'virtual',
                
            // },
            columnAutoWidth: true,
            export: {
                enabled: false,
                fileName: "Jumlah SDM Fungsional",
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
                    dataField: "nama",
                    dataType: "string",
                    width:150,
                },
                {
                    caption: "analis_kebakaran_pertama",
                    dataField: "analis_kebakaran_pertama",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "analis_kebakaran_muda",
                    dataField: "analis_kebakaran_muda",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "analis_kebakaran_madya",
                    dataField: "analis_kebakaran_madya",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "jf kebakaran pemula",
                    dataField: "jf_pemula",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "jf kebakaran terampil",
                    dataField: "jf_terampil",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "jf kebakaran mahir",
                    dataField: "jf_mahir",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "jf kebakaran penyelia",
                    dataField: "jf_penyelia",
                    dataType: "number",
                    format:"#,##0",
                },
                
                
                
            ],
        }).dxDataGrid("instance");
    return dataGrid;
  }

  function show_grid_kualifikasi(data){
    var dataGrid = $("#kualifikasi").dxDataGrid({
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
            // scrolling: {
            //       mode: 'virtual',
            //       rowRenderingMode: 'virtual',
                
            // },
            columnAutoWidth: true,
            export: {
                enabled: false,
                fileName: "Jumlah SDM Berdasarkan Kualifikasi",
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
                    dataField: "nama",
                    dataType: "string",
                    width:150,
                },
                {
                    caption: "PNS Tersertifikasi Pemadam Kebakaran",
                    dataField: "tersertifikasi_pns",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Non PNS Tersertifikasi Pemadam Kebakaran",
                    dataField: "tersertifikasi_non_pns",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Keahlian Pemadam 1",
                    dataField: "kualifikasi_pemadam_1",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Keahlian Pemadam 2",
                    dataField: "kualifikasi_pemadam_2",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Keahlian Inspektur",
                    dataField: "kualifikasi_inspektur",
                    dataType: "number",
                    format:"#,##0",
                },
                
                {
                    caption: "Keahlian penyuluh",
                    dataField: "kualifikasi_penyuluh",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Keahlian investigator",
                    dataField: "kualifikasi_investigator",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Keahlian instruktur",
                    dataField: "kualifikasi_instruktur",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Keahlian Kebakaran Lain",
                    dataField: "kualifikasi_kebakaran_lain",
                    dataType: "number",
                    format:"#,##0",
                },
                
                
            ],
        }).dxDataGrid("instance");
    return dataGrid;
  }
</script>
@endsection