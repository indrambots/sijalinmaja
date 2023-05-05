<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

            @inject('nip', 'App\KegiatanPersonel')
    <div class="page">
    	<table style="overflow:visible;margin-bottom: -10px; margin-top: -5px;">
    		<tr>
    			<td style="width:80pt"><img alt="image" height="112" src="{{asset('media/bg/logo_jatim.gif')}}" width="74"/></td>
    			<td style="text-align: center; line-height: 1px">
                        <h3 style="font-weight: bold; line-height:5pt;">PEMERINTAH PROVINSI JAWA TIMUR</h3>
                        <h1 style="line-height:5pt;">SATUAN POLISI PAMONG PRAJA</h1>
                        <p >Jl. Jagir Wonokromo No. 352 Telp. (031) 8412159 Fax. (031) 8412259 Kode Pos 60244<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        	 Website –  <a href="mailto:satpolppjatim1950@gmail.com" style='font-family:"Times New Roman", serif; font-style: normal; font-weight: normal; font-size: 11pt;' target="_blank">
               https://satpolpp.jatimprov.go.id,
            </a> Email :
            <a href="mailto:satpolppjatim1950@gmail.com" target="_blank">
                jks.satpolpp@jatimprov.go.id
            </a>
                        </p>
                        <h5 style="margin-top:20px;">S U R A B A Y A </h5>
                    </td>
    		</tr>
    	</table>

        <p class="s3" style="text-indent: -2pt;line-height: 125%;text-align: center;">
            SURAT PERINTAH TUGAS</p>
        </p>
            <p class="s3" style="margin-bottom:5px; line-height: 125%;text-align: center; text-decoration:none;">
                Nomor : {{$keg->spt}}
            </p>
    	<table cellspacing="0" style="border-collapse:collapse; margin-bottom:-10px;">
            <tr style="height:43pt">
                <td style="width:61pt">
                    <p class="s4" style="font-weight:bold; padding-left: 2pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        DASAR
                    </p>
                </td>
                <td style="width:18pt">
                    <p class="s5" style="font-weight:bold;padding-left: 1pt;text-indent: 0pt;line-height: 14pt;text-align: center;">
                        :
                    </p>
                </td>
                <td style="width:24pt">
                    <p class="s6" style="padding-left: 4pt;padding-right: 5pt;text-indent: 0pt;line-height: 14pt;text-align: center;">
                        1.
                    </p>
                </td>
                <td colspan="3" style="width:450pt">
                    <p class="s6" style="padding-left: 8pt;padding-right: 2pt;text-indent: 0pt;text-align: justify;">
                        Peraturan Daerah Provinsi Jawa Timur Nomor 14 Tahun 2022 tentang Anggaran Pendapatan dan Belanja Daerah Provinsi Jawa Timur Tahun Anggaran 2023;
                    </p>
                </td>
            </tr>
            <tr style="height:43pt">
                <td style="width:61pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:18pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:24pt">
                    <p class="s6" style="padding-left: 4pt;padding-right: 5pt;text-indent: 0pt;text-align: center;">
                        2.
                    </p>
                </td>
                <td colspan="3" style="width:421pt">
                    <p class="s6" style="padding-left: 8pt;padding-right: 2pt;text-indent: 0pt;line-height: 14pt;text-align: justify;">
                        Peraturan Gubernur Jawa Timur Nomor  66 Tahun 2022 tentang Pedoman Kerja dan Pelaksanaan Tugas Pemerintah Provinsi Jawa Timur Tahun 2023;

                    </p>
                </td>
            </tr>
            <tr style="height:43pt">
                <td style="width:61pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:18pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:24pt">
                    <p class="s6" style="padding-left: 4pt;padding-right: 5pt;text-indent: 0pt;text-align: center;">
                        3.
                    </p>
                </td>
                <td colspan="3" style="width:421pt">
                    <p class="s6" style="padding-left: 8pt;text-indent: 0pt;text-align: justify;">
                        Peraturan Gubernur Jawa Timur Nomor 6 Tahun 2023 tentang Perubahan atas Peraturan Gubernur Jawa Timur Nomor 89 Tahun 2022 tentang Penjabaran Anggaran Pendapatan dan Belanja Daerah Provinsi Jawa Timur Tahun Anggaran 2023;
                    </p>
                </td>
            </tr>
            <tr style="height:43pt">
                <td style="width:61pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:18pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:24pt">
                    <p class="s6" style="padding-top: 2pt;padding-left: 6pt;text-indent: 0pt;text-align: left;">
                        4.
                    </p>
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td colspan="3" style="width:421pt">
                    <p class="s6" style="padding-top: 2pt;padding-left: 8pt;padding-right: 2pt;text-indent: 0pt;text-align: justify;">
                        

            @if($keg->dasar_surat !== null)
            Dokumen Pelaksanaan Pergeseran Anggaran Satuan Polisi Pamong Praja Provinsi Jawa Timur Tahun Anggaran 2023 Nomor DPPA/A.2/1.05.0.00.0.00.01.0000/001/2023;
            @else
            Dokumen Pelaksanaan Pergeseran Anggaran Satuan Polisi Pamong Praja Provinsi Jawa Timur Tahun Anggaran 2023 Nomor DPPA/A.2/1.05.0.00.0.00.01.0000/001/2023.
            @endif
                    </p>
                </td>
            </tr>
            @if($keg->dasar_surat !== null)
            <tr style="height:35pt">
                <td style="width:61pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:18pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:24pt">
                    <p class="s6" style="padding-top: 2pt;padding-left: 6pt;text-indent: 0pt;text-align: left;">
                        5.
                    </p>
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td colspan="3" style="width:421pt">
                    <p class="s6" style="padding-top: 2pt;padding-left: 8pt;padding-right: 2pt;text-indent: 0pt;text-align: justify;">
                        {{$keg->dasar_surat}}.
                    </p>
                </td>
            </tr>
            @endif
        </table>
        <br>
            <p class="s5" style="margin-bottom:5px; font-weight:bold; text-align: center;">
                MEMERINTAHKAN
            </p>
            @if(count($keg->personel) > 2)
    	<table cellspacing="0" style="border-collapse:collapse;">
            <tr style="height:20pt">
                <td style="width:61pt">
                    <p class="s4" style="font-weight:bold; padding-left: 2pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        KEPADA
                    </p>
                </td>
                <td style="width:18pt">
                    <p class="s5" style="font-weight:bold; padding-left: 1pt;text-indent: 0pt;line-height: 14pt;text-align: center;">
                        :
                    </p>
                </td>
                <td colspan="3" >
                    <p class="s6" style="padding-left: 4pt;padding-right: 5pt;text-indent: 0pt;line-height: 14pt;">
                         Daftar nama-nama terlampir
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:61pt">
                    <p class="s4" style="font-weight:bold; padding-left: 2pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        UNTUK
                    </p>
                </td>
                <td style="width:18pt">
                    <p class="s5" style="font-weight:bold; padding-left: 1pt;text-indent: 0pt;line-height: 14pt;text-align: center;">
                        :
                    </p>
                </td>
                <td style="width:24pt">
                    <p class="s6" style="padding-left: 4pt;padding-right: 5pt;text-indent: 0pt;line-height: 14pt;text-align: center;">
                        1.
                    </p>
                </td>
                <td colspan="3" style="width:421pt">
                    <p class="s6" style="padding-left: 8pt;padding-right: 2pt;text-indent: 0pt;text-align: justify;">
                       {{$bentuk_kegiatan->format_spt}} {{$keg->judul_kegiatan}} pada Hari 
                       @if($keg->tanggal_mulai == $keg->tanggal_selesai)
                           {{$keg->hari($keg->tanggal_mulai)}} 
                           Tanggal {{$keg->tgl_indo($keg->tanggal_mulai)}} 
                       @else
                           {{$keg->hari($keg->tanggal_mulai)}} s/d  {{$keg->hari($keg->tanggal_selesai)}}
                           Tanggal {{$keg->tgl_indo_2($keg->tanggal_mulai,$keg->tanggal_selesai)}} 
                       @endif
                       di {{$keg->lokasi}}, Pukul {{date('H.i', strtotime($keg->jam_mulai))}} WIB;
                    </p>
                </td>
            </tr>
            <tr>
                <td style="width:61pt">
                    <p class="s4" style="padding-left: 2pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        <br>
                    </p>
                </td>
                <td style="width:18pt">
                    <p class="s5" style="padding-left: 1pt;text-indent: 0pt;line-height: 14pt;text-align: center;">
                        <br>
                    </p>
                </td>
                <td style="width:24pt">
                    <p class="s6" style="padding-left: 4pt;padding-right: 5pt;text-indent: 0pt;line-height: 14pt;text-align: center;">
                        2.
                    </p>
                </td>
                <td colspan="3" style="width:421pt">
                    <p class="s6" style="padding-left: 8pt;padding-right: 2pt;text-indent: 0pt;text-align: justify;">
                       APP di Kantor Satuan Polisi Pamong Praja Provinsi Jawa Timur Jl. Jagir Wonokromo No.352 Surabaya, Pukul : {{date('H.i', strtotime($keg->jam_app))}} WIB;
                    </p>
                </td>
            </tr>
            <tr >
                <td style="width:61pt">
                    <p class="s4" style="padding-left: 2pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        <br>
                    </p>
                </td>
                <td style="width:18pt">
                    <p class="s5" style="padding-left: 1pt;text-indent: 0pt;line-height: 14pt;text-align: center;">
                        <br>
                    </p>
                </td>
                <td style="width:24pt">
                    <p class="s6" style="padding-left: 4pt;padding-right: 5pt;text-indent: 0pt;line-height: 14pt;text-align: center;">
                        3.
                    </p>
                </td>
                <td colspan="3" style="width:421pt">
                    <p class="s6" style="padding-left: 8pt;padding-right: 2pt;text-indent: 0pt;text-align: justify;">
                      Dalam melaksanakan tugas Pakaian {{$keg->seragam}}
                    </p>
                </td>
            </tr>
            <tr >
                <td style="width:61pt">
                    <p class="s4" style="padding-left: 2pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        <br>
                    </p>
                </td>
                <td style="width:18pt">
                    <p class="s5" style="padding-left: 1pt;text-indent: 0pt;line-height: 14pt;text-align: center;">
                        <br>
                    </p>
                </td>
                <td style="width:24pt">
                    <p class="s6" style="padding-left: 4pt;padding-right: 5pt;text-indent: 0pt;line-height: 14pt;text-align: center;">
                        4.
                    </p>
                </td>
                <td colspan="3" style="width:421pt">
                    <p class="s6" style="padding-left: 8pt;padding-right: 2pt;text-indent: 0pt;text-align: justify;">
                       Melaporkan hasil Pelaksanaan Tugas tersebut kepada Kepala Satuan Polisi Pamong Praja Provinsi Jawa Timur dan mengisi link <a style="font-size:12pt" href="https://sijalinmaja.jatimprov.go.id">https://sijalinmaja.jatimprov.go.id</a>
                    </p>
                </td>
            </tr>
            <tr style="height:36pt">
                <td style="width:61pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:18pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td colspan="4" style="width:445pt">
                    <p class="s6" style="padding-top: 6pt;/* padding-left: 14pt; */text-indent: 30pt;line-height: 14pt;text-align: left;letter-spacing: -0.3px;">
                        Demikian Surat Perintah Tugas ini untuk dilaksanakan dengan sebaik- baiknya dengan penuh rasa tanggung jawab.
                    </p>
                </td>
            </tr>
        </table>
        @else
        <table cellspacing="0" style="border-collapse:collapse;">
            <tr style="height:55pt">
                <td style="width:48pt">
                    <p class="s4" style="font-weight:bold; padding-left: 2pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        KEPADA
                    </p>
                </td>
                <td style="width:14pt">
                    <p class="s4" style="font-weight:bold; padding-left: 5pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        :
                    </p>
                </td>
                <td style="width:20pt">
                    <p class="s6" style="padding-left: 5pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        1.
                    </p>
                </td>
                <td style="width:120pt">
                    <p class="s6" style="padding-left: 10pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        Nama
                    </p>
                    <p class="s6" style="padding-left: 10pt;text-indent: 0pt;text-align: left;">
                        NIP 
                    </p>
                    <p class="s6" style="padding-left: 10pt;text-indent: 0pt;text-align: left;">
                        Pangkat / Golongan 
                    </p>
                    <p class="s6" style="padding-left: 10pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        Jabatan
                    </p>
                </td>
                <td style="width:10pt">
                    <p class="s6" style="padding-left: 0pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        :
                    </p>
                    <p class="s6" style="padding-left: 0pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        :
                    </p>
                    <p class="s6" style="padding-left: 0pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        :
                    </p>
                    <p class="s6" style="padding-left: 0pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        :
                    </p>
                </td>
                <td style="width:273pt">
                    <p class="s6" style="padding-left: 0pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        {{$katim->nama}}
                    </p>
                    <p class="s6" style="padding-left: 0pt;text-indent: 0pt;text-align: left;">
                       {{$katim->konversi_nip($katim->nip,$katim->pegawai->jenis_pegawai)}}  <br>  {{$katim->pangkat}}
                    </p>
                    <p class="s6" style="padding-left: 0pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        {{ucwords(strtolower($katim->pegawai->nama_jabatan))}}
                    </p>
                </td>
            </tr>
            @foreach($anggota as $a)
            <tr style="height:55pt">
                <td style="width:48pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:14pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:20pt">
                    <p class="s6" style="padding-left: 5pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        {{$loop->iteration + 1}}.
                    </p>
                </td>
                <td style="width:120pt">
                    <p class="s6" style="padding-left: 10pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        Nama
                    </p>
                    <p class="s6" style="padding-left: 10pt;text-indent: 0pt;text-align: left;">
                        NIP<br>  Pangkat / Golongan
                    </p>
                    <p class="s6" style="padding-left: 10pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        Jabatan
                    </p>
                </td>
                <td style="width:10pt">
                    <p class="s6" style="padding-left: 0pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        :
                    </p>
                    <p class="s6" style="padding-left: 0pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        :
                    </p>
                    <p class="s6" style="padding-left: 0pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        :
                    </p>
                    <p class="s6" style="padding-left: 0pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        :
                    </p>
                </td>
                <td style="width:273pt">
                    <p class="s6" style="padding-left: 0pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        {{$a->nama}}
                    </p>
                    <p class="s6" style="padding-left: 0pt;text-indent: 0pt;text-align: left;">
                        {{$nip->konversi_nip($a->nip,$a->jenis_pegawai)}} <br> {{$a->pangkat}} 
                    </p>
                    <p class="s6" style="padding-left: 0pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{ucwords(strtolower($a->nama_jabatan))}}
                    </p>
                </td>
            </tr>
            @endforeach
            <tr>
                <td style="width:61pt">
                    <p class="s4" style="font-weight:bold; padding-left: 2pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        UNTUK
                    </p>
                </td>
                <td style="width:18pt">
                    <p class="s5" style="font-weight:bold; padding-left: 1pt;text-indent: 0pt;line-height: 14pt;text-align: center;">
                        :
                    </p>
                </td>
                <td style="width:24pt">
                    <p class="s6" style="padding-left: 4pt;padding-right: 5pt;text-indent: 0pt;line-height: 14pt;text-align: center;">
                        1.
                    </p>
                </td>
                <td colspan="3" style="width:421pt">
                    <p class="s6" style="padding-left: 8pt;padding-right: 2pt;text-indent: 0pt;text-align: justify;">
                       {{$bentuk_kegiatan->format_spt}} {{$keg->judul_kegiatan}} pada Hari 
                       @if($keg->tanggal_mulai == $keg->tanggal_selesai)
                           {{$keg->hari($keg->tanggal_mulai)}} 
                           Tanggal {{$keg->tgl_indo($keg->tanggal_mulai)}} 
                       @else
                       {{$keg->hari($keg->tanggal_mulai)}}
                           {{$keg->hari($keg->tanggal_mulai)}} s/d  {{$keg->hari($keg->tanggal_selesai)}}
                           Tanggal {{$keg->tgl_indo_2($keg->tanggal_mulai,$keg->tanggal_selesai)}} 
                       @endif
                       di {{$keg->lokasi}}, Pukul {{date('H.i', strtotime($keg->jam_mulai))}} WIB;
                    </p>
                </td>
            </tr>
            <tr >
                <td style="width:61pt">
                    <p class="s4" style="padding-left: 2pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                        <br>
                    </p>
                </td>
                <td style="width:18pt">
                    <p class="s5" style="padding-left: 1pt;text-indent: 0pt;line-height: 14pt;text-align: center;">
                        <br>
                    </p>
                </td>
                <td style="width:24pt">
                    <p class="s6" style="padding-left: 4pt;padding-right: 5pt;text-indent: 0pt;line-height: 14pt;text-align: center;">
                        2.
                    </p>
                </td>
                <td colspan="3" style="width:421pt">
                    <p class="s6" style="padding-left: 8pt;padding-right: 2pt;text-indent: 0pt;text-align: justify;">
                       Melaporkan hasil Pelaksanaan Tugas tersebut kepada Kepala Satuan Polisi Pamong Praja Provinsi Jawa Timur.
                    </p>
                </td>
            </tr>
            <tr style="height:36pt">
                <td style="width:61pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td style="width:18pt">
                    <p style="text-indent: 0pt;text-align: left;">
                        <br/>
                    </p>
                </td>
                <td colspan="4" style="width:445pt">
                    <p class="s6" style="padding-top: 6pt;/* padding-left: 14pt; */text-indent: 30pt;line-height: 14pt;text-align: left;letter-spacing: -0.3px;">
                        Demikian Surat Perintah Tugas ini untuk dilaksanakan dengan sebaik- baiknya dengan penuh rasa tanggung jawab.
                    </p>
                </td>
            </tr>
        </table>
        @endif
        <br>
         <table cellspacing="0" style="border-collapse:collapse;margin-left:274.075pt; margin-top: -10px;">
            
        <tr style="height:13pt">
            
            <td style="width:97pt">
                <p class="s5" style="text-indent: 0pt;line-height: 12pt;text-align: left; ">
                    Ditetapkan di
                </p>
            </td>
            <td style="width:150pt">
                <p class="s5" style="padding-left: 7pt;text-indent: 0pt;line-height: 12pt;text-align: left;">
                    : Surabaya
                </p>
            </td>
        </tr>
        <tr style="height:15pt">
           
            <td style="width:97pt;">
                <p class="s5" style="text-indent: 0pt;line-height: 13pt;text-align: left;">
                    pada tanggal
                </p>
            </td>
            <td style="width:150pt;">
                <p class="s5" style="padding-left: 7pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                    : {{$keg->tgl_indo(date('Y-m-d', strtotime($keg->created_at)))}}
                </p>
            </td>
        </tr>
        </table>
