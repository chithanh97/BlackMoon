@extends('frontend.index')
@section('title', 'Đăng nhập')
@section('content')
<div class="login-page">
	<div class="error-section">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		@if (Session('register'))
		<div class="alert alert-danger">
			{{ session('register') }}
		</div>
		@endif
	</div>
	<div class="form-structor">
		<div class="signup {{ (old('register') != '' || $errors->first('register') != '' ) ? '' : 'slide-up'}}">
			<h2 class="form-title" id="signup"><span>hoặc</span>Đăng ký</h2>
			<div class="form-holder">
				<form class="form-register" action="{{ route('register') }}" method="POST">
					@csrf
					<input type="hidden" class="input" name="register" value="1" />
					<input type="text" class="input" name="name" placeholder="Họ tên" value="{{ old('name') }}" />
					<input type="email" class="input" name="email" placeholder="Email" value="{{ old('email') }}" />
					<input type="password" class="input" name="password" placeholder="Mật khẩu" />
					<input type="password" class="input" name="re_password" placeholder="Nhập lại mật khẩu"/>
				</form>
			</div>
			<button class="submit-btn btn-register">Đăng ký</button>
		</div>
		<div class="login {{ (old('register') != '' || $errors->first('register') != '' ) ? 'slide-up' : ''}}">
			<div class="center">
				<h2 class="form-title" id="login"><span>Hoặc</span>Đăng nhập</h2>
				<div class="form-holder">
					<form action="{{ route('login') }}" method="POST" class="form-login">
						@csrf
						<input type="email" class="input" placeholder="Email" name="l_email" value="{{ old('l_email') }}" />
						<input type="password" class="input" placeholder="Mật khẩu" name="l_password"/>
					</form>
				</div>
				<a class="forgot--pass" href="{{ route('front.forgotpass') }}">Quên mật khẩu</a>
				<button class="submit-btn btn-login">Đăng nhập</button>
			</div>
		</div>
	</div>
