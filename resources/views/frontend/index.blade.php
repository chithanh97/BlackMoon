
<!DOCTYPE html>
<html>
<head>
	@include('frontend.layout.header')
	<link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/plugin/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/main.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/plugin/fancybox/jquery.fancybox.min.css')}}">
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
	<script src="{{asset('assets/frontend/plugin/fancybox/jquery.fancybox.min.js')}}"></script>
	<script src="{{asset('assets/frontend/js/elevatezoom.js')}}"></script>
	<script src="{{asset('assets/frontend/js/main.js')}}"></script>
	@stack('scripts')
</body>
</html>