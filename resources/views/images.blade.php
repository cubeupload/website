@extends('app')

@section('content')
	
	@include('forms.imageGallery')

	<div id="links">

	@foreach( $images as $img )
		<a href="{{ $img->getPublicUrl() }}" title="{{ $img->name }}" data-gallery>
			<img src="{{ $img->getPublicUrl() }}" alt="{{ $img->name }}">
		</a>
	@endforeach

	</div>

@stop