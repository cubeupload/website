@if( count($images) > 0 )
<div class="panel panel-default">
	<div class="panel-heading">
		Images
	</div>
	<ul class="panel-body list-group">
		@foreach( $images as $image )
		<li class="list-group-item">
			<a href="#">{{ $image->name }}</a> <small>({{ $image->uploader_ip }})</small>
			<div class="btn-group btn-group-xs pull-right" role="group" aria-label="usercontrols">
				<a role="button" class="btn btn-default" href="#">View</a>
			</div>
		</li>
		@endforeach
	</ul>
</div>
@endif