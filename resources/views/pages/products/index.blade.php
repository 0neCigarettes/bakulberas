@extends('layouts.master')
@section('content')
	<section id="basic-datatable">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<table class="datatables-basic table table-bordered" data-addlink="{{ route('productNew')}}" data-label="PRODUK LIST">
						<thead>
							<tr>
								<th>Kode</th>
								<th>Produk</th>
								<th>merk</th>
								<th>Varian</th>
								<th>Harga Beli</th>
								<th>Stock</th>
								<th>Satuan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $list)
								<tr>
									<td class="text-center">
										{{$list['kode']}}
									</td>
									<td>{{$list['nama']}}</td>
									<td>{{$list['merk']}}</td>
									<td class="text-end">{{$list['varian']}}</td>
									<td class="text-end">Rp.{{number_format($list['beli'],0,',','.')}}</td>
									<td class="text-end">{{$list['stock']}}</td>
									<td>{{$list['satuan']}}</td>
									<td class="text-center">
										<div class="d-inline-flex">
											<a class="pe-1 dropdown-toggle hide-arrow text-primary" data-bs-toggle="dropdown">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical font-small-4">
													<circle cx="12" cy="12" r="1"></circle>
													<circle cx="12" cy="5" r="1"></circle>
													<circle cx="12" cy="19" r="1"></circle>
												</svg>
											</a>
											<div class="dropdown-menu dropdown-menu-end">
												<a href="{{ route('productDetail', Crypt::encrypt($list['id']))}}" class="dropdown-item">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text me-50 font-small-4">
														<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
														<polyline points="14 2 14 8 20 8"></polyline>
														<line x1="16" y1="13" x2="8" y2="13"></line>
														<line x1="16" y1="17" x2="8" y2="17"></line>
														<polyline points="10 9 9 9 8 9"></polyline>
													</svg>Details</a>

												<a href="{{ route('productDelete', Crypt::encrypt($list['id']))}}" class="dropdown-item delete-record">
													<i data-feather="trash-2"></i>
													Delete
												</a>
											</div>
										</div>
										<a href="{{route('productEdit', Crypt::encrypt($list['id']))}}" class="item-edit">
											<i data-feather="edit"></i>
										</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
				</div>
			</div>
		</div>
	</section>
	<div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalToggleLabel">Modal 1</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">Show a second modal and hide this one with the button below.</div>
				<div class="modal-footer">
					<button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">
						Open second modal
					</button>
				</div>
			</div>
		</div>
	</div>
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
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('app/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
@endsection
