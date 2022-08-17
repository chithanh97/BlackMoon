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
										<label class="label label-success">{{ getStatusOrder()[$v->status] }}</label>
									</td>
									<td>
										<label class="label label-info">{{ getPayMethod()[$v->pay_method] }}</label>
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
<div class="row">
	<div class="col-sm-4 grid-margin">
		<div class="card">
			<div class="card-body">
				<h5>Revenue</h5>
				<div class="row">
					<div class="col-8 col-sm-12 col-xl-8 my-auto">
						<div class="d-flex d-sm-block d-md-flex align-items-center">
							<h2 class="mb-0">$32123</h2>
							<p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
						</div>
						<h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
					</div>
					<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
						<i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-4 grid-margin">
		<div class="card">
			<div class="card-body">
				<h5>Sales</h5>
				<div class="row">
					<div class="col-8 col-sm-12 col-xl-8 my-auto">
						<div class="d-flex d-sm-block d-md-flex align-items-center">
							<h2 class="mb-0">$45850</h2>
							<p class="text-success ml-2 mb-0 font-weight-medium">+8.3%</p>
						</div>
						<h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
					</div>
					<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
						<i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-4 grid-margin">
		<div class="card">
			<div class="card-body">
				<h5>Purchase</h5>
				<div class="row">
					<div class="col-8 col-sm-12 col-xl-8 my-auto">
						<div class="d-flex d-sm-block d-md-flex align-items-center">
							<h2 class="mb-0">$2039</h2>
							<p class="text-danger ml-2 mb-0 font-weight-medium">-2.1% </p>
						</div>
						<h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
					</div>
					<div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
						<i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
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
				<h4 class="card-title">Visitors by Countries</h4>
				<div class="row">
					<div class="col-md-5">
						<div class="table-responsive">
							<table class="table">
								<tbody>
									<tr>
										<td>
										</td>
										<td>USA</td>
										<td class="text-right"> 1500 </td>
										<td class="text-right font-weight-medium"> 56.35% </td>
									</tr>
									<tr>
										<td>
										</td>
										<td>Germany</td>
										<td class="text-right"> 800 </td>
										<td class="text-right font-weight-medium"> 33.25% </td>
									</tr>
									<tr>
										<td>
										</td>
										<td>Australia</td>
										<td class="text-right"> 760 </td>
										<td class="text-right font-weight-medium"> 15.45% </td>
									</tr>
									<tr>
										<td>
										</td>
										<td>United Kingdom</td>
										<td class="text-right"> 450 </td>
										<td class="text-right font-weight-medium"> 25.00% </td>
									</tr>
									<tr>
										<td>
										</td>
										<td>Romania</td>
										<td class="text-right"> 620 </td>
										<td class="text-right font-weight-medium"> 10.25% </td>
									</tr>
									<tr>
										<td>
										</td>
										<td>Brasil</td>
										<td class="text-right"> 230 </td>
										<td class="text-right font-weight-medium"> 75.00% </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-md-7">
						<div id="audience-map" class="vector-map"></div>
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
</script>
@endpush