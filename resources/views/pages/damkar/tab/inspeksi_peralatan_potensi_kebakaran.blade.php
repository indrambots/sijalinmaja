<form class="form" method="POST" action="{{ url('damkar/update-sarpras') }}">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="row">
        <div class="col-lg-3"> 
                <span class="form-text">
                    Pitot
                </span>
                <input class="form-control" name="pitot" value="{{ $sarpras->pitot}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Alat uji alarm/detector
                </span>
                <input class="form-control" name="alat_uji_alarm" value="{{ $sarpras->alat_uji_alarm}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Alat uji sprinkler
                </span>
                <input class="form-control" name="alat_uji_sprinkler" value="{{ $sarpras->alat_uji_sprinkler}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Flowmeter
                </span>
                <input class="form-control" name="flowmeter" value="{{ $sarpras->flowmeter}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Anemometer
                </span>
                <input class="form-control" name="anemometer" value="{{ $sarpras->anemometer}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Tachometer
                </span>
                <input class="form-control" name="tachometer" value="{{ $sarpras->tachometer}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Multitester
                </span>
                <input class="form-control" name="multitester" value="{{ $sarpras->multitester}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Alat ukur
                </span>
                <input class="form-control" name="alat_ukur" value="{{ $sarpras->alat_ukur}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Helm keselamatan (safety helm)
                </span>
                <input class="form-control" name="helm_keselamatan" value="{{ $sarpras->helm_keselamatan}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Sepatu keselamatan (safety shoes)
                </span>
                <input class="form-control" name="sepatu_keselamatan" value="{{ $sarpras->sepatu_keselamatan}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Kacamata safety
                </span>
                <input class="form-control" name="kacamata_safety" value="{{ $sarpras->kacamata_safety}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Masker safety
                </span>
                <input class="form-control" name="masker_safety" value="{{ $sarpras->masker_safety}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Sarung tangan safety
                </span>
                <input class="form-control" name="sarung_tangan_safety" value="{{ $sarpras->sarung_tangan_safety}}" type="number"/>
        </div>
    </div>
        <button type="submit" class="btn btn-MD btn-primary mt-4">SIMPAN JUMLAH SARANA</button>
</form>