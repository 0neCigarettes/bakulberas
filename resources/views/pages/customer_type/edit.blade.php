@extends('layouts.master')
@section('content')
	<section id="basic-horizontal-layouts">
		<div class="row">
			<div class="col-md-6 col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Customer Type Form</h4>
					</div>
					<div class="card-body">
						<form class="form form-horizontal" method="get" action="{{ route('customerTypeUpdate', $customerType->id)}}">
							<div class="row">
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="nama">Tipe</label>
										</div>
										<div class="col-sm-9">
											<input type="text" autocomplete="off" id="nama" class="form-control" name="o[nama]" value="{{$customerType->nama}}" required="true" placeholder="..."/>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="info">Info</label>
										</div>
										<div class="col-sm-9">
											<textarea id="info" class="form-control" name="o[info]" placeholder="...">{{$customerType->info}}</textarea>
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
