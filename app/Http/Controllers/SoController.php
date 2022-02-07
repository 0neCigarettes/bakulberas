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
        'customers.nama',
        'sales.nama',
        'so.jumlah',
        'so.status'
      )->get();
    return view('pages.so.index')->with($this->data);
  }

  public function new()
  {
    $this->data['customer'] = Customer::Select('id', 'nama')->get();
    $this->data['sales'] = Sales::Select('id', 'nama')->get();
    $this->data['products'] = Products::Select('id', 'nama', 'jual')->get();
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
      return $this->new();
    }
  }

  public function edit($id)
  {
    $this->data['so'] = So::join('customers', 'customers.id', '=', 'so.customer_id')
    ->join('sales', 'sales.id', '=', 'so.seller_id')
      ->select(
        'so.id',
        'so.kode',
        'so.tanggal',
        'so.customer_id',
        'so.jumlah',
        'so.potongan',
        'so.total',
        'so.info',
        'customers.nama',
        'sales.nama'
      )->where('so.id', $id)->first()->toArray();
    $this->data['customers'] = Customers::Select('id', 'nama')->get();
    $this->data['sales'] = Sales::Select('id', 'nama')->get();
    $this->data['products'] = Products::Select('id', 'nama', 'jual')->get();
    $this->data['time'] = $this->data['so']['kode'];
    $this->data['soDetail'] = SoDetail::join('products', 'products.id', '=', 'so_detail.product_id')
      ->select(
        'so_detail.id',
        'so_detail.so_id',
        'so_detail.product_id',
        'so_detail.qty',
        'so_detail.harga',
        'products.nama'
      )->where('so_detail.so_id', $id)->get()->toArray();
    // return $this->data;
    return view('pages.so.edit')->with($this->data);
  }

  public function update(Request $request, $id)
  {
    $so = $request['o'];
    if (is_null($so['potongan'])) {
      $so['potongan'] = 0;
    }
    $so['updated_at'] = now();
    if ($so = So::find($id)->update($so)) {
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

  public function detail($id) {
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
