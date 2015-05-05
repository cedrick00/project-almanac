<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> @yield('meta-title') </title>
	@section('css')
		{{ HTML::style('packages/bootstrap/css/bootstrap.min.css') }}		
	@show

</head>
<body>
    <div class="container-fluid">
      <div class="row">
        @yield('content')        
      </div>
    </div>
  	@section('js')
  	@show
</body>
</html>