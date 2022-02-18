<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\So;
use App\SoDetail;
use App\Customer;
use App\Sales;
use App\Products;

class SoController extends Controller
{
  public function index()
  {
    $this->data['sos'] = So::join('customers', 'customers.id', '=', 'so.customer_id')
      ->join('sales', 'sales.id', '=', 'so.seller_id')
      ->select(
        'so.id',
        'so.kode',
        'so.tanggal',
        'customers.nama as customer',
        'sales.nama as sales',
        'so.jumlah',
        'so.status'
      )->get();
    return view('pages.so.index')->with($this->data);
  }

  public function new()
  {
    $this->data['customers'] = Customer::Select('id', 'nama', 'customer_type_id as type_id', 'limit_hutang')->get();
    $this->data['sales'] = Sales::Select('id', 'nama')->get();
    $this->data['products'] = Products::Select('id', 'nama')->get();
    $this->data['time'] = time();
    return view('pages.so.new')->with($this->data);
  }

  public function insert(Request $request)
  {
    $so = $request['o'];
    if ($so = So::create($so)) {
      foreach ($request['items'] as $d) {
        $payload = [
          'so_id' => $so->id,
          'product_id' => $d['product_id'],
          'qty' => $d['qty'],
          'harga' => $d['harga']
        ];
        SoDetail::create($payload);
      }
      return redirect()->route('soIndex');
    } else {
      return redirect()->route('soNew');
    }
  }

  public function edit($id)
  {
    $this->data['so'] = So::join('customers', 'customers.id', '=', 'so.customer_id')
      ->join('sales', 'sales.id', '=', 'so.seller_id')
      ->select('so.*')->where('so.id', $id)->first();
    $this->data['customers'] = Customer::Select('id', 'nama', 'customer_type_id as type_id', 'limit_hutang')->get();
    $this->data['customer'] = Customer::Select('id', 'nama', 'customer_type_id as type_id', 'limit_hutang')
      ->Where('id', $this->data['so']->customer_id)->first();
    $this->data['sales'] = Sales::Select('id', 'nama')->get();
    $this->data['seller'] = Sales::Select('id', 'nama')
      ->Where('id', $this->data['so']->seller_id)->first();
    $this->data['products'] = Products::Select('id', 'nama')->get();
    $this->data['time'] = $this->data['so']['kode'];
    $this->data['soDetail'] = SoDetail::join('products', 'products.id', '=', 'so_detail.product_id')
      ->select(
        'so_detail.id',
        'so_detail.so_id',
        'so_detail.product_id',
        'so_detail.qty',
        'so_detail.harga',
        'products.nama'
      )->where('so_detail.so_id', $id)->get();
    return view('pages.so.edit')->with($this->data);
  }

  public function update(Request $request, $id)
  {
    $so = $request['o'] + ['updated_at' => now()];
    if ($so = So::Where('id', $id)->update($so)) {
      foreach ($request['items'] as $d) {
        $payload = [
          'so_id' => $id,
          'product_id' => $d['product_id'],
          'qty' => $d['qty'],
          'harga' => $d['harga'],
          'updated_at' => now()
        ];
        if (is_null($d['id'])) {
          SoDetail::create($payload);
        } else {
          SoDetail::find($d['id'])->update($payload);
        }
      }
      return redirect()->route('soIndex');
    } else {
      return $this->edit($id);
    }
  }

  public function detail($id)
  {
    $this->data['so'] = So::join('customers', 'customers.id', '=', 'so.customer_id')
      ->join('sales', 'sales.id', '=', 'so.seller_id')
      ->select(
        'so.id',
        'so.kode',
        'so.tanggal',
        'so.jumlah',
        'so.status',
        'so.created_at',
        'so.updated_at',
        'customers.nama as namacustomer',
        'sales.nama as namasales'
      )->where('so.id', $id)->first()->toArray();
    $this->data['soDetail'] = SoDetail::join('products', 'products.id', '=', 'so_detail.product_id')
      ->select(
        'so_detail.id',
        'so_detail.so_id',
        'so_detail.product_id',
        'so_detail.qty',
        'so_detail.harga',
        'products.nama'
      )->where('so_detail.so_id', $id)->get()->toArray();
    return view('pages.so.detail')->with($this->data);
  }
}
