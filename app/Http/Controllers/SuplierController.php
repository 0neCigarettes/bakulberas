<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suplier;

class SuplierController extends Controller
{

    public function index()
    {
        $suplier = Suplier::all()->toArray();
        return view('pages.suplier.index')->with([
            'suplier' => $suplier
        ]);
    }

    public function new()
    {
        $this->data['kode'] = time();
        return view('pages.suplier.new')->with($this->data);
    }

    public function insert(Request $request)
    {
        $insert = Suplier::insert($request['o']);
        if ($insert) {
            return redirect()->route('suplierIndex');
        }
    }

    public function detail($id)
    {
        $suplier = Suplier::find($id);
        return view('pages.suplier.detail')->with([
            'suplier' => $suplier
        ]);
    }

    public function edit($id)
    {
        $suplier = Suplier::find($id);
        return view('pages.suplier.edit')->with([
            'suplier' => $suplier
        ]);
    }

    public function update(Request $request, $id)
    {
        $params = $request['o'] + ['updated_at' => now()];
        $update = Suplier::where('id', $id)->update($params);
        if ($update) {
            return redirect()->route('suplierIndex');
        }
    }

    public function delete($id)
    {
        $delete =  Suplier::where('id', $id)->delete();
        if ($delete) {
            return redirect()->route('suplierIndex');
        }
    }
}
