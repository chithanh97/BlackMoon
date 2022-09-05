@extends('frontend.index')
@section('title', 'Thông tin')
@push('styles')
<style>
	.profile{
		padding: 30px 0;
	}
	.page-heading{
		text-align: center;
		margin-bottom: 15px;
	}
	.profile button{
		cursor: pointer;
	}
</style>
@endpush
@section('content')
<div class="profile">
	<div class="container">
		<div class="content">
			<div class="bg-gray-lighter">
				<div class="items-push">
					<h1 class="page-heading">Thông tin</h1>
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
					<form action="{{ route('front.savechangeprofile') }}" method="POST">
						@csrf
						<div class="form-group">
							<label for="">Họ tên</label>
							<input type="text" name="name" class="form-control" value="{{ old('name') != '' ? old('name') : $login->name }}">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" name="email" class="form-control" value="{{ old('email') != '' ? old('email') : $login->email }}" disabled>
						</div>
						<div class="form-group">
							<label for="">Số điện thoại</label>
							<input type="text" name="phone" class="form-control" value="{{ old('phone') != '' ? old('phone') : $login->phone }}">
						</div>
						<div class="form-group">
							<label for="">Địa chỉ</label>
							<input type="text" name="address" class="form-control" value="{{ old('address') != '' ? old('address') : $login->address }}">
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