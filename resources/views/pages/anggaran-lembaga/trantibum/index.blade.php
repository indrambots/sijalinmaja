@extends('layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item px-3 text-muted">Penyelenggaraan Trantibum dan Penegakan Perda/Perkada</li>
</ol>
<div class="row justify-content-center">
    <div class="col-12 mb-2">
        <div class="row">
            <div class="col-6 col-lg-6 col-xl-6 mb-5">
                <div class="card card-custom wave wave-animate-fast wave-primary">
                    <div class="card-body text-center">
                        <a href="{{url('kasus')}}">
                            <span class="svg-icon svg-icon-primary svg-icon-6x">
                                <i class="icon-6x text-info mb-10 mt-10 fa-solid flaticon2-warning" aria-hidden="true"></i>
                            </span>
                        </a>
                        <br>
                        <a href="{{url('kasus')}}"
                            class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">KASUS
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
