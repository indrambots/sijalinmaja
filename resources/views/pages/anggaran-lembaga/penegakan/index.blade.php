@extends('layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item px-3 text-muted">Penyelenggaraan & Penegakan</li>
</ol>
<div class="row justify-content-center">
    <div class="col-12 mb-2">
        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <div class="card card-custom wave wave-animate-fast wave-primary">
                    <div class="card-body text-center">
                        <a href="{{ url('anggaran/penegakan/kasandra') }}">
                            <span class="svg-icon-6x">
                                <i class="icon-6x text-info mb-10 mt-10 fa-solid fa-chalkboard-user"></i>
                            </span>
                        </a>
                        <br>
                        <a href="{{ url('anggaran/penegakan/kasandra') }}"
                            class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">KASANDRA
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <div class="card card-custom wave wave-animate-fast wave-primary">
                    <div class="card-body text-center">
                        <a href="{{url('anggaran/penegakan/perda')}}">
                            <span class="svg-icon-6x">
                                <i class="icon-6x text-info mb-10 mt-10 fa-solid fa-user-shield"></i>
                            </span>
                        </a>
                        <br>
                        <a href="{{url('anggaran/penegakan/perda')}}"
                            class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">PENEGEKAN PERDA
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
