@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/notices/add') !!}
@stop

@section('content')
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					Add Notice
				</div>
				<div class="panel-body">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div id="notice" class="alert alert-success" role="alert" style="margin-bottom:0;">
									<button type="button" class="close" aria-label="Close" data-notice-close style="display:none;"><span aria-hidden="true">&times;</span></button>
									<span data-notice-text></span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<form id="" class="form-horizontal" action="" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label title="Basic description of this notice, for reference purposes." for="title" class="col-md-1 control-label">Title</label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="title" name="title" value="">
							</div>
						</div>
						<div class="form-group">
							<label title="The content of the notice. HTML is OK." for="text" class="col-md-1 control-label">Text</label>
							<div class="col-md-5">
								<textarea class="form-control" id="text" name="text" cols="3"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="style" class="col-md-1 control-label">Style</label>
							<div class="col-md-4">
								<select class="form-control" id="style" name="style">
									<option value="success">Success</option>
									<option value="info">Info</option>
									<option value="warning">Warning</option>
									<option value="danger">Danger</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="show_to" class="col-md-1 control-label">Show To</label>
							<div class="col-md-4">
								<select class="form-control" id="show_to" name="show_to">
									<option value="all">Everyone</option>
									<option value="admins">Admins (Site & CubeAdmin)</option>
									<option value="users">Regular Users</option>
									<option value="guests">Guests</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-1 control-label">Options</label>
							<div class="col-md-6">
								<label title="If checked, users can hide this notice." class="col-md-3 checkbox-inline">
									<input type="checkbox" id="dismissable" name="dismissable"> Dismissable
								</label>
								<label class="col-md-3 checkbox-inline">
									<input type="checkbox" id="visible" name="visible"> Visible
								</label>								
							</div>
						</div>
						<div class="form-group">
							<label title="Ascending order in which notices are shown." for="metric" class="col-md-1 control-label">Metric</label>
							<div class="col-md-2">
								<input type="text" class="form-control" id="metric" name="metric" value="1">
							</div>
						</div>							
						<div class="form-group">
							<div class="col-md-offset-1 col-md-4">
								<button type="submit" class="btn btn-primary" data-action="saveNotice">Save</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

@stop
