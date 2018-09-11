<!DOCTYPE html>
<html>
<head>
	<title>Demo</title>
	<link rel="stylesheet" href="/css/app.css">
</head>
<body>
	@include('inc.nav')
	<p></p>
	<p></p>
	<p></p>
	<div class = "container">
	@if(Request::is('/'))
		@include('inc.showcase')
	@endif
		<div class = "row">
			<div class = "col-md-8 col-lg-8">
			@include('inc.messages')
			@yield('content')
			</div>	

		<div class = "col-md-4 col-lg-4">
			@include('inc.sb')
		</div>
		</div>
	</div>

	<footer id="footer" class="text-center">
		<p>Copyright 2018 &copy; The Mountain Troppers</p>
	</footer>
	
</body>
</html>