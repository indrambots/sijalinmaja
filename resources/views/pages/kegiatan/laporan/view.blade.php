<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title></title>
	<style type="text/css">
           body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 15mm;
        margin:1.5cm 1.2cm 1.5cm 1.2cm;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 257mm;
        outline: 2cm #FFEAEA solid;
    }
    
    @page {
        size: F4;
        margin: 0;
    }
    @media print {
        .pagebreak { page-break-before: always; }
        html, body {
            width: 210mm;
            height: 330mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
 p { color: black; font-family:"Tahoma", sans-serif; font-style: normal; text-decoration: none; font-size: 11pt; margin:0pt; }
 h2 { color: black; font-family:"Tahoma", sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 14pt; }
 h1 { color: black; font-family:"Times New Roman", sans-serif; font-style: normal; text-decoration: none; font-size: 18pt; }
 h4 { color: black; font-family:"Tahoma", sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 11pt; }
 h5 { color: black; font-family:"Times New Roman", sans-serif; font-style: normal; font-weight: bold; text-decoration: underline; font-size: 14pt; line-height:0pt; }
 a { color: #00AEEE; font-family:"Times New Roman", serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 11pt; }
 .s2 { color: black; font-family:"Times New Roman", serif; font-style: normal; font-weight: bold; text-decoration: underline; font-size: 14pt; }
 .s3 { color: black; font-family:"Tahoma", sans-serif; font-style: normal; font-weight: bold;  font-size: 11pt; }
 .s4 { color: black; font-family:"Tahoma", sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 11pt; }
 .s5 { color: black; font-family:"Tahoma", sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 12pt; }
 .s6 { color: black; font-family:"Tahoma", sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 12pt; }
 .s7 { color: black; font-family:"Times New Roman", serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 11pt; }
 .s8 { color: black; font-family:"Tahoma", sans-serif; font-style: normal; font-weight:bold; font-size: 11pt; }
 li {display: block; }
 h3 { color: black; font-family:"Times New Roman", sans-serif; font-style: normal; font-weight: bold; font-size: 12pt; }
 table, tbody {vertical-align: top; overflow: visible; }
 .s9 { color: black; font-family:"Tahoma", sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 11pt; margin:0pt; }
</style>
</head>
<body>
    <div class="page">
        <p class="s3" style="text-align:center;">
            Laporan Kegiatan {{$kegiatan->bentuk_kegiatan}} {{$kegiatan->judul_kegiatan}}
        </p>
        <table>
            <tr>
                <td width="100px"> Nomor SPT </td>
                <td>:</td>
                <td><p> <strong>{{$kegiatan->spt}}</strong></p></td>
            </tr>
            <tr>
                <td> Lokasi Kegiatan </td>
                <td>:</td>
                <td><p> <strong>{{$kegiatan->lokasi}}</strong></p></td>
            </tr>
            <tr>
                <td> Waktu  Kegiatan </td>
                <td>:</td>
                <td><p> <strong>@if($kegiatan->tanggal_mulai == $kegiatan->tanggal_selesai)
                           {{$kegiatan->hari($kegiatan->tanggal_mulai)}} 
                           Tanggal {{$kegiatan->tgl_indo($kegiatan->tanggal_mulai)}} 
                       @else
                           {{$kegiatan->hari($kegiatan->tanggal_mulai)}} s/d  {{$kegiatan->hari($kegiatan->tanggal_selesai)}}
                           Tanggal {{$kegiatan->tgl_indo_2($kegiatan->tanggal_mulai,$kegiatan->tanggal_selesai)}} 
                       @endif</strong></p></td>
            </tr>
            <tr>
                <td> Nomor SPT </td>
                <td>:</td>
                <td><p> <strong>{{$kegiatan->spt}}</strong></p></td>
            </tr>
        </table>
        <p class="s3" style="text-align:center;">
            Hasil Kegiatan 
        </p><br>
        {!! $kegiatan->hasil_kegiatan!!}
        <p class="s3" style="text-align:center;">
            Dokumentasi 
        </p><br>
        <center>
            <img src="{{ asset('storage/dokumentasi/'.$kegiatan->dokumentasi_1) }}">
            <img src="{{ asset('storage/dokumentasi/'.$kegiatan->dokumentasi_2) }}">
            <img src="{{ asset('storage/dokumentasi/'.$kegiatan->dokumentasi_3) }}">
        </center>
    </div>
<script type="text/javascript">

    // window.print();

</script>
</body>
</html>