@extends('frontend.index')
@section('title', 'Thanh toán')
@section('content')
<div class="container">
	<div id="thankyou">
		<div class="thankyou">
			<div class="thankyou-title">
				<h1>Thank You!</h1>
			</div>
			<p>Đơn hàng <span>{{ $order->order_code }}</span> của bạn đã được đặt hàng thành công</p>
			<p>Chúng tôi sẽ liên hệ trong thời gian sớm nhất</p>
			<p>Mọi thắc mắc vui lòng liên hệ hotline: {{ $config->hotline }}</p>
			<a href="/">Trang Chủ</a>
		</div>
	</div>
</div>
@endsection