
<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link rel="shortcut icon" type="image/x-icon" href="" />
	<meta http-equiv="Content-Language"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="language" content="vi" />
	<meta name="description" content="" />
	<meta name="robots" content="noodp,index,follow" />
	<meta name="revisit-after" content="1 days" />
	<meta name="copyright" content="Copyright © 2022-<?=date('Y')?> by BlackMoon" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="canonical" href="">
	<meta property="og:title" content="">
	<meta property="og:image" content=""/>
	<meta property="og:type" content="" />
	<meta property="og:url" content="" />
	<meta property="og:description" content="">
	<meta property ="og:locale" content ="vi" />

	<!-- Dublin Core-->
	<link rel="schema.DC" href="https://purl.org/dc/elements/1.1/" />
	<meta name="DC.title" content="" />
	<meta name="DC.identifier" content="" />
	<meta name="DC.description" content="" />
	<meta name="DC.subject" content="" />
	<meta name="DC.language" scheme="UTF-8" content="" />

	<!-- Geo Meta Tags -->
	<meta name="geo.region" content="VN" />
	<meta name="geo.placename" content="Ho Chi Minh City" />
	<meta name="geo.position" content="10.806105;106.63668" />
	<meta name="ICBM" content="10.806105, 106.63668" />
	<link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/plugin/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/frontend//css/main.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	@stack('styles')
	@stack('schema')
</head>
<body>
	<div class="wrapper">
		<nav id='menu-main'>
			<div class="container">
				<div class="content-menu">
					<div class="logo">
						<a href="/">
							<img src="{{ $config->logo }}" alt="{{ $config->name }}">
						</a>
					</div>
					<ul class="item-menu">
						<?php if($menu->content != null) echo getMenuFront(json_decode($menu->content), $itemcategory, $newscategory, $listitem) ?>
					</ul>
				</div>
			</div>
		</nav>
		<main id='main-content'>
			@yield('content')
		</main>
		<footer id="main-footer">
			@include('frontend.layout.footer')
		</footer>
	</div>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v14.0" nonce="Cmb2Jlle"></script>
	<script src="{{asset('assets/frontend/js/jquery-1.10.2.min.js')}}"></script>
	<script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
	<!-- <script src="{{asset('assets/frontend/js/number.js')}}"></script> -->
	<!-- <script src="{{asset('assets/frontend/js/main.js')}}"></script> -->
	@stack('scripts')
</body>
</html>