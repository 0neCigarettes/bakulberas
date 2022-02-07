@extends('layouts.master')
@section('content')
	<section id="basic-horizontal-layouts">
		<div class="row">
			<div class="col-md-6 col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Detail Role</h4>
					</div>
					<div class="card-body">
						<div class="row">
							<table class="table table-striped table-borderless">
								<tbody>
									<tr>
										<td>Role</td>
										<td>:</td>
										<td>{{$roles['role']}}</td>
									</tr>
									<tr>
										<td>Info</td>
										<td>:</td>
										<td>{{$roles['info']}}</td>
									</tr>
									<tr>
										<td>Created at</td>
										<td>:</td>
										<td>{{$roles['created_at']}}</td>
									</tr>
									<tr>
										<td>Updated at</td>
										<td>:</td>
										<td>{{$roles['updated_at']}}</td>
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
