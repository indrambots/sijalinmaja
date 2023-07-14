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
 p { color: black; font-family:"Times New Roman", sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 11pt; margin:0pt; }
 h2 { color: black; font-family:"Tahoma", sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 14pt; }
 h1 { color: black; font-family:"Times New Roman", sans-serif; font-style: normal; text-decoration: none; font-size: 18pt; }
 h4 { color: black; font-family:"Tahoma", sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 11pt; }
 h5 { color: black; font-family:"Times New Roman", sans-serif; font-style: normal; font-weight: bold; text-decoration: underline; font-size: 14pt; line-height:0pt; }
 a { color: #00AEEE; font-family:"Times New Roman", serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 11pt; }
 .s2 { color: black; font-family:"Times New Roman", serif; font-style: normal; font-weight: bold; text-decoration: underline; font-size: 14pt; }
 .s3 { color: black; font-family:"Tahoma", sans-serif; font-style: normal; font-weight: bold; text-decoration: underline; font-size: 11pt; }
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
        <h4 style="padding-top: 9pt;padding-left: 0pt;text-indent: 0pt;text-align: center;">
        Laporan Hasil Absensi Petugas Tindak Internal (PTI) Periode {{ $pti[0]->tgl_indo_2($tanggal_mulai,$tanggal_selesai)}}
        </h4>
        <p style="text-indent: 0pt;text-align: left;">
        </p>
        <table cellspacing="0" style="border-collapse:collapse;width:100%;">
            <tr style="height:26pt">
                <td bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: center;">
                        NO.
                    </p>
                </td>
                <td bgcolor="#BDBDBD" style="width:120pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: center;">
                        NAMA
                    </p>
                </td>
                @foreach($pti as $p)
                <td bgcolor="#BDBDBD" style="width:75pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        {{ $p->nama_kegiatan }}
                    </p>
                </td>
                @endforeach
            </tr>
            <tr>
                <td  bgcolor="yellow" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" colspan="{{count($pti)+2}}">
                <p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                SEKRETARIAT
                </p>
                </td>
            </tr>
            @foreach($sekret->skip(0)->take(25) as $k)
             <tr style="height:26pt">
                <td style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-top: 6pt;padding-right: 8pt;text-indent: 0pt;text-align: right;">
                        {{$loop->iteration}}
                    </p>
                </td>
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->nama}}
                    </p>
                </td>
                @foreach($pti as $p)
                <?php $check = DB::SELECT("SELECT COUNT(nip) AS jum FROM kehadiran_pti k WHERE k.hadir = 0 AND k.nip = '".$k->nip."' AND pti_id = ".$p->id)[0];?>
                @if($check->jum > 0)
                <td bgcolor="red" style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                @else
                <td  style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                @endif
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        {{$check->jum}}
                    </p>
                </td>
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
    <div class="pagebreak"></div>
    <div class="page">
        <h4 style="padding-top: 9pt;padding-left: 0pt;text-indent: 0pt;text-align: center;">
        Laporan Hasil Absensi Petugas Tindak Internal (PTI) Periode {{ $pti[0]->tgl_indo_2($tanggal_mulai,$tanggal_selesai)}}
        </h4>
        <p style="text-indent: 0pt;text-align: left;">
        </p>
        <table cellspacing="0" style="border-collapse:collapse;width:100%;">
            <tr style="height:26pt">
                <td bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: center;">
                        NO.
                    </p>
                </td>
                <td bgcolor="#BDBDBD" style="width:120pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: center;">
                        NAMA
                    </p>
                </td>
                @foreach($pti as $p)
                <td bgcolor="#BDBDBD" style="width:75pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        {{ $p->nama_kegiatan }}
                    </p>
                </td>
                @endforeach
            </tr>
            <tr>
                <td  bgcolor="yellow" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt" colspan="{{count($pti)+2}}">
                <p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                SEKRETARIAT
                </p>
                </td>
            </tr>
            @foreach($sekret->skip(25)->take(25) as $k)
             <tr style="height:26pt">
                <td style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-top: 6pt;padding-right: 8pt;text-indent: 0pt;text-align: right;">
                        {{$loop->iteration}}
                    </p>
                </td>
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->nama}}
                    </p>
                </td>
                @foreach($pti as $p)
                <?php $check = DB::SELECT("SELECT COUNT(nip) AS jum FROM kehadiran_pti k WHERE k.hadir = 0 AND k.nip = '".$k->nip."' AND pti_id = ".$p->id)[0];?>
                @if($check->jum > 0)
                <td bgcolor="red" style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                @else
                <td  style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                @endif
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        {{$check->jum}}
                    </p>
                </td>
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
</body>