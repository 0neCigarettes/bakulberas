@extends('layouts.master')
@section('content')
	<section id="basic-horizontal-layouts">
		<div class="row">
			<div class="col-md-6 col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Detail Sales</h4>
					</div>
					<img src="{{ url('media/foto/thumbs_', $sales['foto'])}}">
					<div class="card-body">
						<div class="row">
							<table class="table table-striped table-borderless">
								<tbody>
									<tr>
										<td>KODE</td>
										<td>:</td>
										<td>{{$sales['kode']}}</td>
									</tr>
									<tr>
										<td>NAMA</td>
										<td>:</td>
										<td>{{$sales['nama']}}</td>
									</tr>
									<tr>
										<td>ALAMAT</td>
										<td>:</td>
										<td>{{$sales['alamat']}}</td>
									</tr>
									<tr>
										<td>TELEPON</td>
										<td>:</td>
										<td>{{$sales['telepon']}}</td>
									</tr>
									<tr>
										<td>INFO</td>
										<td>:</td>
										<td>{{$sales['info']}}</td>
									</tr>
									<tr>
										<td>CREATED</td>
										<td>:</td>
										<td>{{$sales['created_at']}}</td>
									</tr>
									<tr>
										<td>UPDATED</td>
										<td>:</td>
										<td>{{$sales['updated_at']}}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
