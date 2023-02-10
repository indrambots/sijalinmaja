@foreach($kelurahan as $k)
 <option value="{{ $k->kode_kel }}">{{ $k->status_admin}} {{ $k->nama_desa }}</option>
@endforeach