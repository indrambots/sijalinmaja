<form class="form" method="POST" action="{{ url('damkar/update-sarpras') }}">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="row">
        <div class="col-lg-3"> 
                <span class="form-text">
                    Alat peraga simulator korsleting listrik
                </span>
                <input class="form-control" name="simulator_korsleting" value="{{ $sarpras->simulator_korsleting}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Instalasi kelistrikan sederhana
                </span>
                <input class="form-control" name="instalasi_kelistrikan_sederhana" value="{{ $sarpras->instalasi_kelistrikan_sederhana}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Alat peraga simulator kebocoran Liquified Petroleum Gas
                </span>
                <input class="form-control" name="simulator_kebocoran_liquid" value="{{ $sarpras->simulator_kebocoran_liquid}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Alat peraga praktek pemadaman Kebakaran
                </span>
                <input class="form-control" name="peraga_praktek_kebakaran" value="{{ $sarpras->peraga_praktek_kebakaran}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Alat praktek sederhana pemadaman Kebakaran hutan dan lahan
                </span>
                <input class="form-control" name="peraga_praktek_kebakaran_hutan_dan_lahan" value="{{ $sarpras->peraga_praktek_kebakaran_hutan_dan_lahan}}" type="number"/>
        </div>
    </div>
        <button type="submit" class="btn btn-MD btn-primary mt-4">SIMPAN JUMLAH SARANA</button>
</form>