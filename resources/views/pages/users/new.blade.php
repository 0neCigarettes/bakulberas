@extends('layouts.master')
@section('content')

	<section id="basic-horizontal-layouts">
		<div class="row">
			<div class="col-md-6 col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">User Form</h4>
					</div>
					<div class="card-body">
						<form class="form form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('usersInsert')}}">
							@csrf
							<div class="row">
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="username">username</label>
										</div>
										<div class="col-sm-9">
											<input type="text" autocomplete="off" id="username" class="form-control" name="o[username]" required="true" placeholder="..." />
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="realname">Realname</label>
										</div>
										<div class="col-sm-9">
											<input type="text" autocomplete="off" id="realname" class="form-control" name="o[realname]" required="true" placeholder="..."/>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="password">Password</label>
										</div>
										<div class="col-sm-9">
											<input type="text" autocomplete="off" id="password" class="form-control" name="o[password]" required="true" placeholder="..."/>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="role">Role</label>
										</div>
										<div class="col-sm-9">
											<select id="role" name="o[role_id]" class="form-select" required="true">
												<option value="">Pilih role</option>
													@foreach($roles as $u)
														<option value="{{$u['id']}}">{{$u['role']}}</option>
													@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="info">Info</label>
										</div>
										<div class="col-sm-9">
											<textarea id="info" class="form-control" name="o[info]" placeholder="..."></textarea>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="mb-1 row">
										<div class="col-sm-3">
											<label class="col-form-label" for="foto">Foto</label>
										</div>
										<div class="col-sm-9">
											<input class="form-control" type="file" id="foto" name="foto" />
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
