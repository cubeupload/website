@extends('backend.template')

@section('breadcrumbs')
	{!! Breadcrumbs::render('/admin/statistics') !!}
@stop

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Uploads 7 days
					</div>
					<div class="panel-body">
						Graph to show last 7 days of uploads
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Uploads 1 month
					</div>
					<div class="panel-body">
						Graph to show last 30 days of uploads
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						Uploads 6 months
					</div>
					<div class="panel-body">
						Graph to show last 6 months of uploads
					</div>
				</div>
			</div>	
		</div>
	</div>
@stop