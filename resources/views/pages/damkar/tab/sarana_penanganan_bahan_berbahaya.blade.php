<form class="form" method="POST" action="{{ url('damkar/update-sarpras') }}">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="row">
        <div class="col-lg-3"> 
                <span class="form-text">
                    Pakaian bahan berbahaya dan beracun
                </span>
                <input class="form-control" name="pakaian_pelindung" value="{{ $sarpras->pakaian_pelindung}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Gas detector
                </span>
                <input class="form-control" name="gas_detector" value="{{ $sarpras->gas_detector}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Peralatan decontaminasi
                </span>
                <input class="form-control" name="peralatan_decontaminasi" value="{{ $sarpras->peralatan_decontaminasi}}" type="number"/>
        </div>
    </div>
        <button type="submit" class="btn btn-MD btn-primary mt-4">SIMPAN JUMLAH SARANA</button>
</form>