<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Styles -->
	{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

	<style>
		*,
		*::before,
		*::after {
			box-sizing: border-box;
		}

		html {
			font-family: sans-serif;
			line-height: 1.15;
			-webkit-text-size-adjust: 100%;
			-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
		}

		article,
		aside,
		figcaption,
		figure,
		footer,
		header,
		hgroup,
		main,
		nav,
		section {
			display: block;
		}

		body {
			height: 100vh;
			margin: 0;
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
			font-size: 1rem;
			font-weight: 400;
			line-height: 1.5;
			color: #212529;
			text-align: left;
			background-color: #fff;
		}

		hr {
			box-sizing: content-box;
			height: 0;
			overflow: visible;
		}

		table {
			border-collapse: collapse;
		}

		.app-client {
			/* display: flex;
			flex-direction: column; */
			height: 100%;
		}

		.app-client__main-container {
			background: #E1F7FF;
			/* flex-grow: 1; */
		}

		.result-doc {
			background: white;
			height: 100%;
			font-family: Arial;
		}

		.result-doc__logo-img {
			height: 110px;
		}

		.result-doc__container {
			/* display: flex; */
		}

		.result-doc__logo-pru {
			/* height: 200px; */
			width: 100%;
		}

		.result-doc__header-title {
			text-transform: uppercase;
			font-size: 35px;
			font-weight: 700;
		}

		.result-doc__header-content {
			font-size: 25px;
			margin-top: 12px;
			font-weight: 700;
		}

		.result-doc__header-text {
			text-align: center;
		}

		.result-doc__table {
			min-width: 75%;
			margin-top: 2.5rem;
			margin-left: auto;
			margin-right: auto;
		}

		.result-doc__logo {
			text-align: center;
		}

		.result-doc__table th,
		.result-doc__table td {
			border: 2px solid black;
			padding: 3px 5px;
			text-align: center;
			word-break: break-word;
			min-width: 60px;
		}

		.border {
			border: 1px solid #dee2e6 !important;
		}

		.result-doc__table th {
			font-weight: 700;
			text-transform: uppercase;
		}

		.result-doc__body {
			margin-left: 100px;
		}

		.result-doc__body-container {
			/* display: flex;
			justify-content: center;
			flex-direction: column;
			align-items: center; */
			text-align: center;
		}

		img {
			vertical-align: middle;
			border-style: none;
		}

		.result-doc__table-row-custom td {
			font-weight: 700;
		}

		.result-doc__footer-body {
			font-weight: 700;
		}

		.result-doc__sign {
			border-top: 2px solid black;
			width: 50%;
			padding-top: 5px;
		}

		.result-doc__footer-text {
			margin-top: 70px;
		}

		.result-doc__logo-container {
			position: absolute;
			width: 110px;
		}

		.result-doc__float-right {
			/* float: right; */
			/* position: absolute; */
			/* margin-left: 115px; */
		}
	</style>

</head>

<body>
	<div class="app-client" id="app">

		<main class="app-client__main-container">
			<article class="result-doc">
				<div class="result-doc__container">
					{{-- <div class="result-doc__logo-container">
						<img class="result-doc__logo-pru" src="{{asset('img/pru.png')}}" />
				</div> --}}
				<div class="result-doc__float-right">
					<div class="result-doc__header">
						<div class="result-doc__header-container">
							<div class="result-doc__logo">
								{{-- <img class="" style="margin:0;position:absolute;top:0;left:0;height:110px;"
									src="{{asset('img/pru.png')}}" /> --}}
								<img class="result-doc__logo-img" src="{{asset('img/doc-header.png')}}" />
							</div>
						</div>
					</div>
					<div class="result-doc__body">
						<div class="result-doc__header-text">
							<span class="result-doc__header-title">results</span>
							<div class="result-doc__header-content">
								Rm. 7D Buenaventura Garcia Paredes, O.P.<br />March 21, 2020
							</div>
						</div>
						<div class="result-doc__body-container">
							@foreach($sections as $section)
							<table class="result-doc__table">
								<thead>
									<tr>
										<th colspan="2">
											{{ $section->level }}{{ $section->strand->name }}{{ $section->number }}
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Voted</td>
										<td>{{ $section->voted_count }}</td>
									</tr>
									<tr>
										<td>No Vote</td>
										<td>{{ $section->no_vote_count }}</td>
									</tr>
									<tr>
										<td>Population</td>
										<td>{{ $section->population }}</td>
									</tr>
									<tr class="result-doc__table-row-custom">
										<td>Vote Percentage</td>
										<td>{{ $section->vote_percentage }}</td>
									</tr>
								</tbody>
							</table>
							@endforeach
							<hr class="w-100 border">

							@foreach($positions as $position)
							<table class="result-doc__table">
								<thead>
									<tr>
										<th colspan="2">{{ $position->name }}</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Name</td>
										<td>Votes</td>
									</tr>
									@foreach($position->candidates as $candidate)
									<tr>
										@if($candidate->type === config('constants.candidatetypes.abstain'))
										<td>Abstain</td>
										@else
										<td>{{ $candidate->name }}</td>
										@endif

										<td>{{ $candidate->votes }}</td>
									</tr>
									@endforeach
								</tbody>
							</table>airplane
							@endforeach

						</div>
					</div>
					<div class="result-doc__footer">
						<div class="result-doc__footer-container">
							<div class="result-doc__footer-body">
								<div class="result-doc__footer-text">
									I agree that the result presented above is accurate according to the UST SHS
									IURIS SYSTEM:
								</div>
								<div class="result-doc__sign result-doc__footer-text">
									Signature Over Printed Name of Polling Station Deputy
								</div>
								<div class="result-doc__footer-text">
									Double Checked by:
								</div>
								<div class="result-doc__sign result-doc__footer-text">
									Signature Over Printed Name of Legal Division
								</div>
							</div>
						</div>
					</div>
				</div>
	</div>
	</article>

	</main>

	</div>

</body>

</html>
