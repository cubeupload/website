@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/users/edit', $user) !!}
@stop

@section('content')

			@if( $user->isSuperUser() && (Auth::user()->id != $user->id) )
				<h4>This user is a Super User and cannot be edited.</h4>
			@else
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						User Details
						<div class="btn-group btn-group-xs pull-right">
							<button type="submit" class="btn btn-primary" data-action="saveDetails">Save</button>
						</div>
					</div>
					<div class="panel-body">
						<form id="userDetailsForm" class="form-horizontal" data-userid="{{ $user->id }}">
							<div class="form-group">
								<label for="id" class="col-md-3 control-label">User ID</label>
								<div class="col-md-2">
									<p class="form-control-static" id="id">{{ $user->id or ''}}</p>
								</div>
							</div>
							<div class="form-group">
								<label for="username" class="col-md-3 control-label">Username</label>
								<div class="col-md-9">
									<p class="form-control-static" id="username">{{ $user->username or ''}}</p>
								</div>
							</div>
							<div class="form-group">
								<label for="level" class="col-md-3 control-label">Access Level</label>
								<div class="col-md-2">
									@if( Auth::user()->id == $user->id )
									<p title="You can't change your own access level silly." class="form-control-static" id="level">{{ $user->level or '' }}</p>
									@elseif( Auth::user()->level <= $user->level )
									<p title="User's access level is higher than yours." class="form-control-static">Hidden</p>
									@else
									<input type="text" class="form-control" id="level" name="level" value="{{ $user->level or '' }}">
									@endif
								</div>
							</div>
							<div class="form-group">
								<label for="name" class="col-md-3 control-label">Name</label>
								<div class="col-md-9">
									<input type="text" class="form-control" id="name" name="name" value="{{ $user->name or ''}}">
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="col-md-3 control-label">Email Address</label>
								<div class="col-md-9">
									<input type="email" class="form-control" id="email" name="email" value="{{ $user->email or '' }}">
								</div>
							</div>
							<div class="form-group">
								<label for="password" class="col-md-3 control-label">Password</label>
								<div class="col-md-9">
									<input type="password" class="form-control" id="password" name="password">
								</div>
							</div>
							<div class="form-group">
								<label for="passwordConfirm" class="col-md-3 control-label">Password (Confirm)</label>
								<div class="col-md-9">
									<input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Settings
						<div class="btn-group btn-group-xs pull-right">
							<button type="submit" class="btn btn-primary" data-action="saveSettings">Save</button>
						</div>
					</div>
					<div class="panel-body">
						<form id="userSettingsForm" class="form-horizontal" data-userid="{{ $user->id }}">
							<div class="form-group">
								<label for="id" class="col-md-3 control-label">Short Image Links</label>
								<div class="col-md-9">
									<div class="radio">
										<label>
											<input type="radio" name="short_urls" id="short_urls_none" value="none" @if( $user->settings->short_urls == 'none' ) checked @endif>
											No Short URLs
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="short_urls" id="short_urls_bitly" value="bitly" @if( $user->settings->short_urls == 'bitly' ) checked @endif>
											Bit.Ly
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="short_urls" id="short_urls_isgd" value="isgd" @if( $user->settings->short_urls == 'isgd' ) checked @endif>
											Is.Gd
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="username" class="col-md-3 control-label">Retain Filenames</label>
								<div class="col-md-9">
									<div class="radio">
										<label>
											<input type="radio" name="retain_filenames" id="retain_filenames_keep" value="1" @if( $user->settings->retain_filenames == 1) checked @endif>
											Keep filenames
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="retain_filenames" id="retain_filenames_random" value="0" @if( $user->settings->retain_filenames == 0) checked @endif>
											Randomly generate
										</label>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="level" class="col-md-3 control-label">Embed Links</label>
								<div class="col-md-9">
									<div class="checkbox">
										<label class="checkbox-inline">
											<input type="hidden" name="embed_html_full" value="0">
											<input type="checkbox" name="embed_html_full" id="embed_html_full" value="1" @if( $user->settings->embed_html_full == 1) checked @endif>
											HTML Full-size
										</label>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline">
											<input type="hidden" name="embed_html_thumb" value="0">
											<input type="checkbox" name="embed_html_thumb" id="embed_html_thumb" value="1" @if( $user->settings->embed_html_thumb == 1) checked @endif>
											HTML Thumbnail
										</label>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline">
											<input type="hidden" name="embed_bbcode_full" value="0">
											<input type="checkbox" name="embed_bbcode_full" id="embed_bbcode_full" value="1" @if( $user->settings->embed_bbcode_full == 1) checked @endif>
											BBCode Full-size
										</label>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline">
											<input type="hidden" name="embed_bbcode_thumb" value="0">
											<input type="checkbox" name="embed_bbcode_thumb" id="embed_bbcode_thumb" value="1" @if( $user->settings->embed_bbcode_thumb == 1) checked @endif>
											BBCode Thumbnail
										</label>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			@endif
@stop
