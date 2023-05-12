<form class="form" method="POST" action="{{ url('damkar/update-sarpras') }}">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="row">
        <div class="col-lg-3"> 
                <span class="form-text">
                    Mobil pemadam Kebakaran pompa/fire boat/kapal pemadam
                </span>
                <input class="form-control" name="mobil_pemadam_kebakaran" value="{{ $sarpras->mobil_pemadam_kebakaran}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Mobil Penyelamatan/rescue
                </span>
                <input class="form-control" name="mobil_rescue" value="{{ $sarpras->mobil_rescue}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Mobil Komando
                </span>
                <input class="form-control" name="mobil_komando" value="{{ $sarpras->mobil_komando}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Mobil tangki air (water supply)
                </span>
                <input class="form-control" name="mobil_tangki_air" value="{{ $sarpras->mobil_tangki_air}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Mobil angkut personil
                </span>
                <input class="form-control" name="mobil_angkut_personil" value="{{ $sarpras->mobil_angkut_personil}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Pompa apung pemadam Kebakaran (floating pump)
                </span>
                <input class="form-control" name="pompa_apung_pemadam" value="{{ $sarpras->pompa_apung_pemadam}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Pemancar pemadam Kebakaran (nozzle)
                </span>
                <input class="form-control" name="pemancar_pemadam_kabaran" value="{{ $sarpras->pemancar_pemadam_kabaran}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Pipa cabang pemadam Kebakaran (y connection)
                </span>
                <input class="form-control" name="pipa_cabang_pemadam_kebakaran" value="{{ $sarpras->pipa_cabang_pemadam_kebakaran}}" type="number"/>
        </div>
    </div>
        <button type="submit" class="btn btn-MD btn-primary mt-4">SIMPAN JUMLAH SARANA</button>
</form>