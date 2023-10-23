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
        Laporan Hasil Absensi Petugas Tindak Internal (PTI) Dalam Rangka {{$pti->nama_kegiatan}} tanggal {{$pti->tgl_indo($pti->tanggal)}}
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
                <td  bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                PENUGASAN
                </p>
                </td>
                <td bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt"><p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                KEHADIRAN
                </p></td>
            </tr>
            @foreach($kegiatan_personel->skip(0)->take(25) as $k)
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
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->ket}}
                    </p></td>
                <?php $check = DB::SELECT("SELECT * FROM kehadiran_pti WHERE pti_id = ".$pti->id." AND nip = '".$k->nip."' "); ?>
                @if(!empty($check))
                    @if($check[0]->hadir == 0)
                    <td bgcolor="red" style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        TIDAK HADIR
                    </p>
                    @else
                    <td style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        HADIR
                    </p>
                    @endif
                @else
                    <td style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        Belum Absen
                    </p>
                @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="pagebreak"></div>
    <div class="page">
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
                <td  bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                PENUGASAN
                </p>
                </td>
                <td bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt"><p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                KEHADIRAN
                </p></td>
            </tr>
            @foreach($kegiatan_personel->skip(25)->take(25) as $k)
             <tr style="height:26pt">
                <td style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-top: 6pt;padding-right: 8pt;text-indent: 0pt;text-align: right;">
                        {{$loop->iteration+25}}
                    </p>
                </td>
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->nama}}
                    </p>
                </td>  
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->ket}}
                    </p></td>
                <?php $check = DB::SELECT("SELECT * FROM kehadiran_pti WHERE pti_id = ".$pti->id." AND nip = '".$k->nip."' "); ?>
                @if(!empty($check))
                    @if($check[0]->hadir == 0)
                    <td bgcolor="red" style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        TIDAK HADIR
                    </p>
                    @else
                    <td style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        HADIR
                    </p>
                    @endif
                @else
                    <td style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        Belum DiAbsen
                    </p>
                @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="pagebreak"></div>

    <div class="page">
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
                <td  bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                PENUGASAN
                </p>
                </td>
                <td bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt"><p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                KEHADIRAN
                </p></td>
            </tr>
            @foreach($kegiatan_personel->skip(50)->take(25) as $k)
             <tr style="height:26pt">
                <td style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-top: 6pt;padding-right: 8pt;text-indent: 0pt;text-align: right;">
                        {{$loop->iteration+50}}
                    </p>
                </td>
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->nama}}
                    </p>
                </td>  
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->ket}}
                    </p></td>
                <?php $check = DB::SELECT("SELECT * FROM kehadiran_pti WHERE pti_id = ".$pti->id." AND nip = '".$k->nip."' "); ?>
                @if(!empty($check))
                    @if($check[0]->hadir == 0)
                    <td bgcolor="red" style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        TIDAK HADIR
                    </p>
                    @else
                    <td style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        HADIR
                    </p>
                    @endif
                @else
                    <td style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        Belum DiAbsen
                    </p>
                @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="pagebreak"></div>

    <div class="page">
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
                <td  bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                PENUGASAN
                </p>
                </td>
                <td bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt"><p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                KEHADIRAN
                </p></td>
            </tr>
            @foreach($kegiatan_personel->skip(75)->take(25) as $k)
             <tr style="height:26pt">
                <td style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-top: 6pt;padding-right: 8pt;text-indent: 0pt;text-align: right;">
                        {{$loop->iteration+75}}
                    </p>
                </td>
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->nama}}
                    </p>
                </td>  
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->ket}}
                    </p></td>
                <?php $check = DB::SELECT("SELECT * FROM kehadiran_pti WHERE pti_id = ".$pti->id." AND nip = '".$k->nip."' "); ?>
                @if(!empty($check))
                    @if($check[0]->hadir == 0)
                    <td bgcolor="red" style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        TIDAK HADIR
                    </p>
                    @else
                    <td style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        HADIR
                    </p>
                    @endif
                @else
                    <td style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        Belum DiAbsen
                    </p>
                @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="pagebreak"></div>

    <div class="page">
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
                <td  bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                PENUGASAN
                </p>
                </td>
                <td bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt"><p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                KEHADIRAN
                </p></td>
            </tr>
            @foreach($kegiatan_personel->skip(100)->take(25) as $k)
             <tr style="height:26pt">
                <td style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-top: 6pt;padding-right: 8pt;text-indent: 0pt;text-align: right;">
                        {{$loop->iteration+100}}
                    </p>
                </td>
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->nama}}
                    </p>
                </td>  
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->ket}}
                    </p></td>
                <?php $check = DB::SELECT("SELECT * FROM kehadiran_pti WHERE pti_id = ".$pti->id." AND nip = '".$k->nip."' "); ?>
                @if(!empty($check))
                    @if($check[0]->hadir == 0)
                    <td bgcolor="red" style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        TIDAK HADIR
                    </p>
                    @else
                    <td style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        HADIR
                    </p>
                    @endif
                @else
                    <td style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        Belum DiAbsen
                    </p>
                @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="pagebreak"></div>

    <div class="page">
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
                <td  bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                PENUGASAN
                </p>
                </td>
                <td bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt"><p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                KEHADIRAN
                </p></td>
            </tr>
            @foreach($kegiatan_personel->skip(125)->take(25) as $k)
             <tr style="height:26pt">
                <td style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-top: 6pt;padding-right: 8pt;text-indent: 0pt;text-align: right;">
                        {{$loop->iteration+125}}
                    </p>
                </td>
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->nama}}
                    </p>
                </td>  
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->ket}}
                    </p></td>
                <?php $check = DB::SELECT("SELECT * FROM kehadiran_pti WHERE pti_id = ".$pti->id." AND nip = '".$k->nip."' "); ?>
                @if(!empty($check))
                    @if($check[0]->hadir == 0)
                    <td bgcolor="red" style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        TIDAK HADIR
                    </p>
                    @else
                    <td style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        HADIR
                    </p>
                    @endif
                @else
                    <td style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        Belum DiAbsen
                    </p>
                @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="pagebreak"></div>
    <div class="page">
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
                <td  bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                PENUGASAN
                </p>
                </td>
                <td bgcolor="#BDBDBD" style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt"><p class="s8" style="padding-top: 6pt;text-indent: 0pt;text-align: left;">
                KEHADIRAN
                </p></td>
            </tr>
            @foreach($kegiatan_personel->skip(150)->take(25) as $k)
             <tr style="height:26pt">
                <td style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-top: 6pt;padding-right: 8pt;text-indent: 0pt;text-align: right;">
                        {{$loop->iteration+150}}
                    </p>
                </td>
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->nama}}
                    </p>
                </td>  
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->ket}}
                    </p></td>
                <?php $check = DB::SELECT("SELECT * FROM kehadiran_pti WHERE pti_id = ".$pti->id." AND nip = '".$k->nip."' "); ?>
                @if(!empty($check))
                    @if($check[0]->hadir == 0)
                    <td bgcolor="red" style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        TIDAK HADIR
                    </p>
                    @else
                    <td style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        HADIR
                    </p>
                    @endif
                @else
                    <td style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        Belum DiAbsen
                    </p>
                @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="pagebreak"></div>
</body>