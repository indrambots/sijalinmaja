@extends('layouts.app')

@section('content')
<style>
    table thead tr th{
        vertical-align:middle !important;
        background-color: #ffffcd;
        border:1px solid #D4D499 !important;
    }
    table tbody tr td{
        border:1px solid #D4D499 !important;
        vertical-align:middle !important;
    }
    .table-striped tbody tr:nth-of-type(odd){
        background-color: #ffffcd;
    }
    .input-custom, .input-custom:focus{
        outline: 0;
        width:100%;
        border:1px solid transparent;
        background-color: transparent
    }
    .bg-header{
        background-color: #FFFF55;
        cursor:no-drop
    }
    input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }
</style>
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item pe-3">
        @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_tim_kasus)
            <a href="{{url('anggaran/kelembagaan')}}" class="pe-3">
                Kelembagaan
            </a>
        @else
            <a href="{{url('anggaran')}}" class="pe-3">
                Anggaran Kab/Kota
            </a>
        @endif
    </li>
    <li class="breadcrumb-item px-3 text-muted">Data Sarpras</li>
</ol>
<div class="card">
    <form class="form" method="POST" action="{{url('anggaran/kelembagaan/sarpras/store')}}">
        @csrf
        @method('post')
        <div class="card-body">
            <div class="card-label"><h4>Data Sarpras</h4></div>
            <hr>
            <div class="row justify-content-between">
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary m-b-xs">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-2">
                <div class="col-12">
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
                            @foreach (Helpers::formSarpras() as $group1 => $sarpras)
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
                                                        <td>
                                                            <input type="number" name="jumlah[{{$ids}}]" value="{{@$data[$ids]['jumlah']}}" min="0" class="input-custom">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="jumlah_layak[{{$ids}}]" value="{{@$data[$ids]['jumlah_layak']}}" class="input-custom">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="jumlah_tidak_layak[{{$ids}}]" value="{{@$data[$ids]['jumlah_tidak_layak']}}" class="input-custom">
                                                            <input type="hidden" name="nama[{{$ids}}]" value="{{$ss}}">
                                                        </td>
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
                                                            <td>
                                                                <input type="number" name="jumlah[{{$key}}]" value="{{@$data[$key]['jumlah']}}" min="0" class="input-custom">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="jumlah_layak[{{$key}}]" value="{{@$data[$key]['jumlah_layak']}}" class="input-custom">
                                                            </td>
                                                            <td>
                                                                <input type="number" name="jumlah_tidak_layak[{{$key}}]" value="{{@$data[$key]['jumlah_tidak_layak']}}" class="input-custom">
                                                                <input type="hidden" name="nama[{{$key}}]" value="{{$d}}">
                                                            </td>
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
                </div>
            </div>
            <hr>
            <div class="row justify-content-between">
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary m-b-xs">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')

@endsection
