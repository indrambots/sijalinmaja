<form class="form" method="POST" action="{{ url('damkar/update-sarpras') }}">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="row">
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jaket tahan panas (fire jacket)
                </span>
                <input class="form-control" name="jaket_tahan_panas" value="{{ $sarpras->jaket_tahan_panas}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jaket tahan api (fire jacket dan trouser)
                </span>
                <input class="form-control" name="jaket_tahan_api" value="{{ $sarpras->jaket_tahan_api}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Helm petugas pemadam Kebakaran (fire safety helmet)
                </span>
                <input class="form-control" name="helm_pemadam" value="{{ $sarpras->helm_pemadam}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Kacamata pemadam Kebakaran (fire google)
                </span>
                <input class="form-control" name="kacamata_pemadam" value="{{ $sarpras->kacamata_pemadam}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Masker pemadam Kebakaran (fire masker)
                </span>
                <input class="form-control" name="masker_pemadam" value="{{ $sarpras->masker_pemadam}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Tudung kepala (firehood)
                </span>
                <input class="form-control" name="tudung_kepala" value="{{ $sarpras->tudung_kepala}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Sarung tangan pemadam Kebakaran (fire gloves)
                </span>
                <input class="form-control" name="sarung_tangan_pemadam" value="{{ $sarpras->sarung_tangan_pemadam}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Kampak personil (fire axe)
                </span>
                <input class="form-control" name="kampak_personil" value="{{ $sarpras->kampak_personil}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Sepatu pemadam Kebakaran (fire boot)
                </span>
                <input class="form-control" name="sepatu_pemadam" value="{{ $sarpras->sepatu_pemadam}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Self contained breathing apparatur (SCBA)
                </span>
                <input class="form-control" name="scba" value="{{ $sarpras->scba}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Handy talky (HT)
                </span>
                <input class="form-control" name="ht" value="{{ $sarpras->ht}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Senter personil
                </span>
                <input class="form-control" name="senter" value="{{ $sarpras->senter}}" type="number"/>
        </div>
    </div>
        <button type="submit" class="btn btn-MD btn-primary mt-4">SIMPAN JUMLAH SARANA</button>
</form>