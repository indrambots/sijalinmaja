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
        @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_dinas_dan_damkar)
            <a href="{{url('anggaran/kelembagaan')}}" class="pe-3">
                Kelembagaan
            </a>
        @else
            <a href="{{url('anggaran')}}" class="pe-3">
                Data Kab/Kota
            </a>
        @endif
    </li>
    <li class="breadcrumb-item px-3 text-muted">Alokasi Anggaran</li>
</ol>
<div class="card">
    <form class="form" method="POST" action="{{url('anggaran/kelembagaan/alokasi-anggaran/store')}}">
        @csrf
        @method('post')
        <div class="card-body">
            <div class="card-label"><h4>Alokasi Anggaran</h4></div>
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
                                <th><strong>NO</strong></th>
                                <th><strong>ALOKASI ANGGARAN</strong></th>
                                <th><strong>NILAI ALOKASI ANGGARAN</strong></th>
                                <th><strong>PERMASALAHAN</strong></th>
                                <th><strong>SOLUSI</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Helpers::listAlokasiAnggaran() as $list)
                                <tr>
                                    <td class="text-center">
                                        <input type="hidden" name="nama_alokasi[{{$list['kode']}}]" value="{{$list['nama']}}">
                                        {{$list['no']}}
                                    </td>
                                    <td>{{$list['nama']}}</td>
                                    <td>
                                        <input type="text" name="nilai_anggaran[{{$list['kode']}}]" value="{{isset($data[$list['kode']]) ? $data[$list['kode']]['nilai_anggaran'] : ''}}" class="input-custom rupiah">
                                    </td>
                                    <td>
                                        <textarea type="number" name="permasalahan[{{$list['kode']}}]" value="" class="input-custom">{{isset($data[$list['kode']]) ? $data[$list['kode']]['permasalahan'] : ''}}</textarea>
                                    </td>
                                    <td>
                                        <textarea type="number" name="solusi[{{$list['kode']}}]" value="" class="input-custom">{{isset($data[$list['kode']]) ? $data[$list['kode']]['solusi'] : ''}}</textarea>
                                    </td>
                                </tr>
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
