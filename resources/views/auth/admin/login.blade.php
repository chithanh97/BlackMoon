<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập quản trị</title>
	<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/vendor/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/backend/css/main.css')}}">
</head>
<body>
	<style>
		.limiter input{
			color: #333333!important;
		}
	</style>
	<div class="limiter">
		<div class="container-login100" style="background-image: url({{asset('assets/backend/images/img-01.jpg')}});">
			<div class="wrap-login100 p-b-30">
				<form class="login100-form validate-form" action="{{route('admin.login')}}" method="post">

					<div class="login100-form-avatar">
						<img src="{{asset('assets/backend/images/avatar-01.jpg')}}" alt="AVATAR">
					</div>
					<span class="login100-form-title p-t-20 p-b-45">
						John Doe
					</span>
					<?php print_r(Session::get('success')) ?>
					@if(Session::get('success'))
					<div class="alert alert-success full-width">
						{{Session::get('success')}}
					</div>
					@endif

					@if(Session::get('fail'))
					<div class="alert alert-danger full-width">
						{{Session::get('fail')}}
					</div>
					@endif
					@csrf
					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="email" placeholder="Username" value="{{ old('email') }}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>
					<span class="text-danger">@error('email'){{ $message }} @enderror</span>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>
					<span class="text-danger">@error('password'){{ $message }} @enderror</span>
					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>