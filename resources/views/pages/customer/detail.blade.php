@extends('layouts.master')
@section('content')
	<section id="basic-horizontal-layouts">
		<div class="row">
			<div class="col-md-6 col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Detail Customers</h4>
					</div>
					<img src="{{ url('media/foto/thumbs_', $customer['foto'])}}">
					<div class="card-body">
						<div class="row">
							<table class="table table-striped table-borderless">
								<tbody>
									<tr>
										<td>KODE</td>
										<td>:</td>
										<td>{{$customer['kode']}}</td>
									</tr>
									<tr>
										<td>NAMA</td>
										<td>:</td>
										<td>{{$customer['nama']}}</td>
									</tr>
									<tr>
										<td>ALAMAT</td>
										<td>:</td>
										<td>{{$customer['alamat']}}</td>
									</tr>
									<tr>
										<td>TELEPON</td>
										<td>:</td>
										<td>{{$customer['telepon']}}</td>
									</tr>
									<tr>
										<td>INFO</td>
										<td>:</td>
										<td>{{$customer['info']}}</td>
									</tr>
									<tr>
										<td>SALES</td>
										<td>:</td>
										<td>{{$customer['namasales']}}</td>
									</tr>
									<tr>
										<td>TIPE</td>
										<td>:</td>
										<td>{{$customer['type']}}</td>
									</tr>
									<tr>
										<td>LIMIT HUTANG</td>
										<td>:</td>
										<td>Rp.{{number_format($customer['limit_hutang'],0,',','.')}}</td>
									</tr>
									<tr>
										<td>CREATED</td>
										<td>:</td>
										<td>{{$customer['created_at']}}</td>
									</tr>
									<tr>
										<td>UPDATED</td>
										<td>:</td>
										<td>{{$customer['updated_at']}}</td>
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
