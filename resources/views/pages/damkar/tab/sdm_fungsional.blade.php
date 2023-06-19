<form class="form" method="POST" action="{{ url('damkar/update-sdm') }}">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="row">
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah JF Analis Kebakaran Pertama
                </span>
                <input class="form-control" name="analis_kebakaran_pertama" value="{{ $sdm->analis_kebakaran_pertama}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah JF Analis Kebakaran Muda
                </span>
                <input class="form-control" name="analis_kebakaran_muda" value="{{ $sdm->analis_kebakaran_muda}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah JF Analis Kebakaran Madya
                </span>
                <input class="form-control" name="analis_kebakaran_madya" value="{{ $sdm->analis_kebakaran_madya}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah JF Pemadam Kebakaran Pemula
                </span>
                <input class="form-control" name="jf_pemula" value="{{ $sdm->jf_pemula}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah JF Pemadam Kebakaran Terampil
                </span>
                <input class="form-control" name="jf_terampil" value="{{ $sdm->jf_terampil}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah JF Pemadam Kebakaran Mahir
                </span>
                <input class="form-control" name="jf_mahir" value="{{ $sdm->jf_mahir}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah JF Pemadam Kebakaran Penyelia
                </span>
                <input class="form-control" name="jf_penyelia" value="{{ $sdm->jf_penyelia}}" type="number"/>
        </div>
    </div>
        <button type="submit" class="btn btn-MD btn-primary mt-4">SIMPAN DATA SDM</button>
</form>