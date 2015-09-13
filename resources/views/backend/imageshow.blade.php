@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/images/show', $image) !!}
@stop

@section('content')
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							Image Details
						</div>
						<div class="panel-body">
							<div class="form-horizontal">
								<div class="form-group">
									<label for="id" class="col-md-3 control-label">Image ID</label>
									<div class="col-md-4">
										<p class="form-control-static">{{ $image->id or ''}}</p>
									</div>
								</div>
								<div class="form-group">
									<label for="filename" class="col-md-3 control-label">Filename</label>
									<div class="col-md-4">
										<p class="form-control-static">{{ $image->name or ''}}</p>
									</div>
								</div>
								<div class="form-group">
									<label for="filesize" class="col-md-3 control-label">Size</label>
									<div class="col-md-4">
										<p class="form-control-static">{{ human_filesize( $image->size or '' )}}</p>
									</div>
								</div>
								<div class="form-group">
									<label for="filesize" class="col-md-3 control-label">Uploader</label>
									<div class="col-md-4">
										@if( $image->user )
										<p class="form-control-static">
											<a href="{{ url('/admin/users/show/' . $image->user->id ) }}">
												{{ $image->user->name or $image->user->username }}
											</a>
											({{ $image->uploader_ip or '' }})
										</p>
										@else
										<p class="form-control-static">{{ $image->uploader_ip or '' }}</p>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							Preview
						</div>
						<div class="panel-body">
							<div class="col-md-12">
								<div class="thumbnail">
									<img src="{{ $image->getPublicUrl() }}">
								</div>
							</div>
						</div>
					</div>
				</div>
@stop