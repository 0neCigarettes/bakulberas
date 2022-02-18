@extends('layouts.master')
@section('content')
	<section id="basic-datatable">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<table class="datatables-basic table table-bordered" data-addlink="{{ route('customerTypeCreate')}}" data-label="CUSTOMER LIST">
						<thead>
							<tr>
								<th>Nama</th>
								<th>info</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($customerTypes as $list)
								<tr>
									<td>{{$list->nama}}</td>
									<td>{{$list->info}}</td>
									<td class="text-center">
										<a href="{{ route('customerTypeDelete', $list->id)}}" class="item-delete">
											<i data-feather="trash-2"></i>
										</a>
										<a href="{{ route('customerTypeEdit', $list->id)}}" class="item-edit">
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
