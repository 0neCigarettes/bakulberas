@extends('layouts.master')
@section('content')
	<section id="basic-horizontal-layouts">
		<div class="row">
			<div class="col-md-6 col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Detail SO</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<table class="table table-striped table-borderless">
								<tbody>
									<tr>
										<td>KODE SO</td>
										<td>:</td>
										<td>{{$so['kode']}}</td>
									</tr>
									<tr>
										<td>CUSTOMER</td>
										<td>:</td>
										<td>{{$so['namacustomer']}}</td>
									</tr>
									<tr>
										<td>SALES</td>
										<td>:</td>
										<td>{{$so['namasales']}}</td>
									</tr>
									<tr>
										<td>JUMLAH SO</td>
										<td>:</td>
										<td>Rp. {{number_format($so['jumlah'],0,',','.')}}</td>
									</tr>
									<tr>
										<td>STATUS</td>
										<td>:</td>
										<td>{{$so['status']}}</td>
									</tr>
									<tr>
										<td>TANGGAL</td>
										<td>:</td>
										<td>{{$so['tanggal']}}</td>
									</tr>
									<tr>
										<td>CREATED</td>
										<td>:</td>
										<td>{{$so['created_at']}}</td>
									</tr>
									<tr>
										<td>UPDATED</td>
										<td>:</td>
										<td>{{$so['updated_at']}}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Detail SO Produk</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<table class="table table-striped table-borderless">
								<thead>
									<tr>
										<th>PRODUK</th>
										<th>QTY</th>
										<th>HARGA</th>
										<th>JUMLAH</th>
									</tr>
								</thead>
								<tbody>
                  @foreach($soDetail as $item)
										<tr>
                      <td>{{$item['nama']}}</td>
											<td>{{$item['qty']}}</td>
											<td>Rp.{{number_format($item['harga'],0,',','.')}}</td>
											<td>Rp.{{number_format($item['harga'] * $item['qty'],0,',','.')}}</td>
										</tr>
                  @endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
