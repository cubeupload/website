<!-- Notices -->
		@foreach( $notices as $notice )
		<div class="col-md-12">
			<div class="alert alert-{{ $notice->style }}" role="alert">
				@if( $notice->dismissable )
				<button type="button" class="close noticeClose" data-dismiss="alert" data-notice-id="{{ $notice->id }}" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				@endif
				{!! $notice->text !!}
			</div>
		</div>
		@endforeach