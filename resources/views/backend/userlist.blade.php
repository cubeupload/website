@extends('backend.template')

@section('content')

	<div class="row">
		<div class="col-md-12">
			<form class="form-inline">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email">
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<td>Name</td>
						<td>Username</td>
						<td>Email Address</td>
						<td>Registered</td>
						<td>Last Active</td>
						<td>Tasks</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach( $users as $user )
					<tr>
						<td>{{ $user->name }}</td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->created_at }}</td>
						<td>{{ $user->updated_at }}</td>
						<td>
							<div class="btn-group btn-group-xs" role="group" aria-label="usercontrols">
								<button type="button" class="btn btn-default">View</button>
								<button type="button" class="btn btn-default">Edit</button>
								<button type="button" class="btn btn-danger">Ban</button>
							</div>
						</td>
						<td>
							<input type="checkbox">
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop