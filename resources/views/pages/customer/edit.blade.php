@extends('layouts.master')
@section('content')
	<section id="basic-horizontal-layouts">
		<div class="row">
			<div class="col-md-6 col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Suplier Form</h4>
					</div>
					<div class="card-body">
						<form class="form form-horizontal" method="get" enctype="multipart/form-data" action="{{ route('customerUpdate', $customer['id'])}}">
							<div class="row">
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="kode">Kode</label>
										</div>
										<div class="col-sm-9">
											<input type="text" autocomplete="off" id="kode" class="form-control" name="o[kode]" required="true" value="{{$customer['kode']}}" readonly="true" />
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="type">Tipe</label>
										</div>
										<div class="col-sm-9">
											<select type="text" autocomplete="off" id="type" class="form-select" name="o[customer_type_id]" required="true">
												<option value="">...</option>
												@foreach($type as $key => $value)
												<option value="{{$value->id}}" {{$customer['type_id'] == $value->id ? 'selected' : ''}}>{{$value['nama']}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="nama">Nama</label>
										</div>
										<div class="col-sm-9">
											<input type="text" autocomplete="off" id="nama" class="form-control" name="o[nama]" required="true" value="{{$customer['nama']}}"/>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="alamat">Alamat</label>
										</div>
										<div class="col-sm-9">
											<textarea id="alamat" class="form-control" name="o[alamat]" placeholder="...">{{$customer['alamat']}}</textarea>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="telepon">Telepon</label>
										</div>
										<div class="col-sm-9">
											<input type="text" autocomplete="off" id="telepon" class="form-control" name="o[telepon]" required="true" value="{{$customer['telepon']}}" />
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="info">Info</label>
										</div>
										<div class="col-sm-9">
											<textarea id="info" class="form-control" name="o[info]" placeholder="...">{{$customer['info']}}</textarea>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="sales_id">Tipe</label>
										</div>
										<div class="col-sm-9">
											<select type="text" autocomplete="off" id="sales_id" class="form-select" name="o[sales_id]" required="true">
												<option value="">...</option>
												@foreach($sales as $key => $value)
												<option value="{{$value->id}}" {{$customer['sales_id'] == $value->id ? 'selected' : ''}}>{{$value['nama']}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="limit_hutang">Limit Hutang</label>
										</div>
										<div class="col-sm-9">
											<input type="number" value="{{$customer['limit_hutang']}}" autocomplete="off" id="limit_hutang" class="form-control" name="o[limit_hutang]" required="true" placeholder="Rp.0"/>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
										@if($customer['foto'])
										<div class="avatar m-auto">
											<img src="{{ url('media/foto/thumbs_', $customer['foto'])}}" alt="Avatar" height="40" width="40">
										</div>
										@else
											<label class="col-form-label" for="foto">Foto</label>
										@endif
										</div>
										<div class="col-sm-9">
											<input class="form-control" type="file" id="foto" name="foto" />
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