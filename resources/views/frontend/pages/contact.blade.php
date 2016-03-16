@extends('frontend.template')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Contact Us</h1>
				<p class="lead">From time to time you might need to get in touch with us. This is how!</p>
				<p>If you have a problem or question not covered on our /contact page, you can use this form to send us a message.</p>
				@if( Auth::check() )
				<p>As you're logged in, we've filled out your name and email automatically. Feel free to delete these if you want to be anonymous!</p>
				@endif
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-md-6">
				<form class="form-horizontal">
					<div class="form-group">
						<label for="name" class="col-md-3 control-label">Name</label>
						<div class=" col-md-9">
							@if( Auth::check() )
							<input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
							@else
							<input type="text" class="form-control" id="name" name="name">
							@endif
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-md-3 control-label">Email Address</label>
						<div class=" col-md-9">
							@if( Auth::check() )
							<input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
							@else
							<input type="email" class="form-control" id="email" name="email">
							@endif
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-md-3 control-label">Message</label>
						<div class="col-md-9">
							<textarea class="form-control col-md-9" rows="4" id="message" name="message"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="category" class="col-md-3 control-label">Category</label>
						<div class="col-md-9">
							<select id="category" name="category" class="form-control">
								<option>Abuse</option>
								<option>Contact</option>
								<option>Suggestion</option>
							</select>
						</div>
					</div>
					<div class="form-group hidden contact-thanks">
						<div class="col-md-9 col-md-offset-3">
							<p class="form-control-static">We'll do our best to respond to you within a few days.</p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-9 col-md-offset-3">
							<button type="submit" class="btn btn-default">Post</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

@stop