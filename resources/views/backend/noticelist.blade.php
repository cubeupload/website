@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/notices') !!}
@stop

@section('content')
		@foreach( $notices as $notice )
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					{{ $notice->title }}
					@if( $notice->visible )
					<span title="Notice will be shown" class="label label-info">Visible</span>
					@else
					<span title="Notice is disabled and not visible" class="label label-default">Hidden</span>
					@endif
					<span title="Notice is for {{ $notice->show_to }} users" class="label label-primary">{{ ucfirst( $notice->show_to ) }}</span> 
					<div class="btn-group btn-group-xs pull-right">
						<a href="{{ url('/admin/notices/edit/' . $notice->id ) }}" class="btn btn-default">Edit</a>
					</div>
				</div>
				<div class="panel-body">
					<div class="alert alert-{{ $notice->type }}" role="alert" style="margin-bottom: 0;">
						<button type="button" class="close" aria-label="Close" data-notice-close @if( !$notice->dismissable ) style="display:none;" @endif><span aria-hidden="true">&times;</span></button>
						{!! $notice->text !!}
					</div>
				</div>
			</div>
		</div>
		@endforeach
		<div class="col-md-12">
			<a class="btn btn-primary pull-right" href="{{ url('/admin/notices/add') }}">Add New</a>
		</div>
@stop