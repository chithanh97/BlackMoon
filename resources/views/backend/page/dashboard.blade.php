@extends('backend.index')
@section('title', 'Dashboard')
@push('styles')
<style>
	.order-table{
		margin-top: 15px;
	}
	.order-table p{
		margin-bottom: 0;
		color: #6c7293;
	}
	.order-table thead td{
		font-weight: bold;
	}
	.order-table tbody td:last-child{
		text-align: center;
	}
	.product__image > div{
		padding-bottom: 100%;
		position: relative;
	}
	.product__image img{
		width: 100%;
		position: absolute;
		left: 0;
		top: 0;
		object-fit: cover;
	}
</style>
@endpush
@section('content')
<div class="row">
	<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-9">
						<div class="d-flex align-items-center align-self-start">
							<h3 class="mb-0">{{ $data->order }}</h3>
						</div>
					</div>
					<div class="col-3">
						<div class="icon icon-box-success ">
							<span class="mdi mdi-cart icon-item"></span>
						</div>
					</div>
				</div>
				<a href="{{ route('order') }}"><h6 class="text-muted font-weight-normal">Đơn hàng</h6></a>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-9">
						<div class="d-flex align-items-center align-self-start">
							<h3 class="mb-0">{{ $data->countItem }}</h3>
						</div>
					</div>
					<div class="col-3">
						<div class="icon icon-box-success">
							<span class="mdi mdi-image-filter icon-item"></span>
						</div>
					</div>
				</div>
				<a href="{{ route('items') }}"><h6 class="text-muted font-weight-normal">Sản phẩm mới</h6></a>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-9">
						<div class="d-flex align-items-center align-self-start">
							<h3 class="mb-0">{{ $data->countNews }}</h3>
						</div>
					</div>
					<div class="col-3">
						<div class="icon icon-box-danger">
							<span class="mdi mdi-clipboard-text icon-item"></span>
						</div>
					</div>
				</div>
				<a href="{{ route('news') }}"><h6 class="text-muted font-weight-normal">Bài viết mới</h6></a>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-sm-6 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-9">
						<div class="d-flex align-items-center align-self-start">
							<h3 class="mb-0">{{ formatNumberMoney($data->total) }}</h3>
						</div>
					</div>
					<div class="col-3">
						<div class="icon icon-box-success ">
							<span class="mdi mdi-cash-multiple icon-item"></span>
						</div>
					</div>
				</div>
				<h6 class="text-muted font-weight-normal">Doanh thu</h6>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-4 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Phương thức thanh toán</h4>
				<canvas id="transaction-history" class="transaction-chart"></canvas>
				<div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
					<div class="text-md-center text-xl-left">
						<h6 class="mb-1">Thanh toán COD</h6>
					</div>
					<div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
						<h6 class="font-weight-bold mb-0">{{ formatNumberMoney($data->countCOD) }}</h6>
					</div>
				</div>
				<div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
					<div class="text-md-center text-xl-left">
						<h6 class="mb-1">Thanh toán MoMo</h6>
					</div>
					<div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
						<h6 class="font-weight-bold mb-0">{{ formatNumberMoney($data->countMoMo) }}</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-8 grid-margin stretch-card">
		<div class="card">
			<div class="card-body">
				<div class="d-flex flex-row justify-content-between">
					<h4 class="card-title mb-1">Đơn hàng</h4>
				</div>
				<div class="row">
					<div class="col-12">
						<table class="table-bordered order-table table">
							<thead>
								<tr>
									<td>Mã đơn</td>
									<td>Thông tin</td>
									<td>Giá trị đơn</td>
									<td>Trạng thái</td>
									<td>Phương thức thanh toán</td>
									<td>Tùy chọn</td>
								</tr>
							</thead>
							<tbody>
								@foreach( $data->litsOrder as $v)
								<tr>
									<td>{{ $v->order_code }}</td>
									<td>
										<p>Họ tên: {{ $v->name }}</p>
										<p>Số điện thoại: {{ $v->phone }}</p>
									</td>
									<td>
										{{ formatNumberMoney($v->total) }}
									</td>
									<td>
										<div class="btn btn-success">{{ getStatusOrder()[$v->status] }}</div>
									</td>
									<td>
										<div class="btn btn-primary">{{ getPayMethod()[$v->pay_method] }}</div>
									</td>
									<td>
										<a class="btn btn-primary" href="{{ route('order.view', $v->id) }}"><i class="fa fa-eye"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row product">
	<div class="col-sm-4 grid-margin">
		<div class="card">
			<div class="card-body">
				<h5>Sản phẩm bán chạy nhất</h5>
				<div class="row">
					<div class="col-8 col-sm-12 col-xl-8 my-auto">
						<div class="d-flex d-sm-block d-md-flex align-items-center">
							<h2 class="mb-0">{{ $data->itemBuy->name }}</h2>
						</div>
						<h6 class="text-muted font-weight-normal">Tổng lượt bán: {{ $data->itemBuy->buy }}</h6>
					</div>
					<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right product__image">
						<div>
							<img src="{{ getFirstImage($data->itemBuy->image) }}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-4 grid-margin">
		<div class="card">
			<div class="card-body">
				<h5>Sản phẩm xem nhiều nhất</h5>
				<div class="row">
					<div class="col-8 col-sm-12 col-xl-8 my-auto">
						<div class="d-flex d-sm-block d-md-flex align-items-center">
							<h2 class="mb-0">{{ $data->itemView->name }}</h2>
						</div>
						<h6 class="text-muted font-weight-normal">Tổng lượt xem: {{ $data->itemBuy->view }}</h6>
					</div>
					<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right product__image">
						<div>
							<img src="{{ getFirstImage($data->itemView->image) }}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-4 grid-margin">
		<div class="card">
			<div class="card-body">
				<h5>Sản phẩm mới nhất</h5>
				<div class="row">
					<div class="col-8 col-sm-12 col-xl-8 my-auto">
						<div class="d-flex d-sm-block d-md-flex align-items-center">
							<h2 class="mb-0">{{ $data->itemNew->name }}</h2>
						</div>
						<h6 class="text-muted font-weight-normal">Ngày đăng: {{ date_format($data->itemBuy->created_at, 'd-m-Y') }}</h6>
					</div>
					<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right product__image">
						<div>
							<img src="{{ getFirstImage($data->itemNew->image) }}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">Biểu đồ đơn hàng trong tháng</h4>
				<div class="row">
					<div class="col-md-12">
						<canvas id="audience-map" class="vector-map"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
	if ($("#transaction-history").length) {
		var areaData = {
			labels: ["COD", "MoMo"],
			datasets: [{
				data: [{{ $data->countCOD }}, {{ $data->countMoMo }}],
				backgroundColor: [
				"violet","#111111"
				]
			}
			]
		};
		var areaOptions = {
			responsive: true,
			maintainAspectRatio: true,
			segmentShowStroke: false,
			cutoutPercentage: 70,
			elements: {
				arc: {
					borderWidth: 0
				}
			},
			legend: {
				display: false
			},
			tooltips: {
				enabled: true,
				callbacks: {
					title: function(tooltipItem, data) {
						return data['labels'][tooltipItem[0]['index']];
					},
					label: function(tooltipItem, data) {
						return data['datasets'][0]['data'][tooltipItem['index']].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+'đ';
					},
					afterLabel: function(tooltipItem, data) {
						var dataset = data['datasets'][0];
						var percent = Math.round((dataset['data'][tooltipItem['index']] / dataset["_meta"][0]['total']) * 100)
						return '(' + percent + '%)';
					}
				},
			}
		}
		var transactionhistoryChartPlugins = {
			beforeDraw: function(chart) {
				var width = chart.chart.width,
				height = chart.chart.height,
				ctx = chart.chart.ctx;

				ctx.restore();
				var fontSize = 1;
				ctx.font = fontSize + "rem sans-serif";
				ctx.textAlign = 'left';
				ctx.textBaseline = "middle";
				ctx.fillStyle = "#ffffff";

				var text = "{{ formatNumberMoney($data->total) }}",
				textX = Math.round((width - ctx.measureText(text).width) / 2),
				textY = height / 2.4;

				ctx.fillText(text, textX, textY);

				ctx.restore();
				var fontSize = 0.75;
				ctx.font = fontSize + "rem sans-serif";
				ctx.textAlign = 'left';
				ctx.textBaseline = "middle";
				ctx.fillStyle = "#6c7293";

				var texts = "Doanh thu",
				textsX = Math.round((width - ctx.measureText(text).width) / 2),
				textsY = height / 1.7;

				ctx.fillText(texts, textsX, textsY);
				ctx.save();
			}
		}
		var transactionhistoryChartCanvas = $("#transaction-history").get(0).getContext("2d");
		var transactionhistoryChart = new Chart(transactionhistoryChartCanvas, {
			type: 'doughnut',
			data: areaData,
			options: areaOptions,
			plugins: transactionhistoryChartPlugins
		});
	}

	const getDays = () => {
		let d = new Date();
		let month = d.getMonth();
		let year = d.getFullYear();
		let date = new Date(`${year}-${parseInt(month)+1}-01`);
		let days = [];
		while (date.getMonth() === parseInt(month)) {
			days.push(`${date.getDate()}-${month+1}-${year}`);
			date.setDate(date.getDate() + 1);
		}
		return days;
	}

	const data = {
		labels: getDays(),
		datasets: [{
			label: 'Số đơn hàng',
			data: {{ json_encode($data->listDataMonth) }},
			backgroundColor: '#00d25b',
			borderWidth: 1
		}]
	};
	var transactionhistoryChartCanvas = $("#audience-map").get(0).getContext("2d");
	var transactionhistoryChart = new Chart(transactionhistoryChartCanvas, {
		type: 'bar',
		data: data,
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});
</script>
@endpush