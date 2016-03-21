@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/search') !!}
@stop

@section('content')
		<div class="form-group">
			<form action="/admin/search" method="post" data-action="submitOmniSearch">
				<div class="input-group input-group-lg">
					<input type="text" id="omniSearch" class="form-control input-lg" placeholder="Feed me data!">
					<span class="input-group-btn">
						<button class="btn btn-primary btn-lg disabled" id="searchButton" type="submit">Search</button>
					</span>
				
				</div>
			</form>
			<span class="help-block" id="helpText">Use this to search for <i>anything</i> in cubeupload!</span>
		</div>
		<div class="container-fluid" id="searchResults">
			<div class="col-md-4" id="userSearchResults">

			</div>
			<div class="col-md-4" id="imageSearchResults">
				
			</div>
			<div class="col-md-4" id="albumSearchResults">
				
			</div>
		</div>
@stop	

