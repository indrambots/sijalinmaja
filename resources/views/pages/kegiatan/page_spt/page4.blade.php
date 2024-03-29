<div class="pagebreak"></div>
    <div class="page">

         <p class="s9" style="padding-top: 3pt;padding-left: 297pt;text-indent: -56pt;text-align: justify;">
            LAMPIRAN : &nbsp;SURAT PERINTAH TUGAS <br> &nbsp;&nbsp;&nbsp;KASATPOL PP PROV. JATIM <br> &nbsp;&nbsp;&nbsp;TANGGAL : {{$keg->tgl_indo(date('Y-m-d', strtotime($keg->created_at)))}}
        </p>
        <p class="s9" style="padding-left: 297pt;text-indent: 0pt;text-align: justify; ">
            &nbsp;&nbsp;&nbsp;NOMOR     :  {{$keg->spt}}
        </p>
        <div style="
    float: right;
    border-top: 2px solid black;
    width: 285px;
    align-items: right;
"></div>
        <h4 style="padding-top: 9pt;padding-left: 0pt;text-indent: 0pt;text-align: center;">
            Daftar Nama {{$bentuk_kegiatan->format_spt}} {{$keg->judul_kegiatan}}
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
                <td bgcolor="#BDBDBD" style="width:100pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 5pt;padding-right: 4pt;text-indent: 0pt;text-align: center;">
                        NIP/NIPPPK/NIP PTT-PK <br>
                        GOL/PANGKAT
                    </p>
                </td>
                <td bgcolor="#BDBDBD" style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 2pt;padding-right: 2pt;text-indent: 0pt;text-align: center;">
                        KETERANGAN
                    </p>
                </td>
            </tr>
            @inject('nip', 'App\KegiatanPersonel')
            @foreach($anggota3 as $p)
            <tr style="height:26pt">
                <td style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-top: 6pt;padding-right: 8pt;text-indent: 0pt;text-align: right;">
                      {{$loop->iteration+30}}.
                    </p>
                </td>
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$p->nama}}
                    </p>
                </td>
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-top: 6pt;padding-left: 5pt;padding-right: 5pt;text-indent: 0pt;text-align: center;">
                        {{$nip->konversi_nip($p->nip,$p->jenis_pegawai)}} <br> {{$p->pangkat}}
                    </p>
                </td>
                <td style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-top: 10pt;padding-left: 4pt;padding-right: 2pt;text-indent: 0pt;text-align: center;">
                        {{$p->ket}}
                    </p>
                </td>
            </tr>
            @endforeach
        </table>

        @if(count($keg->personel) < 46)
        <table cellspacing="0" style="border-collapse:collapse;margin-left:274.075pt; margin-top: 10px;">
            
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
        @if($barcode == "yes")
      {{--   <table cellspacing="0" style="border-collapse:collapse;margin-left:35.075pt; margin-top: -17.5px;">
    <tbody>
        <tr style="height:10pt">
            <td colspan="4" style="width:64pt;border-bottom-style:solid;border-bottom-width:1pt; border-color:white;">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
        </tr>
        <tr style="height:26pt">
            <td colspan="3" style="width:192pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt; border-color: white;">
                <p class="s7" style="padding-left: 15pt;text-indent: -10pt;line-height: 13pt;text-align: left;">
                </p>
            </td>
            <td colspan="2" style="width:265pt;border-left-style:solid;border-left-width:1pt">
                <p class="s4" style="padding-left: 95pt;text-indent: -50pt;line-height: 13pt;text-align: left;">
                    Plh. KEPALA SATUAN POLISI PAMONG PRAJA PROVINSI JAWA TIMUR 
                </p>
            </td>
        </tr>
        <tr style="height:3pt">
            <td colspan="3" style="width:64pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt; border-color: white;">
                <p class="s7" style="padding-left: 0pt;text-indent: 0pt;text-align: left;">
                </p>
                <br><br>
            </td>
            <td colspan="2" style="width:265pt;border-left-style:solid;border-left-width:1pt">
                <p class="s4" style="padding-left: 85pt;text-indent: -50pt;line-height: 6pt;text-align: left;">
                    Kepala Bidang Ketentraman dan Ketertiban Umum
                </p>
            </td>
        </tr>
        <tr style="height:10pt">
            <td colspan="3" style="width:64pt;border-left-width:1pt;border-right-width:1pt;border-bottom:1.25pt solid white;" >
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td colspan="2" style="width: 285pt;border-left-width:1pt">
                <p style="text-indent: 0pt;text-align: left;">
                    <br> <br>
                </p>
                <p class="s8" style="font-weight:normal; text-decoration:underline;  padding-left: 75pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                    MUHAMMAD TABRANI, S.H.,M.H
                </p>
                <p class="s4" style="padding-left: 35pt;/* padding-right: 49pt; *//* text-indent: 14pt; */line-height: 13pt;text-align: CENTER;">
                    Pembina Tingkat I <br>NIP. 19680209 199103 1 007
                </p>
            </td>
        </tr>
    </tbody>
</table> --}}
        <table cellspacing="0" style="border-collapse:collapse;margin-left:35.075pt; margin-top: -10px;">
    <tbody>
        <tr style="height:10pt">
            <td colspan="4" style="width:64pt;border-bottom-style:solid;border-bottom-width:1pt; border-color:white;">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
        </tr>
        <tr style="height:26pt">
            <td colspan="3" style="width:192pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt; border-color: white;">
                <p class="s7" style="padding-left: 15pt;text-indent: -10pt;line-height: 13pt;text-align: left;">
                </p>
            </td>
            <td colspan="2" style="width:265pt;border-left-style:solid;border-left-width:1pt">
                <p class="s4" style="padding-left: 95pt;text-indent: -50pt;line-height: 13pt;text-align: left;">
                    KEPALA SATUAN POLISI PAMONG PRAJA PROVINSI JAWA TIMUR
                </p>
            </td>
        </tr>
        <tr style="height:5pt">
            <td style="width:64pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt; border-color: white;">
                <p class="s7" style="padding-left: 0pt;text-indent: 0pt;text-align: left;">
                </p>
                <br>
            </td>
        </tr>
        <tr style="height:10pt">
            <td colspan="3" style="width:64pt;border-left-width:1pt;border-right-width:1pt;border-bottom:1.25pt solid white;" >
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td colspan="2" style="width: 285pt;border-left-width:1pt">
                <p style="text-indent: 0pt;text-align: left;">
                    <br> <br>
                </p>
                <p class="s8" style="font-weight:normal;padding-left: 30.pt; text-decoration:underline;  padding-left: 35pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                    M. HADI WAWAN GUNTORO, S.STP., M.Si., CIPA
                </p>
                <p class="s4" style="padding-left: 35pt;/* padding-right: 49pt; *//* text-indent: 14pt; */line-height: 13pt;text-align: CENTER;">
                    Pembina Utama Muda <br>NIP. 19770323 199511 1 001
                </p>
            </td>
        </tr>
    </tbody>
</table>
@else
@include('pages.kegiatan.page_spt.paraf')
@endif
@endif
        <img alt="image" height="55" src="{{asset('media/bg/Image_003.jpg')}}" width="700" style="position:absolute; bottom: 20px" />
    </div>