</div>
@endsection
@push('styles')
<style>
	.forgot--pass{
		display: block;
		text-align: right;
		font-style: italic;
		font-size: 14px;
		text-decoration: underline;
	}
	.form-structor {
		background-color: #222;
		border-radius: 15px;
		height: 550px;
		width: 350px;
		position: relative;
		overflow: hidden;
	}
	.form-structor::after {
		content: &#39;
		&#39;
		;
		opacity: 0.8;
		position: absolute;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		background-repeat: no-repeat;
		background-position: left bottom;
		background-size: 500px;
	}
	.form-structor .signup {
		position: absolute;
		top: 50%;
		left: 50%;
		-webkit-transform: translate(-50%, -50%);
		width: 75%;
		z-index: 5;
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .signup.slide-up {
		top: 5%;
		-webkit-transform: translate(-50%, 0%);
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .signup.slide-up .form-holder, .form-structor .signup.slide-up .submit-btn {
		opacity: 0;
		visibility: hidden;
	}
	.form-structor .signup.slide-up .form-title {
		font-size: 1em;
		cursor: pointer;
	}
	.form-structor .signup.slide-up .form-title span {
		margin-right: 5px;
		opacity: 1;
		visibility: visible;
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .signup .form-title {
		color: #fff;
		font-size: 1.7em;
		text-align: center;
		margin-bottom: 0;
	}
	.form-structor .signup .form-title span {
		color: #ccc;
		opacity: 0;
		visibility: hidden;
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .signup .form-holder {
		/*border-radius: 15px;*/
		/*background-color: #fff;*/
		overflow: hidden;
		margin-top: 50px;
		opacity: 1;
		visibility: visible;
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .signup .form-holder .input {
		border: 0;
		outline: none;
		box-shadow: none;
		display: block;
		height: 40px;
		line-height: 30px;
		padding: 15px;
		border-bottom: 1px solid #eee;
		width: 100%;
		font-size: 12px;
	}
	.form-structor .signup .form-holder .input:last-child {
		border-bottom: 0;
	}
	.form-structor .signup .form-holder .input::-webkit-input-placeholder {
		color: rgba(0, 0, 0, 0.4);
	}
	.form-structor .signup .submit-btn {
		background-color: rgba(0, 0, 0, 0.4);
		color: rgba(256, 256, 256, 0.7);
		border: 0;
		border-radius: 15px;
		display: block;
		margin: 15px auto;
		padding: 15px 45px;
		width: 100%;
		font-size: 13px;
		font-weight: bold;
		cursor: pointer;
		opacity: 1;
		visibility: visible;
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .signup .submit-btn:hover {
		transition: all 0.3s ease;
		background-color: rgba(0, 0, 0, 0.8);
	}
	.form-structor .login {
		position: absolute;
		top: 20%;
		left: 0;
		right: 0;
		bottom: 0;
		background-color: #fff;
		z-index: 5;
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .login::before {
		content: &#39;
		&#39;
		;
		position: absolute;
		left: 50%;
		top: -20px;
		-webkit-transform: translate(-50%, 0);
		background-color: #fff;
		width: 200%;
		height: 250px;
		border-radius: 50%;
		z-index: 4;
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .login .center {
		position: absolute;
		top: calc(50% - 10%);
		left: 50%;
		-webkit-transform: translate(-50%, -50%);
		width: 75%;
		z-index: 5;
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .login .center .form-title {
		color: #000;
		font-size: 1.7em;
		text-align: center;
	}
	.form-structor .login .center .form-title span {
		color: rgba(0, 0, 0, 0.4);
		opacity: 0;
		visibility: hidden;
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .login .center .form-holder {
		border-radius: 15px;
		background-color: #fff;
		border: 1px solid #eee;
		overflow: hidden;
		margin-top: 50px;
		opacity: 1;
		visibility: visible;
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .login .center .form-holder .input {
		border: 0;
		outline: none;
		box-shadow: none;
		display: block;
		height: 40px;
		line-height: 30px;
		padding: 15px;
		border-bottom: 1px solid #eee;
		width: 100%;
		font-size: 12px;
	}
	.form-structor .login .center .form-holder .input:last-child {
		border-bottom: 0;
	}
	.form-structor .login .center .form-holder .input::-webkit-input-placeholder {
		color: rgba(0, 0, 0, 0.4);
	}
	.form-structor .login .center .submit-btn {
		background-color: #6b92a4;
		color: rgba(256, 256, 256, 0.7);
		border: 0;
		border-radius: 15px;
		display: block;
		margin: 15px auto;
		padding: 15px 45px;
		width: 100%;
		font-size: 13px;
		font-weight: bold;
		cursor: pointer;
		opacity: 1;
		visibility: visible;
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .login .center .submit-btn:hover {
		transition: all 0.3s ease;
		background-color: rgba(0, 0, 0, 0.8);
	}
	.form-structor .login.slide-up {
		top: 90%;
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .login.slide-up .center {
		top: 10%;
		-webkit-transform: translate(-50%, 0%);
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .login.slide-up .form-holder, .form-structor .login.slide-up .submit-btn {
		opacity: 0;
		visibility: hidden;
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .login.slide-up .form-title {
		font-size: 1em;
		margin: 0;
		padding: 0;
		cursor: pointer;
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .login.slide-up .form-title span {
		margin-right: 5px;
		opacity: 1;
		visibility: visible;
		-webkit-transition: all 0.3s ease;
	}
	.login-page {
		position: relative;
		min-height: 80vh;
		background-color: #e1e8ee;
		display: flex;
		align-items: center;
		justify-content: center;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
		flex-direction: column;
		padding: 15px 0;
	}
	.login-page:before{
		content: '';
		width: 100%;
		height: 100%;
		position: absolute;
		left: 0;
		top: 0;
		filter: blur(2px);
		-webkit-filter: blur(2px);
		background: url(http://127.0.0.1:8000/storage/uploads/images/woman-using-facebook-social-site-laptop.jpg);
		background-repeat: no-repeat;
		background-size: cover;
	}
	.login-page:after{
		content: '';
		width: 100%;
		height: 100%;
		position: absolute;
		left: 0;
		top: 0;
		background: linear-gradient(#111, #000);
		opacity: .7;
	}
	.form-structor .login::before {
		content: "";
		position: absolute;
		left: 50%;
		top: -20px;
		-webkit-transform: translate(-50%, 0);
		background-color: #fff;
		width: 200%;
		height: 250px;
		border-radius: 50%;
		z-index: 4;
		-webkit-transition: all 0.3s ease;
	}
	.form-structor .login .center .form-holder .input{
		margin: 15px 0;
		background: #000;
		color: #fff;
		border-radius: 12px;
	}
	.form-structor .signup .form-holder .input{
		margin: 15px 0;
		border-radius: 12px;
	}
	.form-structor .login .center .form-holder{
		border: none;
	}
	.form-structor .login .center .form-holder .input::placeholder {
		color: #fff;
		opacity: 1;
	}

	.form-structor .login .center .form-holder .input:-ms-input-placeholder {
		color: #fff;
	}

	.form-structor .login .center .form-holder .input::-ms-input-placeholder {
		color: #fff;
	}
	.alert-danger li{
		font-size: 12px;
		font-style: italic;
	}
	.alert-danger{
		background: #fff;
		width: 350px;
		border-radius: 15px;
	}
	.error-section{
		z-index: 1;
		position: relative;
	}
</style>
@endpush
@push('scripts')
<script>
	$('#login').click(() => {
		changeSlideUp();
		console.log('ccc');
	});
	$('#signup').click(() => {
		changeSlideUp();
	});

	function changeSlideUp(){
		if($('.login').hasClass('slide-up')){
			$('.login').removeClass('slide-up');
			$('.signup').addClass('slide-up');
		} else {
			console.log('fff');
			$('.login').addClass('slide-up');
			$('.signup').removeClass('slide-up');
		}
	}

	$('.btn-register').click(() => {
		$('.form-register').submit();
	});

	$('.btn-login').click(() => {
		$('.form-login').submit();
	});
</script>
@endpush