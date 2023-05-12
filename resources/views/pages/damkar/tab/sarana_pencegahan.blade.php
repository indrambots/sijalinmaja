<form class="form" method="POST" action="{{ url('damkar/update-sarpras') }}">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="row">
        <div class="col-lg-3"> 
                <span class="form-text">
                    Sistem hydrant kota
                </span>
                <input class="form-control" name="sistem_hydrant" value="{{ $sarpras->sistem_hydrant}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Groundtank/reservoir air
                </span>
                <input class="form-control" name="groundtank" value="{{ $sarpras->groundtank}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Alat pemadam api ringan
                </span>
                <input class="form-control" name="alat_pemadam_api_ringan" value="{{ $sarpras->alat_pemadam_api_ringan}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Pompa pemadam kebakaran portable
                </span>
                <input class="form-control" name="pompa_pemadam_portable" value="{{ $sarpras->pompa_pemadam_portable}}" type="number"/>
        </div>
    </div>
        <button type="submit" class="btn btn-MD btn-primary mt-4">SIMPAN JUMLAH SARANA</button>
</form>