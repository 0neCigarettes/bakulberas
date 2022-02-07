@extends('layouts.master')
@section('content')
	<section id="basic-horizontal-layouts">
		<div class="row">
			<div class="col-md-6 col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Detail RO</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<table class="table table-striped table-borderless">
								<tbody>
									<tr>
										<td>KODE RO</td>
										<td>:</td>
										<td>{{$ro['kode']}}</td>
									</tr>
                  <tr>
                    <td>TANGGAL RO</td>
                    <td>:</td>
                    <td>{{$ro['tanggal']}}</td>
                  </tr>
                  <tr>
										<td>SUPLIER</td>
										<td>:</td>
										<td>{{$ro['nama']}}</td>
                  </tr>
                  <tr>
                    <td>JUMLAH RO</td>
										<td>:</td>
										<td>Rp. {{number_format($ro['jumlah'],0,',','.')}}</td>
									</tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
										<td>KODE PO</td>
										<td>:</td>
										<td>{{$ro['kodepo']}}</td>
									</tr>
                  <tr>
										<td>TANGGAL PO</td>
										<td>:</td>
										<td>{{$ro['tanggalpo']}}</td>
									</tr>
                  <tr>
										<td>JUMLAH PO</td>
										<td>:</td>
										<td>Rp. {{number_format($ro['jumlahpo'],0,',','.')}}</td>
									</tr>
                  <tr>
										<td>POTONGAN PO</td>
										<td>:</td>
										<td>Rp. {{number_format($ro['potongan'],0,',','.')}}</td>
									</tr>
                  <tr>
										<td>TOTAL PO</td>
										<td>:</td>
										<td>Rp. {{number_format($ro['total'],0,',','.')}}</td>
									</tr>
                  <tr>
										<td>CREATED</td>
										<td>:</td>
										<td>{{$ro['created_at']}}</td>
									</tr>
                  <tr>
										<td>UPDATED</td>
										<td>:</td>
										<td>{{$ro['updated_at']}}</td>
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
						<h4 class="card-title">Detail RO Produk</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<table class="table table-striped table-borderless">
								<thead>
									<tr>
										<th>PRODUK</th>
										<th>QTY</th>
										<th>HARGA</th>
										<th>TOTAL</th>
									</tr>
								</thead>
								<tbody>
									@foreach($roDetail as $item)
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
