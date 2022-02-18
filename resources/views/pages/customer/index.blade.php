@extends('layouts.master')
@section('content')
	<section id="basic-datatable">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<table class="datatables-basic table table-bordered" data-addlink="{{ route('customerNew')}}" data-label="CUSTOMER LIST">
						<thead>
							<tr>
								<th></th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Telepon</th>
								<th>Info</th>
								<th>Sales</th>
								<th>Tipe</th>
								<th>Limit Hutang</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($customer as $list)
								<tr>
									<td>
										<div class="avatar m-auto">
											<img src="{{ url('media/foto/thumbs_', $list['foto'])}}" alt="Avatar" height="40" width="40">
										</div>
									</td>
									<td>{{$list['nama']}}</td>
									<td>{{$list['alamat']}}</td>
									<td>{{$list['telepon']}}</td>
									<td>{{$list['info']}}</td>
									<td>{{$list['namasales']}}</td>
									<td>{{$list['type']}}</td>
									<td>Rp.{{number_format($list['limit_hutang'],0,',','.')}}</td>
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
												<a href="{{ route('customerDetail', $list['id'])}}" class="dropdown-item">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text me-50 font-small-4">
														<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
														<polyline points="14 2 14 8 20 8"></polyline>
														<line x1="16" y1="13" x2="8" y2="13"></line>
														<line x1="16" y1="17" x2="8" y2="17"></line>
														<polyline points="10 9 9 9 8 9"></polyline>
													</svg>Details</a>

												<a href="{{ route('customerDelete', $list['id'])}}" class="dropdown-item delete-record">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 me-50 font-small-4">
														<polyline points="3 6 5 6 21 6"></polyline>
														<path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
														<line x1="10" y1="11" x2="10" y2="17"></line>
														<line x1="14" y1="11" x2="14" y2="17"></line>
													</svg>Delete</a>
											</div>
										</div>
										<a href="{{route('customerEdit', $list['id'])}}" class="item-edit">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit font-small-4">
												<path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
												<path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
											</svg>
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