<table cellspacing="0" style="border-collapse:collapse;margin-left:60.075pt; margin-top: -10px;">
    <tbody>
        <tr style="height:10pt">
            <td style="width:64pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td style="width:64pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td style="width:64pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td style="width:97pt;">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td style="width:168pt;">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
        </tr>
        <tr style="height:26pt">
            <td colspan="3" style="width:192pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s7" style="padding-left: 15pt;text-indent: -10pt;line-height: 13pt;text-align: left;">
                    Konsep Naskah Dinas ini diajukan untuk mendapatkan tanda tangan eletronik
                </p>
            </td>
            <td colspan="2" style="width:265pt;border-left-style:solid;border-left-width:1pt">
                <p class="s4" style="padding-left: 75pt;text-indent: -50pt;line-height: 13pt;text-align: left;">
                    KEPALA SATUAN POLISI PAMONG PRAJA PROVINSI JAWA TIMUR
                </p>
            </td>
        </tr>
        <tr style="height:5pt">
            <td style="width:64pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s7" style="padding-left: 17pt;text-indent: 0pt;text-align: left;">
                    Es. IV
                </p>
            </td>
            <td style="width:64pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s7" style="padding-left: 18pt;text-indent: 0pt;text-align: left;">
                    Es. III
                </p>
            </td>
            <td style="width:64pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s7" style="padding-left: 13pt;text-indent: 0pt;text-align: left;">
                    KASAT
                </p>
            </td>
            <td colspan="2" style="width:265pt;border-left-style:solid;border-left-width:1pt">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
        </tr>
        <tr style="height:10pt">
            <td style="width:64pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt;border-bottom:1.25pt solid black;" >
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td style="width:64pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt;border-bottom:1.25pt solid black;" >
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td style="width:64pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt;border-bottom:1.25pt solid black;" >
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td colspan="2" style="width:265pt;border-left-style:solid;border-left-width:1pt">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/> <br/>
                </p>
                <p class="s8" style="font-weight:normal; padding-left: 10pt; text-decoration:underline; text-indent: 0pt;line-height: 13pt;text-align: left;">
                    M. HADI WAWAN GUNTORO, S.STP., M.Si., CIPA
                </p>
                <p class="s4" style="padding-left: 66pt;padding-right: 49pt;text-indent: 14pt;line-height: 13pt;text-align: left;">
                    Pembina Utama Muda <BR>NIP. 19770323 199511 1 001
                </p>
            </td>
        </tr>
    </tbody>
</table>
                <img alt="image" height="55" src="{{asset('media/bg/Image_003.jpg')}}" width="700" style="position:fixed; bottom: 20px;" />
    </div>
    @if(count($keg->personel) > 2)

    @include('pages.kegiatan.page_spt.page2')

        @if(count($keg->personel) > 15)
        @include('pages.kegiatan.page_spt.page3')
            @if(count($keg->personel) > 30)
            @include('pages.kegiatan.page_spt.page4')
            @endif
        @endif
    @endif
<script type="text/javascript">

    window.print();

</script>
</body>
</html>