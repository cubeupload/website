@extends('frontend.template')

@section('content')

	<div class="container">

		<div class="alert alert-success hidden" role="alert" name="success_msg">
			<strong>Success!</strong> Your settings were saved.
		</div>

		<div class="row">

			<div class="col-md-12">
				<h1>My Settings <small><em>personalise your preferences</em></small></h1>
			</div>

			<form class="form-horizontal" role="form" method="POST" action="{{ url('/settings') }}" id="settings_form">
				
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Short Image Links</h3>
					</div>
					<div class="panel-body">
						<p>Choose a shortening service for your share links. Great for Twitter.</p>
						<div class="radio">
							<label>
								<input type="radio" name="short_urls" id="short_urls_none" value="none" @if( $user->settings->short_urls == 'none' ) checked @endif>
								No Short URLs
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="short_urls" id="short_urls_bitly" value="bitly">
								Bit.Ly
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="short_urls" id="short_urls_isgd" value="isgd">
								Is.Gd
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Retain Filenames</h3>
					</div>
					<div class="panel-body">
						<p>Allows you to keep your filenames or have them randomly generated.</p>
						<div class="radio">
							<label>
								<input type="radio" name="retain_filenames" id="retain_filenames_keep" value="1">
								Keep filenames
							</label>
						</div>
						<div class="radio">
							<label>
								<input type="radio" name="retain_filenames" id="retain_filenames_random" value="0">
								Randomly generate
							</label>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Embedding Links</h3>
					</div>
					<div class="panel-body">
						<p>Choose the codes which will appear on share popovers and modals.</p>
						<div class="checkbox">
							<label class="checkbox-inline">
								<input type="hidden" name="embed_html_full" value="0">
								<input type="checkbox" name="embed_html_full" id="embed_html_full" value="1">
								HTML Full-size
							</label>
						</div>
						<div class="checkbox">
							<label class="checkbox-inline">
								<input type="hidden" name="embed_html_thumb" value="0">
								<input type="checkbox" name="embed_html_thumb" id="embed_html_thumb" value="1">
								HTML Thumbnail
							</label>
						</div>
						<div class="checkbox">
							<label class="checkbox-inline">
								<input type="hidden" name="embed_bbcode_full" value="0">
								<input type="checkbox" name="embed_bbcode_full" id="embed_bbcode_full" value="1">
								BBCode Full-size
							</label>
						</div>
						<div class="checkbox">
							<label class="checkbox-inline">
								<input type="hidden" name="embed_bbcode_thumb" value="0">
								<input type="checkbox" name="embed_bbcode_thumb" id="embed_bbcode_thumb" value="1">
								BBCode Thumbnail
							</label>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary pull-right">Save</button>
			</div>
			</form>
		</div>

	</div>

@stop

@section('body_end')

			<script>

				//$('[name="success_msg"]').hide();

				var settings = $.parseJSON('{!! $settings->toJson() !!}');
				
				$('#short_urls_' + settings.short_urls).prop('checked', true );
				
				if( settings.retain_filenames )
					$('#retain_filenames_keep').prop('checked', true );
				else
					$('#retain_filenames_random').prop('checked', true );

				if( settings.embed_html_full )
					$('#embed_html_full').prop('checked', true );

				if( settings.embed_html_thumb )
					$('#embed_html_thumb').prop('checked', true );

				if( settings.embed_bbcode_full )
					$('#embed_bbcode_full').prop('checked', true );

				if( settings.embed_bbcode_thumb )
					$('#embed_bbcode_thumb').prop('checked', true );

				$('')

			</script>

@stop