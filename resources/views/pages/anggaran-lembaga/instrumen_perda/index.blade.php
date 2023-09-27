@extends('layouts.app')

@section('content')
<div class="card card-custom gutter-b bg-diagonal bg-diagonal-light-success">
 <div class="card-body">
  <div class="d-flex align-items-center justify-content-between p-4 flex-lg-wrap flex-xl-nowrap">
   <div class="d-flex flex-column mr-5">
    <a href="#" class="h4 text-dark text-hover-primary mb-5">
    Instrumen Penegakan Perda dan Perkada
    </a>
    <p class="text-dark" style="text-align:justify;">
     Instrumen ini disusun atas aspek kebijakan, penindakan, sarana dan prasarana, sumber daya manusia, serta monitoring, pelaporan, dan evaluasi. Setiap aspek disusun atas landasan pemikiran bahwa keberhasilan penegakan Perda dan Perkada yang dilaksanakan oleh Satuan Polisi Pamong Praja merupakan akumulasi dari ketepatan kebijakan terkait penegakan Perda dan Perkada, eksekusi penindakan di lapangan, ketersediaan sarana dan prasarana pada Satuan Polisi Pamong Praja yang mumpuni, kesesuaian kuantitas dan kualitas sumber daya manusia Pol PP, serta berjalannya sistem check and balances melalui mekanisme monitoring, pelaporan, dan
evaluasi. Penilaian Instrumen ini berdasarkan kepada Keputusan Menteri Dalam Negeri Nomor 100.4.2.4 - 084 Tahun 2023
    </p>
   </div>
   <div class="ml-6 ml-lg-0 ml-xxl-6 flex-shrink-0">
    <a href="https://drive.google.com/file/d/1TM4HO9rBkGjQ2vnb11f1gcOSL3Flm5ju/view?usp=sharing" target="_blank" class="btn font-weight-bolder text-uppercase btn-success py-4 px-6">
    Download Dasar Hukum
    </a>
   </div>
  </div>
 </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="card-label"><h4>Penilaian Instrumen Penegakan Perda dan Perkada</h4></div><div class="row mt-2">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-sm nowrap" style="width:100% !important">
                    <thead>
                        <tr>
                            <th colspan="4">Indikator dan Kelas Interval</th>
                            <th >Penjelasan</th>
                            <th >Bukti/Data Dukung</th>
                            <th >Skala</th>
                            <th >Bobot</th>
                            <th></th>
                            <th >Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($indikator_jenis as $i)
                    	<tr>
                    		<td colspan="10" style="background-color:#1ff3f3;">A. {{$i->indikator_jenis}}</td>
                    	</tr>

<?php $indikator_variabel = DB::SELECT("SELECT DISTINCT(variabel_jenis) FROM master_instrumen_perda_keterangan WHERE indikator_jenis = '".$i->indikator_jenis."' ");
?>
							@foreach($indikator_variabel as $v)
		                    	<tr>
		                    		<td style="background-color:#afafaf;"></td>
		                    		<td colspan="9" style="background-color:#49ffff;">I. {{$v->variabel_jenis}}</td>
		                    	</tr>
<?php $indikator_judul = DB::SELECT("SELECT * FROM master_instrumen_perda_keterangan WHERE variabel_jenis = '".$v->variabel_jenis."' ");
?>
								@foreach($indikator_judul as $j)
							<tr>
								<td style="background-color:#afafaf;"></td>
								<td style="background-color:#afafaf;"></td>
								<td>{{$loop->iteration}}.</td>
								<td>{{$j->indikator_judul}}</td>
								<td>{{$j->penjelasan}}</td>
								<td>{{$j->keterangan_bukti}}</td>
								<td>Skala</td>
								<td>bobot</td>
								<td>Skor</td>
								<td>Aksi</td>
							</tr>
								@endforeach
							@endforeach
                    	@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection