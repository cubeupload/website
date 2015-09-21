@extends('backend.template')

@section('content')
		<div class="form-group">
			<div class="input-group input-group-lg">
				<input type="text" data-action="omniSearch" class="form-control input-lg" placeholder="Feed me data!">
				<span class="input-group-btn">
					<button class="btn btn-primary btn-lg" type="submit">Search</button>
				</span>
			</div>
			<span class="help-block" id="helpText">Use this to search for <i>anything</i> in cubeupload!</span>
		</div>
		<div class="container-fluid" id="searchResults">
		</div>
@stop	

