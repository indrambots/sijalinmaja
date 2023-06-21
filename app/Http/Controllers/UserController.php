<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function gantipassword(Request $request){
        // echo $request->username;
        // echo $request->password;
        // dd($request->all());
        $users = User::where('username',$request->username)->first();
        $users->password= Hash::make($request['password']);
        $users->save();
        return redirect('/')->with('message','Password Updated');
    }

    public function reset_password(Request $request){
        $users = User::find($request->id);
        $users->password = Hash::make('qwerty');
        $users->save();
    }

    public function update_level(Request $request)
    {
        $users = User::find($request->id);
        $users->level = $request->level;
        $users->save();
        return redirect('/user')->with('success_level','Level Updated');
    }

    public function index()
    {
        return view('pages.user.index');
    }

    public function datatable()
    {
        $user = User::all();
        return Datatables::of($user)
        ->addColumn('aksi',function($i){
            $btn_aksi = '<button onclick="resetPassword('.$i->id.')" type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-undo-alt"></i></button> <button data-toggle="modal" data-target="#modal-level" onclick="updateLevel('.$i->id.')" type="button" class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-primary"><i class="fas fa-user-circle"></i></button>';
            return '<div class="btn-group mr-2" role="group" aria-label="First group">'.$btn_aksi.'</div>';
        })->addColumn('jabatan',function($i){
            if(!isset($i->pegawai)):
                return 'Perangkat Daerah';
            else:
                return $i->pegawai->nama_jabatan;
            endif;
        })
        ->editColumn('level',function($i){
            return $i->getLevel($i->level);
        })->rawColumns(['aksi'])
        ->make(true);
    }
}
