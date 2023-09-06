<?php

namespace App\Http\Controllers\AnggaranLembaga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\AliasName;
use App\Helpers\Helpers;
use App\Kasandra;
use Yajra\Datatables\Datatables;

class KasandraController extends Controller
{
    public function datatable(){

        $query = Kasandra::query();
        $query->orderBy('id', 'desc');

        return Datatables::of($query)
        ->addColumn('aksi', function ($data) {
            $html = '';
            if(auth()->user()->level == AliasName::level_dinas || auth()->user()->level == AliasName::level_admin){
                $html = '
                    <form action="'.url('anggaran/penegakan/kasandra/delete', $data->id).'" method="post" id="form-delete'.$data->id.'">
                        '.csrf_field().' '.method_field('DELETE').'
                        <a href="'.url('anggaran/penegakan/kasandra/create', $data->id).'" class="popover_edit btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="flaticon-edit-1"></i></a>
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

        return view('pages.anggaran-lembaga.penegakan.kasandra.index');
    }

    public function createOrEdit($id){

        $data = Kasandra::find($id);
        $jenis_tertib = [];
        if($data){
            $jenis_tertib = Helpers::getJenisTertib($data->urusan_pemerintahan);
        }

        return view('pages.anggaran-lembaga.penegakan.kasandra.create-edit', compact('data', 'jenis_tertib'));
    }

    public function storeOrUpdate(Request $request){

        $request->request->remove('_token');
        $request->request->remove('_method');
        $request->merge([
            'user_id' => auth()->user()->id
        ]);
        $data = $request->dataid ? Kasandra::find($request->dataid) : new Kasandra();
        $request->request->remove('dataid');
        foreach($request->all() as $field => $val){
            $data->$field = $val;
        }
        $data->save();

        return redirect('anggaran/penegakan/kasandra')->with('msg_success', $request->dataid ? 'Berhasil diperbaharui.' : 'Berhasil disimpan.');
    }

    public function destroy($id){

        $data = Kasandra::find($id);
        $data->delete();

        return redirect('anggaran/penegakan/kasandra')->with('msg_success', 'Berhasil dihapus.');
    }

    public function getUraian(Request $request){

        $data = Helpers::getJenisTertib($request->uraian)->toArray();

        return response()->json($data);
    }
}
