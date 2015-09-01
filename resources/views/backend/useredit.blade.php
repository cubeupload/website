@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/users/edit', $user) !!}
@stop

@section('content')
				<form id="userDetailForm" class="form-horizontal" action="{{ url('/admin/users/edit/' . $user->id) }}" method="POST">
					<div class="panel panel-default">
						<div class="panel-heading">
							User Details
							<div class="btn-group btn-group-xs pull-right">
								<button type="submit" class="btn btn-primary">Save</button>
								<a href="{{ url('/admin/users/show/' . $user->id) }}" class="btn btn-default">Cancel</a>
							</div>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label for="id" class="col-md-2 control-label">User ID</label>
								<div class="col-md-4">
									<p class="form-control" id="id" name="id">{{ $user->id or ''}}</p>
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-md-2 control-label">Name</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="name" name="name" value="{{ $user->name or ''}}">
								</div>
							</div>
							<div class="form-group">
								<label for="username" class="col-md-2 control-label">Username</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="username" name="username" value="{{ $user->username or '' }}">
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-md-2 control-label">Email Address</label>
								<div class="col-md-8">
									<input type="email" class="form-control" id="email" name="email" value="{{ $user->email or '' }}">
								</div>
							</div>
							<div class="form-group">
								<label for="password" class="col-md-2 control-label">Password</label>
								<div class="col-md-8">
									<input type="password" class="form-control" id="password" name="password">
								</div>
							</div>
							<div class="form-group">
								<label for="passwordConfirm" class="col-md-2 control-label">Password (Confirm)</label>
								<div class="col-md-8">
									<input type="password" class="form-control" id="password_confirm" name="password_confirm">
								</div>
							</div>
						</div>
					</div>
				</form>
@stop
