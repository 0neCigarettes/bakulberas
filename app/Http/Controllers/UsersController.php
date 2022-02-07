<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;
use App\Roles;

class UsersController extends Controller
{

    public function index()
    {
        $this->data['users'] = Users::join('roles', 'roles.id', '=', 'users.role_id')
        ->select(
            'users.username',
            'users.id',
            'users.realname',
            'users.avatar',
            'users.info',
            'roles.role as namarole'
        )->orderBy('roles.role', 'asc')->get();
        return view('pages.users.index')->with($this->data);
    }

    public function new()
    {
        $this->data['roles'] = Roles::Select('id', 'role')->get();
        $this->data['kode'] = time();
        return view('pages.users.new')->with($this->data);
    }

    public function insert(Request $request)
    {
        $insert = Users::insert($request['o']);
        if ($insert) {
            return redirect()->route('usersIndex');
        }
    }

    public function detail($id)
    {
        $users = Users::find($id);
        return view('pages.users.detail')->with([
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        $users = Users::find($id);
        return view('pages.users.edit')->with([
            'users' => $users
        ]);
    }

    public function update(Request $request, $id)
    {
        $params = $request['o'] + ['updated_at' => now()];
        $update = Users::where('id', $id)->update($params);
        if ($update) {
            return redirect()->route('usersIndex');
        }
    }

    public function delete($id)
    {
        $delete =  Users::where('id', $id)->delete();
        if ($delete) {
            return redirect()->route('usersIndex');
        }
    }
}
