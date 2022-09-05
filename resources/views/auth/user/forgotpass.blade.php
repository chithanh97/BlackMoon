@extends('frontend.index')
@section('title', 'Quên mật khẩu')
@push('styles')
<style>
	.page-heading{
		text-align: center;
		margin-bottom: 15px;
	}
	.forgotpass button{
		cursor: pointer;
	}
	.forgotpass .container{
		min-height: 50vh;
		display: flex;
		align-items: center;
	}
	.forgotpass .content{
		width: 100%;
	}
</style>
@endpush
@section('content')
<div class="forgotpass">
	<div class="container">
		<div class="content">
			<div class="bg-gray-lighter">
				<div class="items-push">
					<h1 class="page-heading">Quên mật khẩu</h1>
				</div>
			</div>
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
			</div>
			@if(session('alert'))
			<div class="error-section">
				 <div class='alert alert-success'>{{session('alert')}}</div>
			</div>
			@endif
			<div class="row">
				<div class="block-content col-md-12">
					<form action="{{ route('front.renewpass') }}" method="POST">
						@csrf
						<div class="form-group">
							<label for="">Email đăng ký tài khoản</label>
							<input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="">
						</div>
						<div class="form-group">
							<button class="btn btn-primary pull-right" name="save" type="submit">Lưu</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection