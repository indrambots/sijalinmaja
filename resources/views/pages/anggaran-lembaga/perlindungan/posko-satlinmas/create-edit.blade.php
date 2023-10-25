@extends('layouts.app')
@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item pe-3">
        @if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_tim_kasus)
            <a href="{{url('anggaran/perlindungan')}}" class="pe-3">
                Perlindungan Masyarakat
            </a>
        @else
            <a href="{{url('anggaran')}}" class="pe-3">
                Anggaran Kab/Kota
            </a>
        @endif
    </li>
    <li class="breadcrumb-item pe-3">
        <a href="{{url('anggaran/perlindungan/posko-satlinmas')}}" class="pe-3">Data Posko Satlinmas</a>
    </li>
    @if($data)
        <li class="breadcrumb-item px-3 text-muted">Edit ({{$data->nama}} - {{$data->nomor_sarpras}})</li>
    @else
        <li class="breadcrumb-item px-3 text-muted">Tambah</li>
    @endif
</ol>
<form class="form" method="POST" action="{{url('anggaran/perlindungan/posko-satlinmas/store')}}" enctype="multipart/form-data">
    @csrf
    @method('post')
    <input type="hidden" name="dataid" value="{{@$data->id}}">
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">FORM POSO SATLINMAS</h3>
        </div>
        <div class="card-body">

        </div>
    </div>
</form>
@endsection
@section('script')
<script>
    $('.select2').select2();
</script>
@endsection
