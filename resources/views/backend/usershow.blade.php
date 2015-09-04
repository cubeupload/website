@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/users/show', $user) !!}
@stop

@section('content')
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							User Details
							@if( ($user->isSuperUser() && (Auth::user()->id == $user->id)) || !$user->isSuperUser() )
							<a href="{{ url('/admin/users/edit/' . $user->id )}}" class="btn btn-default btn-xs pull-right">Edit</a>
							@endif
						</div>
						<div class="panel-body">
							@if( $user->isSuperUser() )
							<div class="label label-info pull-right">Super User</div>
							@endif
							<div class="form-horizontal">
								<div class="form-group">
									<label for="id" class="col-md-3 control-label">User ID</label>
									<div class="col-md-4">
										<p class="form-control-static">{{ $user->id or ''}}</p>
									</div>
								</div>
								<div class="form-group">
									<label for="username" class="col-md-3 control-label">Username</label>
									<div class="col-md-9">
										<p class="form-control-static">{{ $user->username or '' }}</p>
									</div>
								</div>
								<div class="form-group">
									<label for="level" class="col-md-3 control-label">Access Level</label>
									<div class="col-md-9">
										@if( Auth::user()->level <= $user->level )
										<p class="form-control-static">Hidden</p>
										@else
										<p class="form-control-static">{{ $user->level or ''}}</p>
										@endif
									</div>
								</div>
								<div class="form-group">
									<label for="name" class="col-md-3 control-label">Name</label>
									<div class="col-md-9">
										<p class="form-control-static">{{ $user->name or ''}}</p>
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
				</div>
@stop