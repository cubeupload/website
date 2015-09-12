@extends('frontend.template')

@section('content')

	<div class="container">
		<div class="row">
			@include('partials/notices_bar')
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@include('forms/upload')
			</div>
		</div>
	</div>

@stop
