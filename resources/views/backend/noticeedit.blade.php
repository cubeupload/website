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
						<div class="btn-group btn-group-xs pull-right">
							<button type="submit" class="btn btn-primary" data-action="saveNotice">Save</button>
						</div>
					</div>
					<div class="panel-body">
						<div id="notice" class="alert alert-{{ $notice->type }}" role="alert">
							<strong data-notice-title>{{ $notice->title }}</strong>
							<button type="button" class="close" aria-label="Close" data-notice-close><span aria-hidden="true">&times;</span></button>
							<span data-notice-text>{!! $notice->text !!}</span>
						</div>
					</div>
					<div class="panel-body">
						<form id="" class="form-horizontal">
							<div class="form-group">
								<label for="title" class="col-md-1 control-label">Title</label>
								<div class="col-md-4">
									<input type="text" class="form-control" id="title" name="title" value="{{ $notice->title }}">
								</div>
							</div>
							<div class="form-group">
								<label title="Notice body. HTML is OK." for="text" class="col-md-1 control-label">Text</label>
								<div class="col-md-4">
									<textarea class="form-control" id="text" name="text" cols="3">{{ $notice->text }}</textarea>
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
								<label class="col-md-1 control-label">Options</label>
								<div class="col-md-6">
									<label title="If checked, users can hide this notice." class="col-md-3 checkbox-inline">
										<input type="checkbox" id="dismissable" name="dismissable" @if( $notice->dismissable ) checked @endif> Dismissable
									</label>
									<label class="col-md-3 checkbox-inline">
										<input type="checkbox" id="visible" name="visible" @if( $notice->visible ) checked @endif> Visible
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
					</div>
				</div>
			</div>


	@else
		Notice not found :(
	@endif

@stop
