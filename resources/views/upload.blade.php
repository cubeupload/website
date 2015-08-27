@extends('app')

@section('content')

<div class="container">
	
	@include('forms.upload')

</div>
@stop

@section('scripts')

	<script src="{{ asset('js/cubeupload-fileinput.js') }}"></script>
@stop