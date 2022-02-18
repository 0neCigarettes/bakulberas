<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Crypt;
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
    $id = Crypt::decrypt($id);
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
    $id = Crypt::decrypt($id);
    $data = $request['o'] + ['updated_at' => now()];
    if (Products::where('id', $id)->update($data)) {
      return redirect()->route('productIndex');
    } else {
      return $this->edit($id);
    }
  }

  public function detail($id)
  {
    $id = Crypt::decrypt($id);
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

    $model = new \App\CustomerType();
    $this->data['types'] = $model->select('id', 'nama')->get()->toArray();
    $this->data['detail'] = Products::join('harga_product', 'harga_product.product_id', '=', 'products.id')
      ->join('customer_types as type', 'type.id', '=', 'harga_product.type_id')
      ->select(
        'harga_product.id',
        'harga_product.harga',
        'type.nama',
        'harga_product.info'
      )->where('products.id', $id)->get();
    // return $this->data['detail'];
    return view('pages.products.detail')->with($this->data);
  }

  public function delete($id)
  {
    $id = Crypt::decrypt($id);
    if (Products::destroy($id)) {
      return redirect()->back();
    }
  }

  public function addHarga(Request $request)
  {
    $model = new \App\HargaProduct();
    if ($model->where('type_id', $request['o']['type_id'])->exists()) {
      if ($model->where('type_id', $request['o']['type_id'])->update($request['o'])) {
        return redirect()->back();
      } else {
        return redirect()->back();
      }
    } else {
      if ($model->insert($request['o'])) {
        return redirect()->back();
      } else {
        return redirect()->back();
      }
    }
  }

  public function deleteHarga($id)
  {
    $id = Crypt::decrypt($id);
    $model = new \App\HargaProduct();
    if ($model->where('id', $id)->delete()) {
      return redirect()->back();
    } else {
      return redirect()->back();
    }
  }

  public function getHarga($product_id, $type_id)
  {
    $model = new \App\HargaProduct();
    $this->data['harga'] = $model->where('product_id', $product_id)
      ->where('type_id', $type_id)->select('harga')->first();
    return response()->json($this->data['harga']);
  }
}
