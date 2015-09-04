@extends('backend.template')

@section('breadcrumbs')

@stop

@section('content')

	<div class="container">
		<div class="row">
			@foreach( $notices as $notice )
			<div class="col-md-12">
				<div class="alert alert-{{ $notice->type }}" role="alert">
					<button type="button" class="btn btn-default"><span aria-hidden="true" class="glyphicon glyphicon-menu-up"></span></button>
					<button type="button" class="btn btn-default"><span aria-hidden="true" class="glyphicon glyphicon-menu-down"></span></button>
					<strong>{{ $notice->title }}</strong>
					{!! $notice->text !!}
				</div>
			</div>
			@endforeach
		</div>
	</div>


@stop