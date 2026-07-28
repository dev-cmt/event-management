<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<!-- Meta Data -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title', config('app.name', 'Pro Devs'))</title>

	{!! $seotags ?? '' !!}
	{!! $breadcrumbs ?? '' !!}
	{!! $jsonld ?? '' !!}

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset($settings->favicon ?? 'logo.png') }}" type="image/x-icon">

	<!-- Stylesheets -->
	<link href="{{asset('frontend')}}/css/bootstrap.css" rel="stylesheet">
	<link href="{{asset('frontend')}}/css/font-awesome.css" rel="stylesheet">
	<link href="{{asset('frontend')}}/css/animate.css" rel="stylesheet">
	<link href="{{asset('frontend')}}/css/aos.css" rel="stylesheet">
	<link href="{{asset('frontend')}}/css/swiper-bundle.min.css" rel="stylesheet">
	<link href="{{asset('frontend')}}/css/glightbox.min.min.css" rel="stylesheet">
	<link href="{{asset('frontend')}}/css/style.css" rel="stylesheet">

	@stack('css')
</head>
<body>
    @if($settings->is_loading)
        <!-- Preloader -->
        <div class="preloader"></div>
    @endif

    <!-- Header -->
    @include('frontend.partials.header')

    <!-- Content -->
    {{ $slot }}

    <!-- Footer -->
    @include('frontend.partials.footer')
    @include('frontend.partials.social-button')

	<!--Scroll to top-->
	<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-o-up"></span></div>

	<script src="{{asset('frontend')}}/js/jquery.js"></script>
	<script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
	<script src="{{asset('frontend')}}/js/aos.js"></script>
	<script src="{{asset('frontend')}}/js/swiper-bundle.min.js"></script>
	<script src="{{asset('frontend')}}/js/glightbox.min.js"></script>
	<script src="{{asset('frontend')}}/js/main.js"></script>

	@stack('js')
</body>

</html>
