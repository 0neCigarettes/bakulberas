@extends('layouts.master')
@section('content')
	<section id="basic-horizontal-layouts">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Detail Produk</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<table class="table table-striped table-condensed">
								<tbody>
									<tr>
										<td>Kode</td>
										<td>Nama</td>
										<td>Merk</td>
										<td>Varian</td>
										<td>Satuan</td>
										<td>Harga Beli</td>
										<td>Min. Stock</td>
										<td>Max. Stock</td>
										<td>Stock Actual</td>
									</tr>
									<tr>
										<td>{{$product['kode']}}</td>
										<td>{{$product['nama']}}</td>
										<td>{{$product['merk']}}</td>
										<td>{{$product['varian']}}</td>
										<td>{{$product['satuan']}}</td>
										<td>Rp.{{number_format($product['beli'],0,',','.')}}</td>
										<td>{{number_format($product['min'],0,',','.')}} {{$product['satuan']}}</td>
										<td>{{number_format($product['max'],0,',','.')}} {{$product['satuan']}}</td>
										<td>{{number_format($product['stock'],0,',','.')}} {{$product['satuan']}}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			
			<div class="col-12">
				<div class="card">
					<table class="datatables-basic-product table table-bordered" data-addlink="#" data-label="DETAIL HARGA PRODUK : <bold>{{$product['nama']}}</bold>">
						<thead>
							<tr>
								<th>Tipe Customer</th>
								<th>Harga</th>
								<th>Info</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($detail as $i)
								<tr>
									<td>{{$i->nama}}</td>
									<td>Rp.{{number_format($i->harga,0,',','.')}}</td>
									<td>{{$i->info}}</td>
									<td class="text-center">
										<a href="{{ route('deleteHarga', Crypt::encrypt($i->id))}}" class="item-delete">
											<i data-feather="trash-2"></i>
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-edit" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<form action="{{ route('addHarga')}}" method="POST">
						@csrf
						<div class="modal-header">
							<h5 class="modal-title" id="modalToggleLabel">Tambah Harga</h5>
							<button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="mb-1">
								<label class="col-form-label">ID Product</label>
								<input type="text" readonly required="true" name="o[product_id]" class="form-control" value="{{Crypt::decrypt(request()->route()->parameters['id'])}}"/>
							</div>
							<div class="mb-1">
								<label class="col-form-label">Tipe</label>
								<select name="o[type_id]" class="form-select" required="true" autocomplete="off">
									<option value="">...</option>
									@foreach($types as $t)
									<option value="{{$t['id']}}">{{$t['nama']}}</option>
									@endforeach
								</select>
							</div>
							<div class="mb-1">
								<label class="col-form-label">Harga</label>
								<input type="number" name="o[harga]" required="true" class="form-control" placeholder="Rp.0"/>
							</div>
							<div class="mb-1">
								<label class="col-form-label">Info</label>
								<textarea class="form-control" name="o[info]" placeholder="..."></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="reset" class="btn btn-secondary">Reset</button>
							<button class="btn btn-primary" type="submit">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
@endsection
@section('js')
	<script src="{{ url('app/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
	<script src="{{ url('app/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js')}}"></script>
	<script src="{{ url('app/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
	<script src="{{ url('app/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.min.js')}}"></script>
	<script src="{{ url('app/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
	<script src="{{ url('app/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
	<script src="{{ url('app/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')}}"></script>
	<script src="{{ url('app/app-assets/js/scripts/tables/table-datatables-basic.js')}}"></script>
<script>
		$(document).ready(function () {
		'use strict'

			var dt_basic_table = $('.datatables-basic-product'),
				dt_complex_header_table = $('.dt-complex-header')

			if ($('body').attr('data-framework') === 'laravel') {
				assetPath = $('body').attr('data-asset-path')
			}
		
			if (dt_basic_table.length) {
				var dt_basic = dt_basic_table.DataTable({
					order: [[0, 'desc']],
					dom:
						'<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
					displayLength: 10,
					lengthMenu: [10, 25, 50, 75, 100],
					buttons: [
						{
							text:
								feather.icons['plus'].toSvg({ class: 'me-50 font-small-4' }) +
								'Tambah Harga',
							className: 'create-new btn btn-primary',
							init: function (api, node, config) {
								$(node).removeClass('btn-secondary')
							},
					action: function (e, dt, node, config) {
						// window.location.href = dt_basic_table.data('addlink')
						$('#modal-edit').modal('show')
					}
						},
					],
					language: {
						paginate: {
							previous: '&nbsp;',
							next: '&nbsp;',
						},
					},
				})
				$('div.head-label').html('<h6 class="mb-0">'+dt_basic_table.data('label')+'</h6>')
			}
		})
	</script>
@endsection
