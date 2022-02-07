<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sales;

class SalesController extends Controller
{

    public function index()
    {
        $sales = Sales::all()->toArray();
        return view('pages.sales.index')->with([
            'sales' => $sales
        ]);
    }

    public function new()
    {
        $this->data['kode'] = time();
        return view('pages.sales.new')->with($this->data);
    }

    public function insert(Request $request)
    {
        $insert = Sales::insert($request['o']);
        if ($insert) {
            return redirect()->route('salesIndex');
        }
    }

    public function detail($id)
    {
        $sales = Sales::find($id);
        return view('pages.sales.detail')->with([
            'sales' => $sales
        ]);
    }

    public function edit($id)
    {
        $sales = Sales::find($id);
        return view('pages.sales.edit')->with([
            'sales' => $sales
        ]);
    }

    public function update(Request $request, $id)
    {
        $params = $request['o'] + ['updated_at' => now()];
        $update = Sales::where('id', $id)->update($params);
        if ($update) {
            return redirect()->route('salesIndex');
        }
    }

    public function delete($id)
    {
        $delete =  Sales::where('id', $id)->delete();
        if ($delete) {
            return redirect()->route('salesIndex');
        }
    }
}
