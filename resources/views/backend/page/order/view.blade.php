@extends('backend.index')
@section('title', 'Chi tiết đơn hàng')
@push('styles')
<style>
	select option, select {
		color: #fff!important;
	}
	.error-section .alert-danger{
		margin: 0 -10px 15px -10px;
	}
	.error-section .alert-danger ul{
		margin-bottom: 0;
	}
</style>
@endpush
@section('content')
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">Bài viết <small>Thêm mới Bài viết</small></h1>
		</div>
		<div class="col-sm-5 text-right hidden-xs">
			<ol class="breadcrumb push-10-t">
				<li><a href="{{ route('dashboard') }}">Quản trị</a>
				</li>
				<li><a href="{{ route('news') }}">Bài viết</a>
				</li>
				<li>Thêm mới</li>
			</ol>
		</div>
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
<div class="content" style="min-height: 530px;">
	<div class="bs-example bs-example-bg-classes">
	</div>
	<div class="block">
		<div class="block-content">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-xs-6">
					<div class="info">
						<div class="title">
							<h4>Thông tin vận chuyển</h4>
						</div>
						<div class="info--input">
							<input name="name" type="text" class="form-control" placeholder="Họ tên (*)" value="{{ old('name') }}">

							<input name="phone" type="tel" pattern="[0-9]{10}" class="form-control" placeholder="Số điện thoại (*)" value="{{ old('phone') }}">
							<input name="email" type="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
							<input name="address" type="text" class="form-control" placeholder="Địa chỉ (*)" value="{{ old('address') }}">
						</div>
						<div class="info--select">
							<select class="form-control" name="province" id="province">
								<option value="0">Chọn Tỉnh/Thành</option>

							</select>
							<select class="form-control" name="district" id="district">
								<option value="0">Chọn Quận/Huyện</option>
							</select>
							<select class="form-control" name="ward" id="ward">
								<option value="0">Chọn Phường/Xã</option>
							</select>
						</div>
						<div class="info-textarea">
							<textarea rows="5" name="note" class="form-control" placeholder="Ghi chú">{{ old('note') }}</textarea>
						</div>
					</div>
					<div class="ship">
						<div class="title">
							<h4>Hình thức thanh toán</h4>
						</div>
						<div class="ship-item active">
							<input class="form-check-input pay--method" type="radio" value="1" name="pay_method" checked>
							<img src="/storage/uploads/logo/Laravel_logo_wordmark_logotype.png" alt="cod">
							<div>
								<p>COD</p>
								<span>Thanh toán khi nhận hàng</span>
							</div>
						</div>
						<div class="ship-item">
							<input class="form-check-input pay--method" type="radio" value="2" name="pay_method">
							<img src="/storage/uploads/logo/Laravel_logo_wordmark_logotype.png" alt="momo">
							<div>
								<p>momo</p>
								<span>Thanh toán qua app MoMo</span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-xs-6">
					<div class="cart--box">
						<div class="title">
							<h4>Giỏ hàng</h4>
						</div>
						<div class="cart--view">
							@foreach( Cart::content() as $item)
							<div class="cart--item">
								<div class="cart--item__image">
									<a href="{{ route('front.items', $item->options->subject) }}">
										<img src="{{ $item->options->image}}" alt="{{ $item->name }}">
									</a>
								</div>
								<div class="cart--item__name">
									<p><a href="{{ route('front.items', $item->options->subject) }}">{{ $item->name }}</a></p>
									<span>x{{ $item->qty }}</span>
								</div>
								<div class="cart--item__price">
									{{ number_format($item->total, 0, '.', '.').getMoney() }}
								</div>
							</div>
							@endforeach
						</div>
						<div class="cart--total">
							<div class="tamtinh">
								<div class="cart--total__label">
									Tạm tính:
								</div>
								<div class="cart--total__count">
									{{ Cart::total().getMoney() }}
								</div>
							</div>
							<div class="giamgia">
								<div class="cart--total__label">
									Giảm giá:
								</div>
								<div class="cart--total__count">
									0đ
								</div>
							</div>
							<div class="giaohang">
								<div class="cart--total__label">
									Phí giao hàng:
								</div>
								<div class="cart--total__count">
									0đ
								</div>
							</div>
							<div class="tong">
								<div class="cart--total__label">
									Tổng:
								</div>
								<div class="cart--total__count">
									{{ Cart::total().getMoney() }}
								</div>
							</div>
						</div>
					</div>
					<div class="checkout">
						<a class="btn btn-danger" href="{{ route('cart.show') }}">Giỏ hàng</a>
						<button name="checkout" type="submit" class="btn btn-checkout btn-primary">Thanh toán</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
	$('#parent').select2({
		placeholder: '-- Chọn --'
	});
	checkKeyword();
</script>
@endpush