<form class="form" method="POST" action="{{ url('damkar/update-sdm') }}">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="row">
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Kebakaran Seluruhnya
                </span>
                <input class="form-control" name="sdm_seluruhnya" value="{{ $sdm->sdm_seluruhnya}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Kebakaran PNS
                </span>
                <input class="form-control" name="pns" value="{{ $sdm->pns}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Kebakaran NON-PNS
                </span>
                <input class="form-control" name="non_pns" value="{{ $sdm->non_pns}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Kebakaran Golongan IV
                </span>
                <input class="form-control" name="gol_iv" value="{{ $sdm->gol_iv}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Kebakaran Golongan III
                </span>
                <input class="form-control" name="gol_iii" value="{{ $sdm->gol_iii}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Kebakaran Golongan II
                </span>
                <input class="form-control" name="gol_ii" value="{{ $sdm->gol_ii}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Kebakaran Struktural
                </span>
                <input class="form-control" name="jabatan_struktural" value="{{ $sdm->jabatan_struktural}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Kebakaran Fungsional
                </span>
                <input class="form-control" name="jabatan_fungsional" value="{{ $sdm->jabatan_fungsional}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Kebakaran Pelaksana
                </span>
                <input class="form-control" name="jabatan_pelaksana" value="{{ $sdm->jabatan_pelaksana}}" type="number"/>
        </div>
    </div>
        <button type="submit" class="btn btn-MD btn-primary mt-4">SIMPAN DATA SDM</button>
</form>