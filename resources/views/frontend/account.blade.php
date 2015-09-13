@extends('frontend.template')

@section('content')

	<div class="container">

		<!-- stats -->
		<div class="row">
			<div class="col-md-12">
				<h1>Your Account</h1>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body">
						Member for {{ Auth::user()->created_at->diffForHumans(null, true) }}.
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body">
						{{ $stats['totalUploads'] }} images uploaded.
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-body">
						{{ human_filesize( $stats['diskUsed'] ) }} of disk used.
					</div>
				</div>
			</div>
		</div>

		<!-- email & password -->
		<div class="row">
			<div class="col-md-6">
				<h3>Change your Email Address</h3>
				<small>We'll never spam you or sell your address. For account recovery only!</small>
				<form>
					<div class="form-group">
						<label for="emailAddress">Email Address</label>
						<input type="email" class="form-control" id="emailAddress">
					</div>
					<button type="submit" class="btn btn-primary pull-right">Verify Email</button>
					<p>Current address: yourmum@cubeupload.com</p>

				</form>
			</div>
			<div class="col-md-6">
				<h3>Change Password</h3>
				<small>At least 6 characters, make it hard to guess!</small>
				<form>
					<div class="form-group" style="padding-bottom: 10px;">
						<label for="currentPassword">Current Password</label>
						<input type="password" class="form-control" id="currentPassword">
					</div>
					<div class="form-group">
						<label for="newPassword">New Password</label>
						<input type="password" class="form-control" id="newPassword">
					</div>
					<div class="form-group">
						<label for="repeatPassword">Repeat Password</label>
						<input type="password" class="form-control" id="repeatPassword">
					</div>
					<button type="submit" class="btn btn-primary pull-right">Change Password</button>
			</div>
		</div>
	</div>

@stop