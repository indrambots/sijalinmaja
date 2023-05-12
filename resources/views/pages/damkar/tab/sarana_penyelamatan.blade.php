<form class="form" method="POST" action="{{ url('damkar/update-sarpras') }}">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="row">
        <div class="col-lg-3"> 
                <span class="form-text">
                    Sarana Penyelamatan pada pertolongan pertama
                </span>
                <input class="form-control" name="sarana_penyelamatan_pada_pertolongan_pertama" value="{{ $sarpras->sarana_penyelamatan_pada_pertolongan_pertama}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Sarana Penyelamatan pada beda ketinggian
                </span>
                <input class="form-control" name="sarana_penyelamatan_pada_beda_ketinggian" value="{{ $sarpras->sarana_penyelamatan_pada_beda_ketinggian}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Sarana Penyelamatan di air
                </span>
                <input class="form-control" name="sarana_penyelamatan_di_air" value="{{ $sarpras->sarana_penyelamatan_di_air}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Sarana Penyelamatan pada binatang (animal rescue)
                </span>
                <input class="form-control" name="sarana_penyelamatan_pada_binatang" value="{{ $sarpras->sarana_penyelamatan_pada_binatang}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Sarana Penyelamatan pada kecelakaan transportasi
                </span>
                <input class="form-control" name="sarana_penyelamatan_pada_kecelakaan_transportasi" value="{{ $sarpras->sarana_penyelamatan_pada_kecelakaan_transportasi}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Sarana Penyelamatan pada bangunan runtuh (collapse structure)
                </span>
                <input class="form-control" name="sarana_penyelamatan_pada_bangunan_runtuh" value="{{ $sarpras->sarana_penyelamatan_pada_bangunan_runtuh}}" type="number"/>
        </div>
    </div>
        <button type="submit" class="btn btn-MD btn-primary mt-4">SIMPAN JUMLAH SARANA</button>
</form>