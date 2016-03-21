@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/notices/edit', $notice) !!}
@stop

@section('content')
	
	@if( isset( $notice ) )
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Edit Notice
					</div>
					<div class="panel-body">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div id="notice" class="alert alert-{{ $notice->style }}" role="alert" style="margin-bottom:0;">
										<button type="button" class="close" aria-label="Close" data-notice-close @if( !$notice->dismissable ) style="display:none;" @endif><span aria-hidden="true">&times;</span></button>
										<span data-notice-text>{!! $notice->text !!}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<form id="noticeForm" data-id="{{ $notice->id }}" class="form-horizontal" action="" method="POST">
							<div class="form-group">
								<label title="Basic description of this notice, for reference purposes." for="title" class="col-md-1 control-label">Title</label>
								<div class="col-md-4">
									<input type="text" class="form-control" id="title" name="title" value="{{ $notice->title }}">
								</div>
							</div>
							<div class="form-group">
								<label title="The content of the notice. HTML is OK." for="text" class="col-md-1 control-label">Text</label>
								<div class="col-md-5">
									<textarea class="form-control" id="text" name="text" cols="3">{{ $notice->text }}</textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="style" class="col-md-1 control-label">Style</label>
								<div class="col-md-4">
									<select class="form-control" id="style" name="style">
										<option value="success" @if( $notice->style == 'success') selected @endif>Success</option>
										<option value="info" @if( $notice->style == 'info') selected @endif>Info</option>
										<option value="warning" @if( $notice->style == 'warning') selected @endif>Warning</option>
										<option value="danger" @if( $notice->style == 'danger') selected @endif>Danger</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="show_to" class="col-md-1 control-label">Show To</label>
								<div class="col-md-4">
									<select class="form-control" id="show_to" name="show_to">
										<option value="all" @if( $notice->show_to == 'all') selected @endif>Everyone</option>
										<option value="admins" @if( $notice->show_to == 'admins') selected @endif>Admins (Site & CubeAdmin)</option>
										<option value="users" @if( $notice->show_to == 'users') selected @endif>Regular Users</option>
										<option value="guests" @if( $notice->show_to == 'guests') selected @endif>Guests</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-1 control-label">Options</label>
								<div class="col-md-6">
									<label title="If checked, users can hide this notice." class="col-md-3 checkbox-inline">
										<input type="hidden" name="dismissable" value="0">
										<input type="checkbox" id="dismissable" name="dismissable" value="1" @if( $notice->dismissable ) checked @endif> Dismissable
									</label>
									<label class="col-md-3 checkbox-inline">
										<input type="hidden" name="visible" value="0">
										<input type="checkbox" id="visible" name="visible" value="1" @if( $notice->visible ) checked @endif> Visible
									</label>								
								</div>
							</div>
							<div class="form-group">
								<label title="Ascending order in which notices are shown." for="metric" class="col-md-1 control-label">Metric</label>
								<div class="col-md-2">
									<input type="text" class="form-control" id="metric" name="metric" value="{{ $notice->metric }}">
								</div>
							</div>
						</form>							
						<div class="form-group">
							<div class="col-md-offset-1 col-md-4">
								<button type="submit" class="btn btn-primary" data-action="saveNotice">Save</button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Confirm delete</h4>
			      </div>
			      <div class="modal-body">
			        Are you sure you want to delete this notice? This action can't be reversed.
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			        <button type="button" class="btn btn-danger" data-action="deleteNotice">Delete</button>
			      </div>
			    </div>
			  </div>
			</div>


	@else
		Notice not found :(
	@endif

@stop
