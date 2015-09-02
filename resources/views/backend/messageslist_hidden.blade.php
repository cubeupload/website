@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/messages/hidden') !!}
@stop

@section('content')
	@if( count( $messages ) == 0 )
	<h4>No messages to show!</h4>
	@endif

	@foreach( $messages as $message )
		<div class="col-md-12" id="message{{ $message->id }}">
			<div class="panel panel-default">
				<div class="panel-heading">
					From {{ $message->email or 'Unknown' }} <span class="label label-default">Hidden</span>
					<div class="btn-group btn-group-xs pull-right">
						<button type="button" class="btn btn-default" data-target="unHideMessage" data-messageid="{{ $message->id }}">Unhide</button>
						<button type="button" class="btn btn-danger" data-target="deleteMessage" data-messageid="{{ $message->id }}">Delete</button>
					</div>
				</div>
				<div class="panel-body">
					{{ $message->text }}
				</div>
			</div>
		</div>
	@endforeach
@stop		