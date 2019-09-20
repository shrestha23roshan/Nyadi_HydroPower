<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	@section('title', $seo->meta_title)

	@include('layouts.frontend.partial.head')
</head>
<body>
	@include('layouts.frontend.partial.header')
	@include('layouts.frontend.partial.banner')
	@include('layouts.frontend.partial.homepage')
	@include('layouts.frontend.partial.footer')
</body>
</html>