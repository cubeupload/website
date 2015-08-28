<!-- Notices -->
<div class="container">
	<div class="row">
		@foreach( $notices as $notice )
		<div class="col-md-12">
			<div class="alert alert-{{ $notice->type }}" role="alert">
				@if( $notice->dismissable )
				<button type="button" class="close noticeClose" data-dismiss="alert" data-notice-id="{{ $notice->id }}" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				@endif
				<strong>{{ $notice->title }}</strong>
				{!! $notice->text !!}
			</div>
		</div>
		@endforeach
	</div>
</div>
