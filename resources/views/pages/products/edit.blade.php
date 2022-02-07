@extends('layouts.master')
@section('content')
	<section id="basic-horizontal-layouts">
		<div class="row">
			<div class="col-md-6 col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Produk Form</h4>
					</div>
					<div class="card-body">
						<form class="form form-horizontal" method="get" action="{{ route('productUpdate', $product['id'])}}">
						<input type="hidden" nama="o[id]" value="{{$product['id']}}" />
							<div class="row">
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="kode">Kode</label>
										</div>
										<div class="col-sm-9">
											<input type="text" id="kode" class="form-control" name="o[kode]" readonly="true" value="{{$product['kode']}}"/>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="nama">Nama</label>
										</div>
										<div class="col-sm-9">
											<input type="text" id="nama" class="form-control" name="o[nama]" value="{{$product['nama']}}"/>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="merk">Merk</label>
										</div>
										<div class="col-sm-9">
											<select id="merk" name="o[merk_id]" class="form-select" required="true">
												<option value="">Pilih merk</option>
												@foreach($merks as $m)
													@if($product['merk_id'] == $m['id'])
														<option value="{{$m['id']}}" selected>{{$m['merk']}}</option>
													@else
														<option value="{{$m['id']}}">{{$m['merk']}}</option>
													@endif
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="varian">Varian</label>
										</div>
										<div class="col-sm-9">
											<select id="varian" name="o[varian_id]" class="form-select" required="true">
												<option value="">Pilih varian</option>
												@foreach($varians as $v)
													@if($product['varian_id'] == $v['id'])
														<option value="{{$v['id']}}" selected>{{$v['varian']}}</option>
													@else
														<option value="{{$v['id']}}">{{$v['varian']}}</option>
													@endif
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="satuan">Satuan</label>
										</div>
										<div class="col-sm-9">
											<select id="satuan" name="o[satuan_id]" class="form-select" required="true">
												<option value="">Pilih satuan</option>
												@foreach($satuans as $s)
													@if($product['satuan_id'] == $s['id'])
														<option value="{{$s['id']}}" selected>{{$s['satuan']}}</option>
													@else
														<option value="{{$s['id']}}">{{$s['satuan']}}</option>
													@endif
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="jual">Harga Jual</label>
										</div>
										<div class="col-sm-9">
											<input type="number" id="jual" class="form-control" name="o[jual]" value="{{$product['jual']}}"/>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="beli">Harga Beli</label>
										</div>
										<div class="col-sm-9">
											<input type="number" id="beli" class="form-control" name="o[beli]" value="{{$product['beli']}}"/>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="stock">Stok Aktual</label>
										</div>
										<div class="col-sm-9">
											<input type="number" id="stock" class="form-control" name="o[stock]" value="{{$product['stock']}}"/>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="min">Min. Stock</label>
										</div>
										<div class="col-sm-9">
											<input type="number" id="min" class="form-control" name="o[min]" value="{{$product['min']}}"/>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="max">Max. Stock</label>
										</div>
										<div class="col-sm-9">
											<input type="number" id="max" class="form-control" name="o[max]" value="{{$product['max']}}"/>
										</div>
									</div>
								</div>
								<div class="col-sm-9 offset-sm-3">
									<button type="submit" class="btn btn-primary me-1">Submit</button>
									<button type="reset" class="btn btn-outline-secondary">Reset</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
