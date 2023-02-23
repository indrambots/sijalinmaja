@extends('layouts.app')
@section('content')
<div class="col">
  <div class="card">
    <div class="card-body">
      <div class="row justify-content-between">
        <div class="col-4">
          <h5 class="card-title">Penanganan Kasus</h5>
        </div>
        <div class="col-4">
          <div class="d-flex justify-content-end">
          {{-- <a href="{{ url('penanganan/create/0')}} " type="button" class="btn btn-outline-primary m-b-xs "><i class="fas fa-plus-circle"></i> Input Data Kasus Baru</a> --}}
        </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>id</th>
                <th>Judul Kasus</th>
                <th>Deskripsi Kasus</th>
                <th>Tanggal Informasi Kasus</th>
                <th>Lokasi</th>
                <th>Pelapor</th>
                <th>Pelanggar</th>
                <th>Status</th>
                <th>Perda</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scriptTambahan')
<script type="text/javascript">
	
</script>
@endsection