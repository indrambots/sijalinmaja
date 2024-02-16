@if(strtolower($keg->bidang) == 'sekretariat')
<table cellspacing="0" style="border-collapse:collapse;margin-left:60.075pt; margin-top: -12px;">
    <tbody>
        <tr style="height:10pt">
            <td style="width:80pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td style="width:80pt;border-bottom-style:solid;border-bottom-width:1pt">
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
            <td colspan="2" style="width:160pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s7" style="padding-left: 15pt;text-indent: -10pt;line-height: 13pt;text-align: center;">
                    Konsep Naskah Dinas ini diajukan untuk mendapatkan tanda tangan eletronik
                </p>
            </td>
            <td colspan="2" style="width:265pt;border-left-style:solid;border-left-width:1pt">
                <p class="s4" style="padding-left: 103pt; text-indent: -50pt;line-height: 13pt;text-align: left;">
                    KEPALA SATUAN POLISI PAMONG PRAJA PROVINSI JAWA TIMUR
                </p>
            </td>
        </tr>
        <tr style="height:5pt">
            <td style="width:80pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s7" style="text-indent: 0pt;text-align: center;">
                    {{ucwords(strtolower($keg->sub->paraf))}}
                </p>
            </td>
            <td style="width:80pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s7" style="text-indent: 0pt;text-align: center;">
                    Sekretaris
                </p>
            </td>
            <td colspan="2" style="width:275pt;border-left-style:solid;border-left-width:1pt">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
        </tr>
        <tr style="height:10pt">
            <td style="width:9pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt;border-bottom:1.25pt solid black;" >
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td style="width:9pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt;border-bottom:1.25pt solid black;" >
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td colspan="2" style="width:285pt;border-left-style:solid;border-left-width:1pt">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/> <br/>
                </p>
                <p class="s8" style="font-weight:normal; padding-left: 5.5pt; text-decoration:underline; text-indent: 0pt;line-height: 13pt;text-align: center;">
                    M. HADI WAWAN GUNTORO, S.STP., M.Si., CIHCM., CIPA
                </p>
                <p class="s4" style="padding-left: 91pt;padding-right: 49pt;text-indent: 14pt;line-height: 13pt;text-align: left;">
                    Pembina Utama Muda <BR>NIP. 19770323 199511 1 001
                </p>
            </td>
        </tr>
    </tbody>
</table>
@else
<table cellspacing="0" style="border-collapse:collapse;margin-left:60.075pt; margin-top: -12px;">
    <tbody>
        <tr style="height:10pt">
            <td style="width:50pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td style="width:50pt;border-bottom-style:solid;border-bottom-width:1pt">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td style="width:50pt;border-bottom-style:solid;border-bottom-width:1pt">
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
            <td colspan="3" style="width:162pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s7" style="line-height: 13pt;text-align: center;">
                    Konsep Naskah Dinas ini diajukan untuk mendapatkan tanda tangan eletronik
                </p>
            </td>
            <td colspan="2" style="width:285pt;border-left-style:solid;border-left-width:1pt">
                <p class="s4" style="padding-left: 99pt;text-indent: -50pt;line-height: 13pt;text-align: left;">
                    KEPALA SATUAN POLISI PAMONG PRAJA PROVINSI JAWA TIMUR
                </p>
            </td>
        </tr>
        <tr style="height:5pt">
            @if($keg->jenis_kegiatan == 'Puskogap' || $keg->jenis_kegiatan == 'pengawalan' || $keg->jenis_kegiatan == 'deteksi dan cegah dini' || $keg->jenis_kegiatan == 'penanganan unjuk rasa dan kerusuhan massa' || $keg->jenis_kegiatan == 'pengamanan'  || $keg->jenis_kegiatan == 'penertiban' )
                <td style="width:6pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s7" style="text-indent: 0pt;text-align: center;">
                        Waka Puskogap
                    </p>
                </td>
                <td style="width:6pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s7" style="text-indent: 0pt;text-align: center;">
                        Ka &nbsp;&nbsp;Puskogap
                    </p>
                </td>
            @else
                <td style="width:6pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s7" style="text-indent: 0pt;text-align: center;">
                        {{ucwords(strtolower($keg->sub->paraf))}}
                    </p>
                </td>
                <td style="width:64pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s7" style="text-indent: 0pt;text-align: center;">
                        {{ucwords(strtolower($keg->sub->paraf_kabid))}}
                    </p>
                </td>
            @endif
            <td style="width:6pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt">
                <p class="s7" style="text-indent: 0pt;text-align: center;">
                    Sekretaris
                </p>
            </td>
            <td colspan="2" style="width:265pt;border-left-style:solid;border-left-width:1pt">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
        </tr>
        <tr style="height:10pt">
            <td style="width:9pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt;border-bottom:1.25pt solid black;" >
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td style="width:9pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt;border-bottom:1.25pt solid black;" >
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td style="width:64pt;border-left-style:solid;border-left-width:1pt;border-right-style:solid;border-right-width:1pt;border-bottom:1.25pt solid black;" >
                <p style="text-indent: 0pt;text-align: left;">
                    <br/>
                </p>
            </td>
            <td colspan="2" style="width:285pt;border-left-style:solid;border-left-width:1pt">
                <p style="text-indent: 0pt;text-align: left;">
                    <br/> <br/>
                </p>
                <p class="s8" style="font-weight:normal; padding-left: 5.5pt; text-decoration:underline; text-indent: 0pt;line-height: 13pt;text-align: center;">
                    M. HADI WAWAN GUNTORO, S.STP., M.Si.,CIHCM., CIPA
                </p>
                <p class="s4" style="padding-left: 84pt;text-indent: 14pt;line-height: 13pt;text-align: left;">
                    Pembina Utama Muda <BR>NIP. 19770323 199511 1 001
                </p>
            </td>
        </tr>
    </tbody>
</table>
@endif