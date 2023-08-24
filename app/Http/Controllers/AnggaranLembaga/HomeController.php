<?php

namespace App\Http\Controllers\AnggaranLembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MasterGolonganLembaga;
use App\AnggaranProfilLembaga;
use App\Kota;
use App\AnggaranBidang;
use Yajra\Datatables\Datatables;

class HomeController extends Controller
{
    public function index(){

        $profil = AnggaranProfilLembaga::where('userid', auth()->user()->id)->first();
        $golongan = MasterGolonganLembaga::all();
        $kota = Kota::orderBy('nama', 'asc')->get();

        return view('pages.anggaran-lembaga.index', compact('profil', 'golongan', 'kota'));
    }

    public function ProfilStore(Request $request){

        $data = $request->profileid ? AnggaranProfilLembaga::find($request->profileid): new AnggaranProfilLembaga();
        $request->merge([
            'anggaran' => str_replace(',', '', $request->anggaran),
        ]);
        foreach($request->all() as $field => $val){
            if($field != 'profileid' && $field != '_token'){
                $data->$field = $val;
            }
        }
        $data->save();

        return redirect('anggaran')->with('msg_success', $request->profileid ? 'Berhasil diperbaharui.' : 'Berhasil disimpan.');
    }

    public function AnggaranStore(Request $request){

        $request->merge([
            'anggaran' => str_replace(',', '', $request->anggaran),
        ]);
        $data = $request->anggaranid ? AnggaranBidang::find($request->anggaranid): new AnggaranBidang();
        foreach($request->all() as $field => $val){
            if($field != 'anggaranid' && $field != '_token'){
                $data->$field = $val;
            }
        }
        $data->save();

        return redirect('anggaran')->with('msg_success', $request->anggaranid ? 'Berhasil diperbaharui.' : 'Berhasil disimpan.');
    }

    public function AnggaranDelete($id){

        $data = AnggaranBidang::find($id);
        $data->delete();

        return redirect('anggaran')->with('msg_success', 'Berhasil dihapus.');
    }

    public function anggaranDatatable(){

        $query = AnggaranBidang::query();
        $query->orderBy('id', 'desc');

        return Datatables::of($query)
        ->addColumn('raw_anggaran', function($data){

            return 'Rp. '.number_format($data->anggaran);
        })
        ->addColumn('aksi', function ($data) {
            $html = '
                <form action="'.url('anggaran/bidang/delete', $data->id).'" method="post" id="form-delete'.$data->id.'">
                    '.csrf_field().' '.method_field('DELETE').'
                    <button type="button" onclick="anggaranManage(\''. $data->id.'\', \''. $data->unit_kerja.'\', \''. $data->anggaran.'\', \''. $data->tahun_anggaran.'\')" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-edit-1"></i></button>
                    <button type="button" onclick="deleteData('.$data->id.')" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-trash-alt"></i></button>
                </form>
            ';

            return $html;
        })
        ->rawColumns(['raw_anggaran', 'aksi'])
        ->make(true);
    }

    public function SpmStore(Request $request){
        $data = AnggaranProfilLembaga::find($request->profileid);
        $files = $request->spm;
        $fileName = 'spm_kab_'.date('YmdHis').'.'.$files->getClientOriginalExtension();
        $path = public_path('berkas');
        if($data->spm){
            unlink($path.'/'.$data->spm);
        }
        if(file_exists($path) == false){
            mkdir($path, 0755, true);
        }
        $data->nilai_spm = $request->nilai_spm;
        $data->spm = $fileName;
        $files->move($path, $fileName);
        $data->save();

        return redirect('anggaran')->with('msg_success', 'Berhasil disimpan.');
    }
}
