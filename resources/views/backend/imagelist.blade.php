@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/images') !!}
@stop

@section('content')

	<div class="row">
		<div class="container-fluid">
			<div class="panel panel-default">
				<div class="panel-heading">
					Search
				</div>
				<div class="panel-body">
					<div class="col-md-12">
						<form class="form-inline" action="">
							<div class="form-group">
								<label for="filename">Filename</label>
								<input type="text" class="form-control" id="filename" name="filename" value="{{ $search['filename'] or '' }}">
							</div>
							<div class="form-group">
								<label for="email">IP Address</label>
								<input type="text" class="form-control" id="ip_address" name="ip_address" value="{{ $search['ip_address'] or '' }}">
							</div>
							<button type="submit" class="btn btn-primary">Search</button>
							<a class="btn btn-link" href="{{ url('/admin/images') }}">Reset Filters</a>
						</form>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					Images
				</div>
				<div class="panel-body">
					<div class="col-md-12">
						@if( count( $images ) == 0 )
						<h4>No images found.</h4>
						@else
							@foreach( $images as $image )
							<div class="col-md-3">
								<div class="thumbnail">
									<a href="{{ url( '/admin/images/show/' . $image->id ) }}">
										<img src="{{ $image->getPublicUrl() }}">
									</a>
									<div class="caption">
										<p><strong>{{ $image->name }}</strong></p>
										<p><small>Uploaded {{ $image->created_at->diffForHumans() }}</small></p>
										<small> By
										@if( $image->user )
										<a href="{{ url('/admin/users/show/' . $image->user->id) }}">{{ $image->user->username }}</a>
										@else
										<a href="#">{{ $image->uploader_ip }}</a>
										@endif
										</small>
									</div>
								</div>
							</div>
							@endforeach
						@endif
					</div>
				</div>
				<div class="panel-footer">
				</div>
			</div>
			<div class="col-md-12 pull-right">
				@if( isset( $search ) )
				{!! $images->appends($search)->render() !!}
				@else
				{!! $images->render() !!}
				@endif
			</div>
		</div>
	</div>
@stop

@section('scripts')

@stop