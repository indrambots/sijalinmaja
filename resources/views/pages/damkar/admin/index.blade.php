@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="{{ url('damkar/report/kelembagaan') }}">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid fas fa-school" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="{{ url('damkar/report/kelembagaan') }}"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">PROFIL KELEMBAGAAN
                    </a>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="{{ url('damkar/report/sdm') }}">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid fas fa-user-tie" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="{{ url('damkar/report/sdm') }}"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">LAPORAN DATA SDM
                    </a>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="{{ url('damkar/report/sarpras') }}">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid fas fa-fire-extinguisher" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="{{ url('damkar/report/sarpras') }}"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">LAPORAN DATA SARPRAS
                    </a>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="{{ url('damkar/report/kejadian') }}">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid fas fa-fire-alt" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="{{ url('damkar/report/kejadian') }}"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">LAPORAN KEJADIAN
                    </a>
                </div>
            </div>
        </div>
        {{-- <div class="col-6 col-lg-6 col-xl-6 mb-5">
            <div class="card card-custom wave wave-animate-fast wave-primary">
                <div class="card-body text-center">
                    <a href="{{ url('damkar/rekap/kejadian') }}">
                        <span class="svg-icon svg-icon-primary svg-icon-6x">
                            <i class="icon-6x text-info mb-10 mt-10 fa-solid flaticon-map-location" aria-hidden="true"></i>
                        </span>
                    </a>
                    <br>
                    <a href="{{ url('damkar/rekap/kejadian') }}"
                        class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">REKAP KEJADIAN
                    </a>
                </div>
            </div>
        </div> --}}
    </div>
@endsection