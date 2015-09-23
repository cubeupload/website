<div class="panel panel-default">
	<div class="panel-heading">
		Users
	</div>
	<ul class="panel-body list-group">
		@foreach( $users as $user )
		<li class="list-group-item"><a href="{{ url('/admin/users/show/' . $user->id ) }}">{{ $user->username }}</a> <small>({{ $user->registration_ip }})</small></li>
		@endforeach
	</ul>
</div>