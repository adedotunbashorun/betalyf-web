<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="author" content="">
        <meta name="description" content="" />
        <link rel="shortcut icon" href="" type="image/png" />

        <title>BetaLyf | @yield('title')</title>
        
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="bootstrap/css/style.css" rel="stylesheet" type="text/css" />
        @yield('extra_style')
	</head>
	<body>
		<div class="container">
			<div id="header">
				<div class="row">
					<div class="col-md-6">
						<h4 style="font-size:30px;">BetaLyf</h4>
					</div>
					<div class="col-md-6" align="right">
					<h4><a href="{{ URL::route('login')}}" target="" style="text-transform:initial">Login</a></h4>
					{{-- <a href="#" target="">Sign up</a> --}}
					</div>
				</div>
			</div>
        @yield('content')
    </div>