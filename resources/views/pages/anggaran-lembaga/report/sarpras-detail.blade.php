<table class="table table-bordered table-striped table-sm">
    <thead>
        <tr class="text-center">
            <th rowspan="2"><strong>NO</strong></th>
            <th rowspan="2"><strong>JENIS SARANA DAN PRASARANA</strong></th>
            <th rowspan="2"><strong>JUMLAH SARANA DAN PRASANA</strong></th>
            <th colspan="2"><strong>KONDISI SARANA DAN PRASARANA</strong></th>
        </tr>
        <tr class="text-center">
            <th><strong>LAYAK</strong></th>
            <th><strong>TIDAK LAYAK</strong></th>
        </tr>
        <tr class="text-center">
            @for($i=1;$i<=5;$i++)
                <th style="background-color:#d0cecf">{{$i}}</th>
            @endfor
        </tr>
    </thead>
    <tbody>
        @php
            $grp1 = 'A';
        @endphp
        @foreach ($kategori as $group1 => $sarpras)
            <tr>
                <td class="text-center bg-header"><strong>{{$grp1}}</strong></td>
                <td class="bg-header"><strong>{{$group1}}</strong></td>
                @for($i=1;$i<=3;$i++)
                    <td class="bg-header"></td>
                @endfor
            </tr>
            @php
                $grp2 = 1;
            @endphp
            @foreach($sarpras as $group2 => $sarp)
                @if($group2)
                    <tr>
                        <td class="text-center bg-header"><strong>{{Helpers::numberToRoman($grp2)}}</strong></td>
                        <td class="bg-header"><strong>{{$group2}}</strong></td>
                        @for($i=1;$i<=3;$i++)
                            <td class="bg-header"></td>
                        @endfor
                    </tr>
                    @php $grp2++; @endphp
                    @php $no2 = 1; @endphp
                    @foreach($sarp as $grp22 => $group22)
                        @foreach($group22 as $ids => $ss)
                            <tr>
                                <td class="text-center {!! $ss == 'Peralatan Komunikasi' ? 'bg-header' : '' !!}">{{$grp22 ? '' : $no2.'.'}}</td>
                                <td {!! $ss == 'Peralatan Komunikasi' ? 'class="bg-header"' : '' !!}>{{$ss}}</td>
                                @if($ss != 'Peralatan Komunikasi')
                                    <td>{{@$data[$ids]['jumlah']}}</td>
                                    <td>{{@$data[$ids]['jumlah_layak']}}</td>
                                    <td>{{@$data[$ids]['jumlah_tidak_layak']}}</td>
                                @else
                                    @for($i=1;$i<=3;$i++)
                                        <td class="bg-header"></td>
                                    @endfor
                                @endif
                            </tr>
                            @php $no2++; @endphp
                        @endforeach
                    @endforeach
                @else
                    @foreach($sarp as $group3 => $s)
                        @if($group3)
                            <tr>
                                <td></td>
                                <td colspan="4">{{$group3}}</td>
                                @for($i=1;$i<=3;$i++)
                                    <td class="bg-header"></td>
                                @endfor
                            </tr>
                        @else
                            @php $no = 1; @endphp
                                @foreach($s as $key => $d)
                                    <tr>
                                        <td class="text-center">{{$no}}.</td>
                                        <td>{{$d}}</td>
                                        <td>{{@$data[$key]['jumlah']}}</td>
                                        <td>{{@$data[$key]['jumlah_layak']}}</td>
                                        <td>{{@$data[$key]['jumlah_tidak_layak']}}</td>
                                    </tr>
                                    @php $no++ @endphp
                                @endforeach
                            @php $grp1++; @endphp
                        @endif
                    @endforeach
                @endif
            @endforeach
        @endforeach
    </tbody>
</table>
