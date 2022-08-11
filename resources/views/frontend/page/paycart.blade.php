@extends('frontend.index')
@section('title', 'Thanh toán')
@section('content')
<div class="cartpage">
	<div class="container">
		<div class="title">
			<h3>Thanh toán</h3>
		</div>
		<form action="">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-xs-6">
					<div class="form-group">
						<label>Họ tên (*)</label>
						<input type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Số điện thoại (*)</label>
						<input type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Địa chỉ</label>
						<input type="text" class="form-control">
					</div>
					<div class="form-group">
						<label>Tỉnh/Thành</label>
						<select class="form-control" name="" id=""></select>
					</div>
					<div class="form-group">
						<label>Quận/Huyện</label>
						<select class="form-control" name="" id=""></select>
					</div>
					<div class="form-group">
						<label>Phường/Xã</label>
						<select class="form-control" name="" id=""></select>
					</div>
					<div class="form-group">
						<label>Ghi chú</label>
						<textarea rows="10" class="form-control"></textarea>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection