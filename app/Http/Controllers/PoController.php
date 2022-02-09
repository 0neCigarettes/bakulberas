<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Po;
use App\PoDetail;
use App\PoBayar;
use App\Suplier;
use App\Products;

class PoController extends Controller
{
  public function index()
  {
    $this->data['pos'] = Po::join('supliers', 'supliers.id', '=', 'po.suplier_id')
      ->select(
        'po.id',
        'po.kode',
        'po.tanggal',
        'supliers.nama',
        'po.jumlah',
        'po.potongan',
        'po.total',
        'po.status'
      )->get();
    return view('pages.po.index')->with($this->data);
  }

  public function new()
  {
    $this->data['supliers'] = Suplier::Select('id', 'nama')->get();
    $this->data['products'] = Products::Select('id', 'nama', 'beli')->get();
    $this->data['time'] = time();
    return view('pages.po.new')->with($this->data);
  }

  public function insert(Request $request)
  {
    $po = $request['o'];
    if (is_null($po['potongan'])) {
      $po['potongan'] = 0;
    }
    if ($po = Po::create($po)) {
      foreach ($request['items'] as $d) {
        $payload = [
          'po_id' => $po->id,
          'product_id' => $d['product_id'],
          'qty' => $d['qty'],
          'harga' => $d['harga']
        ];
        PoDetail::create($payload);
      }
      return redirect()->route('poIndex');
    } else {
      return $this->new();
    }
  }

  public function edit($id)
  {
    $this->data['po'] = Po::join('supliers', 'supliers.id', '=', 'po.suplier_id')
      ->select(
        'po.id',
        'po.kode',
        'po.tanggal',
        'po.suplier_id',
        'po.jumlah',
        'po.potongan',
        'po.total',
        'po.info',
        'supliers.nama'
      )->where('po.id', $id)->first()->toArray();
    $this->data['supliers'] = Suplier::Select('id', 'nama')->get();
    $this->data['products'] = Products::Select('id', 'nama', 'jual')->get();
    $this->data['time'] = $this->data['po']['kode'];
    $this->data['poDetail'] = PoDetail::join('products', 'products.id', '=', 'po_detail.product_id')
      ->select(
        'po_detail.id',
        'po_detail.po_id',
        'po_detail.product_id',
        'po_detail.qty',
        'po_detail.harga',
        'products.nama'
      )->where('po_detail.po_id', $id)->get()->toArray();
    // return $this->data;
    return view('pages.po.edit')->with($this->data);
  }

  public function update(Request $request, $id)
  {
    $po = $request['o'];
    if (is_null($po['potongan'])) {
      $po['potongan'] = 0;
    }
    $po['updated_at'] = now();
    if ($po = Po::find($id)->update($po)) {
      foreach ($request['items'] as $d) {
        $payload = [
          'po_id' => $id,
          'product_id' => $d['product_id'],
          'qty' => $d['qty'],
          'harga' => $d['harga'],
          'updated_at' => now()
        ];
        if (is_null($d['id'])) {
          PoDetail::create($payload);
        } else {
          PoDetail::find($d['id'])->update($payload);
        }
      }
      return redirect()->route('poIndex');
    } else {
      return $this->edit($id);
    }
  }

  public function detail($id)
  {
    $this->data['po'] = Po::join('supliers', 'supliers.id', '=', 'po.suplier_id')
      ->select(
        'po.id',
        'po.kode',
        'po.tanggal',
        'po.suplier_id',
        'po.jumlah',
        'po.potongan',
        'po.total',
        'po.info',
        'po.bayar',
        'po.status',
        'po.created_at',
        'po.updated_at',
        'supliers.nama'
      )->where('po.id', $id)->first()->toArray();
    $this->data['poDetail'] = PoDetail::join('products', 'products.id', '=', 'po_detail.product_id')
      ->select(
        'po_detail.id',
        'po_detail.po_id',
        'po_detail.product_id',
        'po_detail.qty',
        'po_detail.harga',
        'products.nama'
      )->where('po_detail.po_id', $id)->get()->toArray();
    return view('pages.po.detail')->with($this->data);
  }

  public function delete($id)
  {
    if (Po::find($id)->delete()) {
      return redirect()->route('poIndex');
    } else {
      return redirect()->route('poIndex');
    }
  }

  public function bayar($id)
  {
    $this->data['payments'] = PoBayar::where('id', $id)->get();
    $this->data['po'] = Po::where('id', $id)->first();
    $this->data['sudah_bayar'] = PoBayar::where('id', $id)->get()->sum('jumlah');
    return view('pages.po.bayar.index')->with($this->data);
  }
}
