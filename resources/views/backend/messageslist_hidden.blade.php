@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/messages/hidden') !!}
@stop

@section('content')
	@if( count( $messages ) == 0 )
	<h4>There are no messages in the archive.</h4>
	@else
	<div class="alert alert-danger">
		<strong>Heads up!</strong> <br />
		Once deleted, a message can no longer be viewed in the admin panel. Messages are retained in the database however and can be restored (see Tom).
	</div>
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

	{!! $messages->render() !!}
@stop		