<html>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<head>
	<title> @yield('title') </title>
</head>
<body>
	<form action="/goods" method="get">
		<input type="image" src="/storage/logo.png">
	</form>
	<h1> @yield('title')</h1>
	<div class="content"> @yield('content') </div>
	<div class="footer"> @yield('footer') </div>
</body>
</html>



