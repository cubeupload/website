@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/notices') !!}
@stop

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-4"><small>Click a notice to edit it.</small></div>
		</div>
		<div class="row">
			@foreach( $notices as $notice )
			<div class="col-md-12">
				<a style="text-decoration: none;" href="{{ url('/admin/notices/edit/' . $notice->id ) }}">
					<div class="alert alert-{{ $notice->type }}" role="alert">
						<strong>{{ $notice->title }}</strong>
						<span title="Notice can be seen by {{ $notice->show_to }} users" class="label label-{{ $notice->type }} pull-right">{{ ucfirst( $notice->show_to ) }}</span>
						{!! $notice->text !!}
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>


@stop