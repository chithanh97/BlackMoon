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
								<button data-id="{{ $value->rowId }}" title="Xóa" class="btn btn-delete"><i class="fa fa-trash"></i></button>
							</td>
							<td>
								<a href="{{ route('front.items', $value->options->subject) }}" title="Xem sản phấm">
									<img src="{{ $value->options->image }}" alt="{{ $value->name }}">
								</a>
							</td>
							<td>
								<a href="{{ route('front.items', $value->options->subject) }}" title="Xem sản phấm">
									{{ $value->name }}
								</a>
							</td>
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
								<button title="Xóa giỏ hàng" class="btn btn-delete-all"><i class="fa fa-trash"></i></button>
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
				<div class="thanhtoan"><a href="{{ route('cart.pay') }}">Thanh toán <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
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
@push('scripts')
<script>
	$('.btn-update-quantity').click(function(){
		let id = $(this).data('id');
		let qty = $(this).parent().find('input').val();
		// console.log(qty);
		$.ajax({
			url: '/update-cart/',
			type: 'POST',
			data: {
				'id': id,
				'qty': qty
			},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		}).done((res) => {
			location.reload();
		});
	});

	$('.btn-delete').click(function(){
		let id = $(this).data('id');
		if(confirm("Bạn chắc chắn muốn xóa?")) {
			$.ajax({
				url: '/delete-cart/',
				type: 'POST',
				data: {
					'id': id,
				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			}).done((res) => {
				location.reload();
			});
		}
	});

	$('.btn-delete-all').click(function(){
		let id = $(this).data('id');
		if(confirm("Bạn chắc chắn muốn xóa?")) {
			$.ajax({
				url: '/delete-cart-all/',
				type: 'POST',
				data: {
					'id': id,
				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			}).done((res) => {
				location.reload();
			});
		}
	});
</script>
@endpush