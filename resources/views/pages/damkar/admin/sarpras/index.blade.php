@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header border-0" style="padding-bottom:0px; padding-top:10px;">
          <div class="card-title font-weight-bolder">
            <div class="card-label">Data Sarana dan Prasarana Pemadam Kebakaran dan Penyelamatan di Jawa Timur</div>
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
                url : "{{ url('damkar/report/sarpras-grid') }}",
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
                  mode: 'virtual',
                  rowRenderingMode: 'virtual',
                
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
                    dataField: "nama",
                    dataType: "string",
                    width:150,
                },
                {
                    caption: "Sistem Hydrant",
                    dataField: "sistem_hydrant",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Groundtank",
                    dataField: "groundtank",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Apar",
                    dataField: "alat_pemadam_api_ringan",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Pompa Pemadam Portable",
                    dataField: "pompa_pemadam_portable",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Mobil Pemadam",
                    dataField: "mobil_pemadam_kebakaran",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Mobil Rescue",
                    dataField: "mobil_rescue",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Mobil Tangki Air",
                    dataField: "mobil_tangki_air",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Mobil Komando",
                    dataField: "mobil_komando",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Mobil Angkut Personil",
                    dataField: "mobil_angkut_personil",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Pompa Apung",
                    dataField: "pompa_apung_pemadam",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Pemancar Damkar",
                    dataField: "pemancar_pemadam_kabaran",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Pipa Cabang Damkar",
                    dataField: "pipa_cabang_pemadam_kebakaran",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Sarana Penyelematan pada Pertolongan Pertama",
                    dataField: "sarana_penyelamatan_pada_pertolongan_pertama",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Sarana Penyelamatan pada Beda Ketinggian",
                    dataField: "sarana_penyelamatan_pada_beda_ketinggian",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Sarana Penyelamatan Di Air",
                    dataField: "sarana_penyelamatan_di_air",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Sarana Penyelamatan Pada Binatang",
                    dataField: "sarana_penyelamatan_pada_binatang",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Sarana Penyelamatan Pada Kecelakaan Transportasi",
                    dataField: "sarana_penyelamatan_pada_kecelakaan_transportasi",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Sarana Penyelamatan Pada Bangunan Runtuh",
                    dataField: "sarana_penyelamatan_pada_bangunan_runtuh",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Gas Detector",
                    dataField: "gas_detector",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Peralatan Decontaminasi",
                    dataField: "peralatan_decontaminasi",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Pitot",
                    dataField: "pitot",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Alat Uji Alarm",
                    dataField: "alat_uji_alarm",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Alat Uji Sprinkler",
                    dataField: "alat_uji_sprinkler",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "flowmeter",
                    dataField: "flowmeter",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "anemometer",
                    dataField: "anemometer",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "tachometer",
                    dataField: "tachometer",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "multitester",
                    dataField: "multitester",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "alat ukur",
                    dataField: "alat_ukur",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Helm keselamatan",
                    dataField: "helm_keselamatan",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Sepatu keselamatan",
                    dataField: "sepatu_keselamatan",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "sarung tangan pemadam",
                    dataField: "sarung_tangan_pemadam",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Kampak Personil",
                    dataField: "kampak_personil",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "Sepatu pemadam",
                    dataField: "sepatu_pemadam",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "ht",
                    dataField: "ht",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "scba",
                    dataField: "scba",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "senter",
                    dataField: "senter",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "bangunan",
                    dataField: "bangunan",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "pos kecamatan",
                    dataField: "pos_kecamatan",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "pos kelurahan",
                    dataField: "pos_kelurahan",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "helm pemadam",
                    dataField: "helm_pemadam",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "kacamata pemadam",
                    dataField: "kacamata_pemadam",
                    dataType: "number",
                    format:"#,##0",
                },
                {
                    caption: "masker pemadam",
                    dataField: "masker_pemadam",
                    dataType: "number",
                    format:"#,##0",
                },
                
            ],
        }).dxDataGrid("instance");
    return dataGrid;
  }
</script>
@endsection