<?php

namespace App\Http\Controllers\AnggaranLembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\AliasName;
use App\PenegakanPerda;
use App\Kasandra;
use Yajra\Datatables\Datatables;

class PenegekanPerdaController extends Controller
{
    public function datatable(){

        $query = PenegakanPerda::query();
        if(auth()->user()->level == AliasName::level_dinas){
            $query->where('created_by', auth()->user()->id);
        }
        $query->orderBy('id', 'desc');

        return Datatables::of($query)
        ->addColumn('aksi', function ($data) {
            $html = '';
            if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_admin){
                $html = '
                    <form action="'.url('anggaran/penegakan/perda/delete', $data->id).'" method="post" id="form-delete'.$data->id.'">
                        '.csrf_field().' '.method_field('DELETE').'
                        <a href="'.url('anggaran/penegakan/perda/create', $data->id).'" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-edit-1"></i></a>
                        <button type="button" onclick="deleteData('.$data->id.')" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-trash-alt"></i></button>
                    </form>
                ';
            }

            return $html;
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }

    public function index(){

        return view('pages.anggaran-lembaga.penegakan.perda.index');
    }

    public function createOrEdit($id){

        $data = PenegakanPerda::find($id);

        return view('pages.anggaran-lembaga.penegakan.perda.create-edit', compact('data'));
    }

    public function storeOrUpdate(Request $request){

        $kasandra = Kasandra::find($request->perda);

        $request->request->remove('_token');
        $request->request->remove('_method');
        $request->merge([
            'created_by' => auth()->user()->id,
            'perda' => $kasandra->perda,
            'urusan' => $kasandra->urusan_pemerintahan,
            'jenis_tertib' => $kasandra->jenis_tertib
        ]);
        $data = $request->dataid ? PenegakanPerda::find($request->dataid) : new PenegakanPerda();
        $request->request->remove('dataid');
        foreach($request->all() as $field => $val){
            $data->$field = $val;
        }
        $data->save();

        return redirect('anggaran/penegakan/perda')->with('msg_success', $request->dataid ? 'Berhasil diperbaharui.' : 'Berhasil disimpan.');
    }

    public function destroy($id){

        $data = PenegakanPerda::find($id);
        $data->delete();

        return redirect('anggaran/penegakan/perda')->with('msg_success', 'Berhasil dihapus.');
    }
}
