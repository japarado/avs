<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

		<link rel="shortcut icon" type="image/png" href="images/Copy of LGO5.png" />

		<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	</head>
	<body>
		@include('components.header')

		@yield('content')


		@yield('scripts')

		<script src="{{ asset('js/app.js') }}"></script>
	</body>
</html>
