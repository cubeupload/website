<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>cubeupload</title>

	@yield('head')

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/cubeupload.css?v=1') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<script>
		cubeupload = {};
		cubeupload.csrf_token = '{{ csrf_token() }}';
		cubeupload.env = {};
		cubeupload.env.image_user_url = '{{ env('IMAGE_USER_URL') }}';
	</script>

	<nav class="navbar navbar-fixed-top navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">cubeupload admin panel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Quick Links <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/account') }}">Latest Images</a></li>
							<li><a href="{{ url('/settings') }}">Contact Posts</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">
					<li>
						<a href="#">Users</a>
					</li>
					<li>
						<a href="#">UberMensch</a>
					</li>
					<li class="active">
						Details
					</li>
				</ol>
			</div>
			<div class="col-md-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<ul class="nav nav-pills nav-stacked">
							<li role="presentation">
								<a href="#">Dashboard</a>
							</li>
							<li role="presentation" class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
									Users <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li role="presentation">
										<a href="/admin/users/latest">Latest</a>
									</li>
									<li role="presentation">
										<a href="/admin/users/search">Search</a>
									</li>
									<li role="presentation">
										<a href="/admin/users/bans">Bans</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-10">
				@yield('content')
			</div>
		</div>
	</div>

	<footer class="footer">
      <div class="container">
        <div class="row">
        	<div class="col-md-12">
        		CUBEUPLOAD 1337 ADMIN PANEL
        	</div>
        </div>
      </div>
    </footer>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>

	<script src="{{ asset('/js/validator.js') }}"></script>
	<script src="{{ asset('/js/cubeupload.js?v=1') }}"></script>
	
	@yield('scripts')

</body>
</html>
