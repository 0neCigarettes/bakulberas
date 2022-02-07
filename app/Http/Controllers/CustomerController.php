<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{

    public function index()
    {
        $this->data['customer'] = Customer::join('sales', 'sales.id', '=', 'customers.sales_id')
        ->select(
            'customers.kode',
            'customers.id',
            'customers.nama',
            'customers.alamat',
            'customers.telepon',
            'customers.foto',
            'customers.info',
            'sales.nama as namasales'
        )->orderBy('sales.nama', 'asc')->get();
        return view('pages.customer.index')->with($this->data);
    }

    public function new()
    {
        $model = new \App\Sales();
        $this->data['sales'] = $model->select('id', 'nama')->get();
        $this->data['kode'] = time();
        return view('pages.customer.new')->with($this->data);
    }

    public function insert(Request $request)
    {
        $insert = Customer::insert($request['o']);
        if ($insert) {
            return redirect()->route('customerIndex');
        }
    }

    public function detail($id)
    {
        $this->data['customer'] = Customer::join('sales', 'sales.id', '=', 'customers.sales_id')
        ->select(
            'customers.kode',
            'customers.id',
            'customers.nama',
            'customers.alamat',
            'customers.telepon',
            'customers.foto',
            'customers.info',
            'customers.created_at',
            'customers.updated_at',
            'sales.nama as namasales'
        )->where('customers.id', $id)->first();
        return view('pages.customer.detail')->with($this->data);
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('pages.customer.edit')->with([
            'customer' => $customer
        ]);
    }

    public function update(Request $request, $id)
    {
        $params = $request['o'] + ['updated_at' => now()];
        $update = Customer::where('id', $id)->update($params);
        if ($update) {
            return redirect()->route('customerIndex');
        }
    }

    public function delete($id)
    {
        $delete =  Customer::where('id', $id)->delete();
        if ($delete) {
            return redirect()->route('customerIndex');
        }
    }
}
