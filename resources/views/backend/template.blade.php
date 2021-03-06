<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>cubeupload</title>

	@yield('head')

	<link href="{{ elixir('css/app.css') }}" rel="stylesheet">
	<link href="{{ elixir('css/cubeupload.css') }}" rel="stylesheet">
	<link href="{{ elixir('css/cubeupload-admin.css') }}" rel="stylesheet">

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
				<a class="navbar-brand" href="{{ url('/admin') }}"><img src="{{ asset('img/indexLogo.png') }}" height="25"></img></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">

					<li>
						<a href="{{ url('/admin/search') }}">Search</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Messages 
							@if( isset( $messages_unread ) )
							<span class="badge" data-type="unreadMessagesBadge">{{ $messages_unread }}</span>
							@endif
							<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/admin/messages') }}">List</a></li>
							<li role="separator" class="divider"></li>
							<li class="dropdown-header">Category</li>
							<li><a href="{{ url('/admin/messages/category/abuse') }}">Abuse</a></li>
							<li><a href="{{ url('/admin/messages/category/contact') }}">Contact</a></li>
							<li><a href="{{ url('/admin/messages/category/suggestion') }}">Suggestion</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="{{ url('/admin/messages/hidden') }}">Archive</a></li>

						</ul>
					</li>
					<li>
						<a href="{{ url('/admin/notices') }}">Notices</a>
					</li>
					<li>
						<a href="{{ url('/admin/statistics') }}">Statistics</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Subscriptions <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/account') }}">Add</a></li>
							<li><a href="{{ url('/account') }}">List</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Users <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ url('/admin/users') }}">List</a></li>
							<li><a href="{{ url('/admin/users/recent') }}">Recent</a></li>
							<li><a href="{{ url('/admin/users/search') }}">Search</a></li>
						</ul>
					</li>
					<li>
						<a href="/admin/tools">Tools</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				@yield('breadcrumbs')
			</div>
			<div class="col-md-12">
				@yield('content')
			</div>
		</div>
	</div>

	<footer class="footer">
      <div class="container-fluid">
        <div class="row">
        	<div class="col-md-4">
        		Logged in as {{ Auth::user()->name }} <small>(<a href="{{ url('/auth/logout') }}">Logout</a>)</small>
        	</div>
        	<div class="col-md-4 text-center">
        		<small>
	        	@if( isset( $vcs_version ) )
        		<a href="https://github.com/cubeupload/website/commit/{{ $vcs_version }}" target="_blank">{{ $vcs_version }}</a>
        		@else
        		LOCAL DEV
				@endif
				</small>
        	</div>
        	<div class="col-md-4">
        		<a href="{{ url('/') }}" class="pull-right">Return to site</a>
        	</div>
        </div>
      </div>
    </footer>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.3.0/knockout-min.js"></script>

	<script src="{{ asset('/js/validator.js') }}"></script>
	<script src="{{ elixir('js/cubeupload.js') }}"></script>
	<script src="{{ elixir('js/cubeupload-admin.js') }}"></script>
	
	@yield('scripts')

</body>
</html>
