@extends('backend.index')
@section('title', 'Chi tiết đơn hàng')
@section('content')
<div class="content bg-gray-lighter">
	<div class="row items-push">
		<div class="col-sm-7">
			<h1 class="page-heading">Đơn hàng <small>Chi tiết đơn hàng</small></h1>
		</div>
		<div class="col-sm-5 text-right hidden-xs">
			<ol class="breadcrumb push-10-t">
				<li><a href="{{ route('dashboard') }}">Quản trị</a>
				</li>
				<li><a href="{{ route('order') }}">Đơn hàng</a>
				</li>
				<li>Chi tiết đơn hàng</li>
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
							<p><span>Họ tên:</span> {{ $item->name }}</p>
							<p><span>Số điện thoại:</span> {{ $item->phone }}</p>
							<p><span>Email:</span> {{ $item->mail }}</p>
							<p><span>Địa chỉ:</span> {{ $item->address }}</p>
						</div>
						<div class="info--select">
							<p><span>Tỉnh/Thành:</span> {{ $province != '' ? $province->_name : '_____'  }}, <span>Quận/Huyện:</span> {{ $district != '' ? $district->_name : '_____'  }}, <span>Phường/Xã:</span> {{ $ward != '' ? $ward->_name : '_____'  }}</p>
						</div>
						<div class="info-textarea">
							<p><span>Ghi chú:</span> {{ $item->note }}</p>
						</div>
					</div>
					<div class="ship">
						<div class="title">
							<h4>Phương thức thanh toán</h4>
						</div>
						<div class="ship-item {{ $item->pay_method == 1 ? 'active' : '' }}">
							<input class="form-check-input pay--method" type="radio" value="1" name="pay_method" checked>
							<img src="/storage/uploads/logo/Laravel_logo_wordmark_logotype.png" alt="cod">
							<div>
								<p>COD</p>
								<span>Thanh toán khi nhận hàng</span>
							</div>
						</div>
						<div class="ship-item {{ $item->pay_method == 2 ? 'active' : '' }}">
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
							@foreach( $listItem as $items)
							<div class="cart--item">
								<div class="cart--item__image">
									<a href="{{ route('front.items', $items->subject) }}">
										<img src="{{ $items->image}}" alt="{{ $items->name }}">
									</a>
								</div>
								<div class="cart--item__name">
									<p><a href="{{ route('front.items', $items->subject) }}">{{ $items->name }}</a></p>
									<span>x{{ $items->qty }}</span>
								</div>
								<div class="cart--item__price">
									{{ number_format($items->price, 0, '.', '.').getMoney() }}
									<?php $sell += $items->sell_price ?>
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
									{{ number_format($item->total, 0, '.', '.').getMoney() }}
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
									{{ number_format($item->total, 0, '.', '.').getMoney() }}
								</div>
							</div>
						</div>
					</div>
					<div class="checkout">
						<button onclick="javascript:window.location.href = '{{ route('order') }}' " type="button" name="goback" class="btn btn-sm btn-danger">Quay lại</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
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
	.block .row{
		background: #191c24;
		padding-top: 15px;
		padding-bottom: 15px;
	}
	.block .row > div:first-child{
		border-right: 1px solid;
	}
	.info{
		margin-bottom: 30px;
	}
	.title h4{
		font-size: 18px;
		font-weight: bold;
		margin-bottom: 25px;
		position: relative;
		width: max-content;
	}
	.title h4:before{
		content: '';
		position: absolute;
		width: 100%;
		height: 2px;
		background: #406314;
		bottom: -7px;
	}
	.info--input p,
	.info--select p,
	.info-textarea p{
		color: #ddd;
	}
	.info--input span,
	.info--select span,
	.info-textarea span{
		font-weight: bold;
	}
	.cart--box a{
		color: #fff;
		text-decoration: none;
	}
</style>
@endpush