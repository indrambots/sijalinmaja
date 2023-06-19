<form class="form" method="POST" action="{{ url('damkar/update-sdm') }}">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="row">
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Pemadam Kebakaran Tersertifikasi PNS
                </span>
                <input class="form-control" name="tersertifikasi_pns" value="{{ $sdm->tersertifikasi_pns}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Pemadam Kebakaran Tersertifikasi NON-PNS
                </span>
                <input class="form-control" name="tersertifikasi_non_pns" value="{{ $sdm->tersertifikasi_non_pns}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Damkar Kualifikasi Keahlian/Keterampilan Pemadam
                </span>
                <input class="form-control" name="kualifikasi_pemadam" value="{{ $sdm->kualifikasi_pemadam}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Damkar Kualifikasi Keahlian/Keterampilan Inspektur
                </span>
                <input class="form-control" name="kualifikasi_inspektur" value="{{ $sdm->kualifikasi_inspektur}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Damkar Kualifikasi Keahlian/Keterampilan Penyuluh
                </span>
                <input class="form-control" name="kualifikasi_penyuluh" value="{{ $sdm->kualifikasi_penyuluh}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Damkar Kualifikasi Keahlian/Keterampilan Investigator
                </span>
                <input class="form-control" name="kualifikasi_investigator" value="{{ $sdm->kualifikasi_investigator}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Damkar Kualifikasi Keahlian/Keterampilan Instruktur
                </span>
                <input class="form-control" name="kualifikasi_instruktur" value="{{ $sdm->kualifikasi_instruktur}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Jumlah SDM Damkar Kualifikasi Keahlian/Keterampilan Lainnya
                </span>
                <input class="form-control" name="kualifikasi_kebakaran_lain" value="{{ $sdm->kualifikasi_kebakaran_lain}}" type="number"/>
        </div>
    </div>
        <button type="submit" class="btn btn-MD btn-primary mt-4">SIMPAN DATA SDM</button>
</form>