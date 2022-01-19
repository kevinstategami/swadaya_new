<?php

namespace App\Http\Controllers\Backoffice\UserPengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Utils\Query;
use Session;

class UserPenggunaController extends Controller
{
    public function index(Request $request){
        $data = Query::PagingResponse($request, new User, 'backoffice.user-pengguna.index', 'users');
        return $data;
    }

    public function create(){
        $data = Query::RedirectResponse('backoffice.user-pengguna.create');
        return $data;
    }

    public function edit($id){
        $data = Query::RedirectResponse('backoffice.user-pengguna.edit','users', 'id', $id);
        return $data;
    }

    public function store(Request $request){
        unset($request['konfirmasi_password']);
        $request->password = bcrypt($request->password);
        $data = Query::InsertRow('users', $request->all(), 'userPengguna');
        return $data;
    }

    public function update(Request $request, $id){
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->password = $request->password ? bcrypt($request->password) : $data->password;
        $data->type = $request->type;
        $data->status_aktivasi = $request->status_aktivasi;
        $data->save();

        Session::flash('title', 'Berhasil');
		Session::flash('text', 'Anda Berhasil Merubah data ini');
		Session::flash('icon', 'success');

        return redirect(route('userPengguna'));
    }

    public function delete($id){
        $data = Query::DeleteRow('users', $id);
        return $data;
    }
}
