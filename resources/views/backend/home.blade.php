@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin') !!}
@stop

@section('content')

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				Latest Users
			</div>
			<!-- <div class="panel-body"> -->
				<ul class="panel-body list-group">
					@foreach( $users as $user )
					<li class="list-group-item"><a href="{{ url('/admin/users/show/' . $user->id ) }}">{{ $user->username }}</a> <small>({{ $user->created_at->diffForHumans() }})</small></li>
					@endforeach
				</ul>
			<!-- </div> -->
		</div>
	</div>

	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				Latest Images
			</div>
			<div class="panel-body">
				
			</div>
		</div>
	</div>

@stop