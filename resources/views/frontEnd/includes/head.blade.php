<head>
	<!-- set the encoding of your site -->
	<meta charset="utf-8">
	<!-- set the viewport width and initial-scale on mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<!-- include the site stylesheet -->
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic,300,300italic,400italic,600,600italic,700,700italic,900,900italic%7cMontserrat:400,700%7cOxygen:400,300,700' rel='stylesheet' type='text/css'>
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{ url('public/frontEnd/css/bootstrap.css') }}">
  <!-- include the site stylesheet -->
  <link rel="stylesheet" href="{{ url('public/frontEnd/css/icon-fonts.css') }}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{ url('public/frontEnd/css/animate.css') }}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{ url('public/frontEnd/css/main.css') }}">
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{ url('public/frontEnd/css/responsive.css') }}">
	<!-- include the site Bootstrap -->
	<link href="{{asset('public/admin/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- include the site stylesheet -->
	<link rel="stylesheet" href="{{ url('public/admin/custom/frontMessenger.css') }}">

@yield('css')

</head>