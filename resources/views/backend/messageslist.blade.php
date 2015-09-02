@extends('backend.template')

@section('breadcrumbs')
	@if( isset( $category ) )
		{!! Breadcrumbs::render('/admin/messages/category', $category) !!}
	@else
		{!! Breadcrumbs::render('/admin/messages') !!}
	@endif
@stop

@section('content')
	@if( count( $messages ) == 0 )
	@if( isset( $category ) )
	<h4>There are no messages to show in the {{ $category }} category.</h4>
	@else
	<h4>There are no messages to show.</h4>
	@endif
	@endif

	@foreach( $messages as $message )
		<div class="col-md-12" id="message{{ $message->id }}">
			<div class="panel panel-default">
				<div class="panel-heading">
					From {{ $message->email or 'Anonymous' }} 
					@if( !$message->read)
					<span class="label label-info" data-type="newLabel">New</span>
					@endif
					@if( $message->category == 'abuse' )
					<span class="label label-danger">{{ ucfirst( $message->category ) }}</span>
					@else
					<span class="label label-primary">{{ ucfirst( $message->category ) }}</span>
					@endif
					<div class="btn-group btn-group-xs pull-right">
						@if( !$message->read )
						<button type="button" class="btn btn-default" data-target="markMessageRead" data-messageid="{{ $message->id }}">Mark As Read</button>
						@endif
						<button type="button" class="btn btn-default" data-target="hideMessage" data-messageid="{{ $message->id }}">Hide</button>
					</div>
				</div>
				<div class="panel-body">
					{{ $message->text }}
				</div>
			</div>
		</div>
	@endforeach

	{!! $messages->render() !!}
@stop		