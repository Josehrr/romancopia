<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
        $this->middleware('user.status');
    }

    public function getUsers($status){
        if($status == 'all'):
        $users = User::orderBy('id','Desc')->paginate(30);
        else:
            $users = User::where('status', $status)->orderBy('id','Desc')->paginate(30);
        endif;
        $data = ['users' => $users];
        return view('admin.users.home', $data);
    }

    public function getUserEdit($id){
        $user = User::findOrFail($id);
        $data = ['user' => $user];
        return view('admin.users.edit', $data);
    }

    public function getUserBanned($id){
        $user = User::findOrFail($id);
        if($user->status == '100'):
            $user->status = '0';
            $msg = "Usuario activado nuevamente.";
            $a = "success";
        else:
            $user->status = '100';
            $msg = "Usuario suspendido con exito.";
            $a = "warning";
        endif;

        if($user->save()):
            return back()->with('message', $msg)->with('typealert',$a);
        endif;
    }
}
