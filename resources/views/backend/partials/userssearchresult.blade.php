@if( count( $users ) > 0 )
<div class="panel panel-default">
	<div class="panel-heading">
		Users
	</div>
	<ul class="panel-body list-group">
		@foreach( $users as $user )
		<li class="list-group-item">
			<a href="{{ url('/admin/users/show/' . $user->id ) }}">{{ $user->username }}</a> <small>({{ $user->registration_ip }})</small>
			<div class="btn-group btn-group-xs pull-right" role="group" aria-label="usercontrols">
				<a role="button" class="btn btn-default" href="{{ url('/admin/users/show/' . $user->id) }}">View</a>
				@if( ($user->isSuperUser() && (Auth::user()->id == $user->id)) || !$user->isSuperUser() )
				<a role="button" class="btn btn-default" href="{{ url('/admin/users/edit/' . $user->id) }}">Edit</a>
				@endif
			</div>
		</li>
		@endforeach
	</ul>
</div>
@endif