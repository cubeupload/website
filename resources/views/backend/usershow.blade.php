@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/users/show', $user) !!}
@stop

@section('content')
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							User Details
							<a href="{{ url('/admin/users/edit/' . $user->id )}}" class="btn btn-default btn-xs pull-right">Edit</a>
						</div>
						<div class="panel-body">
							<div class="form-horizontal">
								<div class="form-group">
									<label for="id" class="col-md-3 control-label">User ID</label>
									<div class="col-md-9">
										<p class="form-control-static">{{ $user->id or ''}}</p>
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-md-3 control-label">Name</label>
									<div class="col-md-9">
										<p class="form-control-static">{{ $user->name or ''}}</p>
									</div>
								</div>
								<div class="form-group">
									<label for="username" class="col-md-3 control-label">Username</label>
									<div class="col-md-9">
										<p class="form-control-static">{{ $user->username or '' }}</p>
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="col-md-3 control-label">Email Address</label>
									<div class="col-md-9">
										<p class="form-control-static">{{ $user->email or '' }}</p>
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="col-md-3 control-label">Registered</label>
									<div class="col-md-9">
										<p class="form-control-static">{{ $user->created_at or '' }}</p>
									</div>
								</div>
								<div class="form-group">
									<label for="email" class="col-md-3 control-label">Last Active</label>
									<div class="col-md-9">
										<p class="form-control-static">{{ $user->updated_at or '' }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							Latest Images
							<a href="{{ url('/admin/images/user/' . $user->id )}}" class="btn btn-default btn-xs pull-right">More</a>
						</div>
						<div class="panel-body">
							@foreach( $images as $image )
							<div class="col-md-4">
								<a class="thumbnail" href="#">
									<img src="{{ $image->getPublicUrl() }}">
								</a>
							</div>
							@endforeach
						</div>
				</div>
@stop