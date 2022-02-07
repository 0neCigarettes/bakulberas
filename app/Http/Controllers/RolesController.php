<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;

class RolesController extends Controller
{

    public function index()
    {
        $roles = Roles::all()->toArray();
        return view('pages.roles.index')->with([
            'roles' => $roles
        ]);
    }

    public function new()
    {
        $this->data['kode'] = time();
        return view('pages.roles.new')->with($this->data);
    }

    public function insert(Request $request)
    {
        $insert = Roles::insert($request['o']);
        if ($insert) {
            return redirect()->route('rolesIndex');
        }
    }

    public function detail($id)
    {
        $roles = Roles::find($id);
        return view('pages.roles.detail')->with([
            'roles' => $roles
        ]);
    }

    public function edit($id)
    {
        $roles = Roles::find($id);
        return view('pages.roles.edit')->with([
            'roles' => $roles
        ]);
    }

    public function update(Request $request, $id)
    {
        $params = $request['o'] + ['updated_at' => now()];
        $update = Roles::where('id', $id)->update($params);
        if ($update) {
            return redirect()->route('rolesIndex');
        }
    }

    public function delete($id)
    {
        $delete = Roles::where('id', $id)->delete();
        if ($delete) {
            return redirect()->route('rolesIndex');
        }
    }
}
