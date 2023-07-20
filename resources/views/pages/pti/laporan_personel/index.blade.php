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
    @include('pages.pti.laporan_personel.sekretariat')
    @include('pages.pti.laporan_personel.gakda')
    @include('pages.pti.laporan_personel.tibum')
    @include('pages.pti.laporan_personel.damkar')
    @include('pages.pti.laporan_personel.linmas')
</body>