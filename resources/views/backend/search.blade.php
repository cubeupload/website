@extends('backend.template')

@section('content')
		<div class="form-group">
			<div class="input-group input-group-lg">
				<input type="text" id="omniSearch" class="form-control input-lg" placeholder="Feed me data!">
				<span class="input-group-btn">
					<button class="btn btn-primary btn-lg disabled" type="submit" data-action="submitOmniSearch">Search</button>
				</span>
			</div>
			<span class="help-block" id="helpText">Use this to search for <i>anything</i> in cubeupload!</span>
		</div>
		<div class="container-fluid" id="searchResults">
			<div class="col-md-3" id="userSearchResults">

			</div>
			<div class="col-md-6" id="imageSearchResults">
				
			</div>
			<div class="col-md-5" id="albumSearchResults">
				
			</div>
		</div>
@stop	

