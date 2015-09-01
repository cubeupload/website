@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/users') !!}
@stop

@section('content')

	<div class="row">
		<div class="container-fluid">
			<div class="panel panel-default">
				<div class="panel-heading">
					User List
				</div>
				<div class="panel-body">
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
											<a role="button" class="btn btn-default" href="{{ url('/admin/users/show/' . $user->id) }}">View</a>
											<a role="button" class="btn btn-default" href="{{ url('/admin/users/edit/' . $user->id) }}">Edit</a>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<div class="panel-footer">
				</div>
			</div>
			<div class="col-md-12 pull-right">
				{!! $users->render() !!}
			</div>
		</div>
	</div>
@stop

@section('scripts')

	<script>
		//ko.applyBindings( UserViewModel );
		ko.applyBindings( UserListViewModel );
	</script>

@stop