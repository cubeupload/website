@extends('frontend.template')

@section('content')

	@include('partials/notices_bar')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('forms/upload')
			</div>
		</div>
	</div>

@stop
