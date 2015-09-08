@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/users/stats', $user) !!}
@stop

@section('content')
				<div class="col-md-12">
					<h4>Statistics are cached for 1 hour.</h4>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							Image Statistics
						</div>
						<div class="panel-body">
							<div class="form-horizontal">
								<div class="form-group">
									<label for="id" class="col-md-3 control-label">Total Uploads</label>
									<div class="col-md-4">
										<p class="form-control-static">{{ $stats['totalUploads'] }}</p>
									</div>
								</div>
								<div class="form-group">
									<label for="id" class="col-md-3 control-label">Uploads Per Week</label>
									<div class="col-md-4">
										<p class="form-control-static">{{ $stats['uploadsPerWeek'] }}</p>
									</div>
								</div>
								<div class="form-group">
									<label for="username" class="col-md-3 control-label">Disk Used</label>
									<div class="col-md-9">
										<p class="form-control-static">{{ human_filesize( $stats['diskUsed'] ) }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							Other Statistics
						</div>
						<div class="panel-body">
							<div class="form-horizontal">
								<div class="form-group">
									<label for="id" class="col-md-3 control-label">Some stat</label>
									<div class="col-md-4">
										<p class="form-control-static">12,345</p>
									</div>
								</div>
								<div class="form-group">
									<label for="username" class="col-md-3 control-label">Other stat</label>
									<div class="col-md-9">
										<p class="form-control-static">65,554</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

@stop