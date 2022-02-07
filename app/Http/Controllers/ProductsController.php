<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class ProductsController extends Controller
{

  public function index()
  {
    $this->data['products'] = Products::join('varian', 'varian.id', '=', 'products.varian_id')
      ->join("merk", "merk.id", "=", "products.merk_id")
      ->join("satuan", "satuan.id", "=", "products.satuan_id")
      ->select(
        'products.kode',
        'products.id',
        'products.nama',
        'products.stock',
        'products.status',
        'products.max',
        'products.jual',
        'products.beli',
        'varian.varian',
        'merk.merk',
        'satuan.satuan'
      )->orderBy('merk.merk', 'asc')->get();
    return view('pages.products.index')->with($this->data);
  }

  public function new()
  {
    $model = new \App\Varian();
    $this->data['varians'] = $model->select('id', 'varian')->get();
    $model = new \App\Merk();
    $this->data['merks'] = $model->select('id', 'merk')->get();
    $model = new \App\Satuan();
    $this->data['satuans'] = $model->select('id', 'satuan')->get();
    $this->data['kode'] = time();
    return view('pages.products.new')->with($this->data);
  }

  public function insert(Request $request)
  {
    if (Products::insert($request['o'])) {
      return redirect()->route('productIndex');
    } else {
      return $this->new();
    }
  }

  public function edit($id)
  {
    $model = new \App\Varian();
    $this->data['varians'] = $model->select('id', 'varian')->get();
    $model = new \App\Merk();
    $this->data['merks'] = $model->select('id', 'merk')->get();
    $model = new \App\Satuan();
    $this->data['satuans'] = $model->select('id', 'satuan')->get();
    $this->data['product'] = Products::find($id);
    return view('pages.products.edit')->with($this->data);
  }

  public function update(Request $request, $id)
  {
    $data = $request['o'] + ['updated_at' => now()];
    if (Products::where('id', $id)->update($data)) {
      return redirect()->route('productIndex');
    } else {
      return $this->edit($id);
    }
  }

  public function detail($id)
  {
    $this->data['product'] = Products::join('varian', 'varian.id', '=', 'products.varian_id')
      ->join("merk", "merk.id", "=", "products.merk_id")
      ->join("satuan", "satuan.id", "=", "products.satuan_id")
      ->select(
        'products.kode',
        'products.created_at',
        'products.updated_at',
        'products.id',
        'products.nama',
        'products.stock',
        'products.status',
        'products.max',
        'products.jual',
        'products.beli',
        'varian.varian',
        'merk.merk',
        'satuan.satuan'
      )->where('products.id', $id)->first();
    return view('pages.products.detail')->with($this->data);
  }

  public function delete($id)
  {
    if (Products::destroy($id)) {
      return redirect()->back();
    }
  }
}
