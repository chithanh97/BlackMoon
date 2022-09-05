@extends('frontend.index')
@section('title', 'Đổi mật khẩu')
@push('styles')
<style>
	.change--pass .container{
		min-height: 50vh;
		display: flex;
		align-items: center;
	}
	.change--pass .content{
		width: 100%;
	}
	.page-heading{
		text-align: center;
		margin-bottom: 15px;
	}
	.change--pass button{
		cursor: pointer;
	}
</style>
@endpush
@section('content')
<div class="change--pass">
	<div class="container">
		<div class="content">
			<div class="bg-gray-lighter">
				<div class="items-push">
					<h1 class="page-heading">Đổi mật khẩu</h1>
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
					<form action="{{ route('front.savechangepass') }}" method="POST">
						@csrf
						<div class="form-group">
							<label for="">Mật khẩu cũ</label>
							<input type="password" name="old_pass" class="form-control" value="{{ old('old_pass') }}">
						</div>
						<div class="form-group">
							<label for="">Mật khẩu mới</label>
							<input type="password" name="new_pass" class="form-control" value="{{ old('new_pass') }}">
						</div>
						<div class="form-group">
							<label for="">Nhập lại mật khẩu</label>
							<input type="password" name="re_pass" class="form-control" value="{{ old('re_pass') }}">
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