@extends('layouts.app')

@section('content')
<div class="col">
  <div class="card">
    <div class="card-body">
      <div class="row justify-content-between">
        <div class="col-4">
          <h5 class="card-title">Data Kegiatan</h5>
        </div>
        <div class="col-4">
          <div class="d-flex justify-content-end">
          <a href="{{ url('kegiatan/create/0')}} " type="button" class="btn btn-outline-primary m-b-xs "><i class="fas fa-plus-circle"></i> Buat Kegiatan</a>
        </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="table-responsive">
          <table id="datatable" class="table table-striped table-hover">
            <thead>
              <tr>
                <th>id</th>
                <th>Jenis Kegiatan</th>
                <th>Nama Kegiatan</th>
                <th>Tanggal</th>
                <th>Penanggung Jawab</th>
                <th>Kota</th>
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