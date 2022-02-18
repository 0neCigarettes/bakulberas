<?php

namespace App\Http\Controllers;

use App\CustomerType;
use Illuminate\Http\Request;

class CustomerTypeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $this->data['customerTypes'] = CustomerType::all();
    return view('pages.customer_type.index')->with($this->data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pages.customer_type.new');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $model = new \App\CustomerType;
    if ($model->create($request['o'])) {
      return redirect()->route('customerTypeIndex');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $model = new \App\CustomerType;
    $this->data['customerType'] = $model->find($id);
    return view('pages.customer_type.show')->with($this->data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $model = new \App\CustomerType;
    $this->data['customerType'] = $model->find($id);
    return view('pages.customer_type.edit')->with($this->data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $model = new \App\CustomerType;
    $payload = $request['o'];
    $payload['updated_at'] = now();
    // return $payload;
    if ($model->find($id)->update($payload)) {
      return redirect()->route('customerTypeIndex');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $model = new \App\CustomerType;
    if ($model->exists($id)) {
      $model->find($id)->delete();
      return redirect()->route('customerTypeIndex');
    }
  }
}
