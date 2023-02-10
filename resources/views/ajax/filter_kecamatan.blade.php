@foreach($kecamatan as $k)
 <option value="{{ $k->kode_kec }}"> {{ $k->nama }}</option>
@endforeach