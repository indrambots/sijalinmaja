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
                PENEGAKAN PERATURAN DAERAH
                </p>
                </td>
            </tr>
            @foreach($gakda->skip(0)->take(25) as $k)
             <tr style="height:26pt">
                <td style="width:20pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-top: 6pt;padding-right: 8pt;text-indent: 0pt;text-align: right;">
                        {{$loop->iteration+45}}
                    </p>
                </td>
                <td style="border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s9" style="padding-left: 2pt;text-indent: 0pt;line-height: 13pt;text-align: left;">
                        {{$k->nama}}
                    </p>
                </td>
                @foreach($pti as $p)
                <?php $check = DB::SELECT("SELECT COUNT(nip) AS jum FROM kehadiran_pti k LEFT JOIN pti p ON k.pti_id = p.id WHERE k.hadir = 0 AND k.nip = '".$k->nip."' AND p.nama_kegiatan = '".$p->nama_kegiatan."' AND k.is_spt = 0 AND p.id > 0 AND p.tanggal BETWEEN '".$tanggal_mulai."' AND '".$tanggal_selesai."'" )?>
                @if(count($check) > 0)
                    @if($check[0]->jum > 0)
                    <td bgcolor="red" style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    @else
                    <td  style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    @endif
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        {{$check[0]->jum}}
                    </p>
                @else
                <td  style="width:50pt;border-top-style:solid;border-top-width:1pt;border-left-style:solid;border-left-width:1pt;border-bottom-style:solid;border-bottom-width:1pt;border-right-style:solid;border-right-width:1pt">
                    <p class="s8" style="padding-top: 6pt;padding-left: 3pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                        0
                    </p>
                @endif
                </td>
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
    <div class="pagebreak"></div>