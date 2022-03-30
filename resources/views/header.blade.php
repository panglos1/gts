<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>General Technology & Services</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('public/css/animate.css')}}">

	<link rel="stylesheet" href="{{asset('public/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/magnific-popup.css')}}">

	<link rel="stylesheet" href="{{asset('public/css/bootstrap-datepicker.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/jquery.timepicker.css')}}">

	<link rel="stylesheet" href="{{asset('public/css/flaticon.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/lightbox.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="{{asset('public/js/jquery.min.js')}}"></script>
	<script src="{{asset('public/js/jquery-migrate-3.0.1.min.js')}}"></script>
	<!-- Pannellum library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.css"
			integrity="sha512-UoT/Ca6+2kRekuB1IDZgwtDt0ZUfsweWmyNhMqhG4hpnf7sFnhrLrO0zHJr2vFp7eZEvJ3FN58dhVx+YMJMt2A=="
			crossorigin="anonymous" referrerpolicy="no-referrer" />

	<script src="https://cdnjs.cloudflare.com/ajax/libs/pannellum/2.5.6/pannellum.js"
			integrity="sha512-EmZuy6vd0ns9wP+3l1hETKq/vNGELFRuLfazPnKKBbDpgZL0sZ7qyao5KgVbGJKOWlAFPNn6G9naB/8WnKN43Q=="
			crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- End Pannellum library -->
	<script src="{{asset('public/js/main.js')}}"></script>
    <script src="{{ asset('public/js/app.js') }}" defer></script>

</head>
<body>
	<div class="py-1 top">
		<div class="container">
			<div class="row">
				<div class="col-sm text-center text-md-left mb-md-0 mb-2 pr-md-4 d-flex topper align-items-center">
					<p class="mb-0 w-100">
						<span class="fa fa-paper-plane"></span>
						<span class="text">{{@$options['site_email']}}</span>
					</p>
				</div>
				<div class="col-sm justify-content-center d-flex mb-md-0 mb-2">
					<div class="social-media">
						<p class="mb-0 d-flex">
							<a href="{{@$options['site_facebook']}}" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
							<a href="{{@$options['site_twitter']}}" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
							<a href="{{@$options['site_instagram']}}" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
						</p>
					</div>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-7 d-flex topper align-items-center text-lg-right justify-content-end">
					<p class="mb-0 register-link"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Renseignez-vous</a></p>
				</div>
			</div>
		</div>
	</div>
	<div class="pt-4 pb-5">
		<div class="container">
			<div class="row d-flex align-items-start align-items-center px-3 px-md-0">
				<div class="d-flex mb-2 mb-md-0 mr-auto">
					<a class="navbar-brand d-flex align-items-center" href="{{route('home')}}">

						<img height="80px" src="{{asset('public/images/logoo.jpg')}}">
					</a>
				</div>
				<div class="col-md-4 d-flex topper mb-md-0 mb-2 align-items-center">
					<div class="icon d-flex justify-content-center align-items-center">
						<span class="fa fa-map"></span>
					</div>
					<div class="pr-md-4 pl-md-3 pl-3 text">
						<p class="con"><span>Appelez nous</span> <span>{{@$options['site_phone']}}</span></p>
						<p class="con"> Assistance clientèle 24/7</p>
					</div>
				</div>
				<div class="col-md-4 d-flex topper mb-md-0 align-items-center">


				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container d-flex align-items-center">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="fa fa-bars"></span> Menu
			</button>
			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}"><a href="{{route('home')}}" class="nav-link">Accueil</a></li>
					<li class="nav-item {{ (request()->is('services')) ? 'active' : '' }}"><a href="{{route('services')}}" class="nav-link">Services</a></li>
					<li class="nav-item {{ (request()->is('projects')) ? 'active' : '' }}"><a href="{{route('projects')}}" class="nav-link">Projets</a></li>
					<li class="nav-item {{ (request()->is('references')) ? 'active' : '' }}"><a href="{{route('references')}}" class="nav-link">References</a></li>
					<li class="nav-item {{ (request()->is('contact')) ? 'active' : '' }}"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>

					<li class="nav-item {{ (request()->is('espace')) ? 'active' : '' }}"><a href="{{ route('espace') }}" class="nav-link">Espace Client</a></li>
				</ul>
				<a href="#" class="btn-custom" data-toggle="modal" data-target="#exampleModalCenter">Renseignez-vous</a>
			</div>
		</div>
	</nav>
	<!-- END nav -->
