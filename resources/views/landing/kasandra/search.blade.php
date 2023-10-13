<p>Ditemukan ({{ count($kasandra) }} perda) dari kata kunci "<strong>{{ $keyword }}</strong>" </p>
@foreach($kasandra as $k)
<div class="card border-success col-md-12 mb-2">
                        <div class="card-body">
                            <h2 style="font-size: 16px; line-height: 1.3em; font-weight: 700;">
                             <i class="fas fa-book-reader"></i>  {{ $k->perda }}
                            </h2>
                            <div class="d-flex justify-content-between">
                                <p class="bg-primary text-white" style="font-size: 14px; font-weight: 800;">
                                    <i class="fab fa-readme"></i> Urusan : <span>{{ $k->urusan_pemerintahan }}</span>
                                </p>
                                <p class="bg-primary text-white" style="font-size: 14px; font-weight: 800;">
                                     <i class="fas fa-book-reader"></i> Jenis Tentram Tertib : <span>{{ $k->jenis_tertib }}</span>
                                </p>
                            </div>
                            <p style="text-indent:2em;" >
                                Kewajiban ( Pasal <strong>{{ $k->pasal_kewajiban }}</strong>) <label style="text-align: justify;">{{ $k->kewajiban }}</label>
                            </p>
                            <p style="text-indent:2em;">
                                Sanksi Administrasi (Pasal <strong>{{ $k->pasal_sanksi_adm }}</strong>)<label style="text-align: justify;">{{ $k->sanksi_adm }}</label>
                            </p>
                            <p style="text-indent:2em;">
                                Sanksi Pidana (Pasal <strong>{{ $k->pasal_sanksi_pidana }}</strong>)<br><label style="text-align: justify;">{{ $k->sanksi_pidana }}</label>
                            </p>
                            <h2 class="text-primary" style="font-size: 16px; line-height: 1.3em; font-weight: 750;">
                             <i class="fas fa-book-reader"></i>  {{  $k->opd }}
                            </h2>
                        </div>
                    </div>
                    @endforeach