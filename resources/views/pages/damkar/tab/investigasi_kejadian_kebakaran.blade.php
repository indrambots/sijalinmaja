<form class="form" method="POST" action="{{ url('damkar/update-sarpras') }}">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <div class="row">
        <div class="col-lg-3"> 
                <span class="form-text">
                    Kamera digital
                </span>
                <input class="form-control" name="kamera_digital" value="{{ $sarpras->kamera_digital}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Gas detektor kamera
                </span>
                <input class="form-control" name="gas_detektor_kamera" value="{{ $sarpras->gas_detektor_kamera}}" type="number"/>
        </div>
        <div class="col-lg-3"> 
                <span class="form-text">
                    Handy cam
                </span>
                <input class="form-control" name="handycam" value="{{ $sarpras->handycam}}" type="number"/>
        </div>
    </div>
        <button type="submit" class="btn btn-MD btn-primary mt-4">SIMPAN JUMLAH SARANA</button>
</form>