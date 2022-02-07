@extends('layouts.master')
@section('content')
	<section id="basic-horizontal-layouts">
		<div class="row">
			<div class="col-md-6 col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Sales Form</h4>
					</div>
					<div class="card-body">
						<form class="form form-horizontal" method="get" enctype="multipart/form-data" action="{{ route('salesUpdate', $sales['id'])}}">
							<input type="hidden" nama="o[id]" value="{{$sales['id']}}" />
							<div class="row">
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="kode">Kode</label>
										</div>
										<div class="col-sm-9">
											<input type="text" autocomplete="off" id="kode" class="form-control" name="o[kode]" required="true" value="{{$sales['kode']}}" readonly="true" />
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="nama">Nama</label>
										</div>
										<div class="col-sm-9">
											<input type="text" autocomplete="off" id="nama" class="form-control" name="o[nama]" required="true" value="{{$sales['nama']}}"/>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="alamat">Alamat</label>
										</div>
										<div class="col-sm-9">
											<textarea id="alamat" class="form-control" name="o[alamat]" placeholder="...">{{$sales['alamat']}}</textarea>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="telepon">Telepon</label>
										</div>
										<div class="col-sm-9">
											<input type="text" autocomplete="off" id="telepon" class="form-control" name="o[telepon]" required="true" value="{{$sales['telepon']}}" />
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="info">Info</label>
										</div>
										<div class="col-sm-9">
											<textarea id="info" class="form-control" name="o[info]" placeholder="...">{{$sales['info']}}</textarea>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
										@if($sales['foto'])
										<div class="avatar m-auto">
											<img src="{{ url('media/foto/thumbs_', $sales['foto'])}}" alt="Avatar" height="40" width="40">
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
