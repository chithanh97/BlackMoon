@extends('frontend.index')
@section('title', 'Giỏ hàng')
@section('content')
<div class="cartpage">
	<div class="container">
		<div class="title">
			<h3>Giỏ hàng</h3>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				@if(Cart::count() > 0)
				<table class="table table-striped table-bordered">
					<thead>
						<td width="5%"></td>
						<td width="18%">Hình ảnh</td>
						<td width="23%">Tên sản phẩm</td>
						<td width="15%">Số lượng</td>
						<td width="20%">Đơn giá</td>
						<td width="20%">Thành tiền</td>
					</thead>
					<tbody>
						@foreach(Cart::content() as $value)
						<tr>
							<td>
								<a title="Xóa" href="{{ route('cart.delete', $value->rowId) }}"><i class="fa fa-trash"></i></a>
							</td>
							<td>
								<a href="{{ route('front.items', $value->options->subject) }}" title="Xem sản phấm">
									<img src="{{ $value->options->image }}" alt="{{ $value->name }}">
								</a>
							</td>
							<td>{{ $value->name }}</td>
							<td>
								<div id="update-quantity">
									<div class="quantity">
										<input id="qty" name="qty" type="number" min="1" max="100" step="1" value="{{ $value->qty }}">
									</div>
									<button data-id="{{ $value->rowId }}" class="btn btn-primary btn-update-quantity"><i class="fa fa-refresh"></i></button>
								</div>
							</td>
							<td>{{ number_format($value->price, 0, '.', '.').getMoney() }}</td>
							<td>{{ number_format($value->price * $value->qty, 0, '.', '.').getMoney() }}</td>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td>
								<a title="Xóa giỏ hàng" href="{{ route('cart.delete.all') }}"><i class="fa fa-trash"></i></a>
							</td>
							<td colspan="4">
								<p>
									Tổng tiền
								</p>
							</td>
							<td>
								<p class="count-price">{{ Cart::total().getMoney() }}</p>
							</td>
						</tr>
					</tfoot>
				</table>
				@else
				<div class="empty-data">
					Không có sản phẩm nào trong giỏ hàng
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection