@extends('backend.index')
@section('title', 'Đổi mật khẩu')
@push('styles')
<style>
	.content .row{
		background: #191c24
	}
	.block-content{
		padding-top: 15px;
	}
	button[name=save]{
		margin-bottom: 15px;
	}
</style>
@endpush
@section('content')
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">Đổi mật khẩu</h1>
		</div>
	</div>
</div>
<div class="error-section">
	<div class="row">
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
</div>
@if(session('alert'))
<div class="error-section">
	<div class="row">
		    <div class='alert alert-success'>{{session('alert')}}</div>
	</div>
</div>
@endif
<div class="content" style="min-height: 530px;">
	<div class="row">
		<div class="block-content col-md-12">
			<form action="{{ route('admin.savechangepass') }}" method="POST">
				@csrf
				<div class="form-group">
					<label for="">Mật khẩu cũ</label>
					<input type="password" name="old_pass" class="form-control" value="{{ old('old_pass') }}">
				</div>
				<div class="form-group">
					<label for="">Mật khẩu mơi</label>
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
@endsection