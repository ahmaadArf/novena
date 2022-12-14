<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title> @yield('title',env('APP_NAME'))</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Health Care Medical Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Novena HTML Template v1.0">

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.png" />
    @yield('style')
  <!--
  Essential stylesheets
  =====================================-->
  <link rel="stylesheet" href="{{asset('siteasset/plugins/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('siteasset/plugins/icofont/icofont.min.css')}}">
  <link rel="stylesheet" href="{{asset('siteasset/plugins/slick-carousel/slick/slick.css')}}">
  <link rel="stylesheet" href="{{asset('siteasset/plugins/slick-carousel/slick/slick-theme.css')}}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('siteasset/css/style.css')}}">

</head>

<body id="top">

<header>
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>support@novena.com</a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Ta-134/A, New York, USA </li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:+23-345-67890">
							<span>Call Now : </span>
							<span class="h4">823-4565-13456</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
			<a class="navbar-brand" href="{{ route('site.index') }}">
				<img src="images/logo.png" alt="" class="img-fluid">
			</a>

			<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
				aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
				<span class="icofont-navigation-menu"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarmain">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item  {{ request()->routeIs('site.index') ?'active':''}} "><a class="nav-link" href="{{ route('site.index') }}">Home</a></li>
					<li class="nav-item {{ request()->routeIs('site.about')?'active':'' }} "><a class="nav-link" href="{{ route('site.about') }}">About</a></li>
					<li class="nav-item {{ request()->routeIs('site.service')?'active':'' }} "><a class="nav-link" href="{{ route('site.service') }}">Services</a></li>
					<li class="nav-item {{ request()->routeIs('site.department')?'active':'' }} "><a class="nav-link" href="{{ route('site.department') }}">Department</a></li>
					<li class="nav-item {{ request()->routeIs('site.doctor')?'active':'' }} "><a class="nav-link" href="{{ route('site.doctor') }}">Doctor</a></li>
					<li class="nav-item {{ request()->routeIs('site.appoinment')?'active':'' }} "><a class="nav-link" href="{{ route('site.appoinment') }}">Appoinment</a></li>

					<li class="nav-item {{ request()->routeIs('site.contact')?'active':'' }}"><a class="nav-link " href="{{ route('site.contact') }}">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>


@yield('content')
<!-- footer Start -->
<footer class="footer section gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<div class="logo mb-4">
						<img src="images/logo.png" alt="" class="img-fluid">
					</div>
					<p>Tempora dolorem voluptatum nam vero assumenda voluptate, facilis ad eos obcaecati tenetur veritatis eveniet distinctio possimus.</p>

					<ul class="list-inline footer-socials mt-4">
						<li class="list-inline-item">
							<a href="https://www.facebook.com/themefisher"><i class="icofont-facebook"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="https://twitter.com/themefisher"><i class="icofont-twitter"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="https://www.pinterest.com/themefisher/"><i class="icofont-linkedin"></i></a>
						</li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Department</h4>
					<div class="divider mb-4"></div>

					<ul class="list-unstyled footer-menu lh-35">
                        @foreach ($app_departments as $department )
                        <li><a href="{{ route('site.department_single',$department->id) }}">{{ $department->name }} </a></li>
                        @endforeach


					</ul>
				</div>
			</div>



			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget widget-contact mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Get in Touch</h4>
					<div class="divider mb-4"></div>

					<div class="footer-contact-block mb-4">
						<div class="icon d-flex align-items-center">
							<i class="icofont-email mr-3"></i>
							<span class="h6 mb-0">Support Available for 24/7</span>
						</div>
						<h4 class="mt-2"><a href="mailto:support@email.com">Support@email.com</a></h4>
					</div>

					<div class="footer-contact-block">
						<div class="icon d-flex align-items-center">
							<i class="icofont-support mr-3"></i>
							<span class="h6 mb-0">Mon to Fri : 08:30 - 18:00</span>
						</div>
						<h4 class="mt-2"><a href="tel:+23-345-67890">+23-456-6588</a></h4>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-btm py-4 mt-5">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6">
					<div class="copyright">
						Copyright &copy; 2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="subscribe-form text-lg-right mt-5 mt-lg-0">
						<form action="#" class="subscribe">
							<input type="text" class="form-control" placeholder="Your Email address" required>
							<button type="submit" class="btn btn-main-2 btn-round-full">Subscribe</button>
						</form>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-4">
					<a class="backtop scroll-top-to" href="#top">
						<i class="icofont-long-arrow-up"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>



    <!--
    Essential Scripts
    =====================================-->
    <script src="{{asset('siteasset/plugins/jquery/jquery.js')}}"></script>
    <script src="{{asset('siteasset/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('siteasset/plugins/slick-carousel/slick/slick.min.js')}}"></script>
    <script src="{{asset('siteasset/plugins/shuffle/shuffle.min.js')}}"></script>

    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA"></script>
    <script src="{{asset('siteasset/plugins/google-map/gmap.js')}}"></script>

    <script src="{{asset('siteasset/js/script.js')}}"></script>
    @yield('script')
  </body>
  </html>
