<form class="form" method="POST" action="{{ url('damkar/update-sarpras') }}">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="row">
        <div class="col-lg-3"> 
                <span class="form-text">
                    Bangunan gedung
                </span>
                <input class="form-control" name="bangunan" value="{{ $sarpras->bangunan}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Pos sektor di setiap kecamatan atau sebutan lainnya
                </span>
                <input class="form-control" name="pos_kecamatan" value="{{ $sarpras->pos_kecamatan}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Pos pemadam Kebakaran di setiap kelurahan/desa atau
                </span>
                <input class="form-control" name="pos_kelurahan" value="{{ $sarpras->pos_kelurahan}}" type="number"/>
        </div>
    </div>
        <button type="submit" class="btn btn-MD btn-primary mt-4">SIMPAN JUMLAH PRASARANA</button>
</form>