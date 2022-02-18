<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{

  public function index()
  {
    $this->data['customer'] = Customer::join('sales', 'sales.id', '=', 'customers.sales_id')
      ->join('customer_types', 'customer_types.id', '=', 'customers.customer_type_id')
      ->select(
        'customers.kode',
        'customers.id',
        'customers.nama',
        'customers.alamat',
        'customers.telepon',
        'customers.foto',
        'customers.info',
        'customers.limit_hutang',
        'sales.nama as namasales',
        'customer_types.nama as type'
      )->orderBy('sales.nama', 'asc')->get();
    return view('pages.customer.index')->with($this->data);
  }

  public function new()
  {
    $model = new \App\Sales();
    $this->data['sales'] = $model->select('id', 'nama')->get();
    $model = new \App\CustomerType();
    $this->data['type'] = $model->select('id', 'nama')->get();
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
      ->join('customer_types', 'customer_types.id', '=', 'customers.customer_type_id')
      ->select(
        'customers.kode',
        'customers.id',
        'customers.nama',
        'customers.alamat',
        'customers.telepon',
        'customers.foto',
        'customers.info',
        'customers.limit_hutang',
        'customers.created_at',
        'customers.updated_at',
        'sales.nama as namasales',
        'customer_types.nama as type'
      )->where('customers.id', $id)->first();
    return view('pages.customer.detail')->with($this->data);
  }

  public function edit($id)
  {
    $this->data['customer'] = Customer::join('sales', 'sales.id', '=', 'customers.sales_id')
      ->join('customer_types', 'customer_types.id', '=', 'customers.customer_type_id')
      ->select(
        'customers.kode',
        'customers.id',
        'customers.nama',
        'customers.alamat',
        'customers.telepon',
        'customers.foto',
        'customers.info',
        'customers.limit_hutang',
        'customers.created_at',
        'customers.updated_at',
        'sales.id as sales_id',
        'customer_types.id as type_id',
      )->where('customers.id', $id)->first();
    $model = new \App\Sales();
    $this->data['sales'] = $model->select('id', 'nama')->get();
    $model = new \App\CustomerType();
    $this->data['type'] = $model->select('id', 'nama')->get();
    return view('pages.customer.edit')->with($this->data);
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
