@extends('layouts.app')

@section('content')
<ol class="breadcrumb breadcrumb-dot text-muted fs-6 fw-bold">
    <li class="breadcrumb-item pe-3">
        <a href="{{url('home')}}" class="pe-3">Dashboard</a>
    </li>
    <li class="breadcrumb-item px-3 text-muted">Anggaran Kab/Kota</li>
</ol>
<div class="row justify-content-center">
    <div class="col-12 mb-2">
        <div class="row">
            <div class="col-12 col-md-6 mb-3">
                <div class="card card-custom wave wave-animate-fast wave-primary">
                    <div class="card-body text-center">
                        <a href="{{ url('anggaran/report/kelembagaan') }}">
                            <span class="svg-icon svg-icon-primary svg-icon-6x">
                                <i class="icon-6x text-info mb-10 mt-10 fa-solid fas fa-school"></i>
                            </span>
                        </a>
                        <br>
                        <a href="{{ url('anggaran/report/kelembagaan') }}"
                            class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">PROFIL KELEMBAGAAN
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <div class="card card-custom wave wave-animate-fast wave-primary">
                    <div class="card-body text-center">
                        <a href="{{ url('anggaran/report') }}">
                            <span class="svg-icon-6x">
                                <i class="icon-6x text-info mb-10 mt-10 fa-solid fa-file-invoice-dollar"></i>
                            </span>
                        </a>
                        <br>
                        <a href="{{ url('anggaran/report') }}"
                            class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">LAPORAN ANGGARAN
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <div class="card card-custom wave wave-animate-fast wave-primary">
                    <div class="card-body text-center">
                        <a href="{{url('anggaran/kelembagaan/sarpras')}}">
                            <span class="svg-icon-6x">
                                <i class="icon-6x text-info mb-10 mt-10 fa-solid fa-tree-city"></i>
                            </span>
                        </a>
                        <br>
                        <a href="{{url('anggaran/sarpras')}}"
                            class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">DATA SARPRAS
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <div class="card card-custom wave wave-animate-fast wave-primary">
                    <div class="card-body text-center">
                        <a href="{{url('anggaran/kelembagaan/pegawai-kab')}}">
                            <span class="svg-icon-6x">
                                <i class="icon-6x text-info mb-10 mt-10 fa-solid fas fa-users-line"></i>
                            </span>
                        </a>
                        <br>
                        <a href="{{url('anggaran/pegawai-kab')}}"
                            class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">DATA PEGAWAI
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <div class="card card-custom wave wave-animate-fast wave-primary">
                    <div class="card-body text-center">
                        <a href="{{url('anggaran/perlindungan/anggota-satlinmas')}}">
                            <span class="svg-icon-6x">
                                <i class="icon-6x text-info mb-10 mt-10 fa-solid fa-people-group"></i>
                            </span>
                        </a>
                        <br>
                        <a href="{{url('anggaran/perlindungan/anggota-satlinmas')}}"
                            class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">ANGGOTA SATLINMAS
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-3">
                <div class="card card-custom wave wave-animate-fast wave-primary">
                    <div class="card-body text-center">
                        <a href="{{url('anggaran/perlindungan/posko-satlinmas')}}">
                            <span class="svg-icon-6x">
                                <i class="icon-6x text-info mb-10 mt-10 fa-solid fa-house-flag"></i>
                            </span>
                        </a>
                        <br>
                        <a href="{{url('anggaran/perlindungan/posko-satlinmas')}}"
                            class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">POSKO SATLINMAS
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
