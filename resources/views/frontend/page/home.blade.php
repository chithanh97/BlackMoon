@extends('frontend.index')
@section('title', 'Trang chủ')
@section('content')
<section class="slide">
	<div class="list--item__slide owl-carousel">
		@foreach($slide as $item)
		<div class="item-slide">
			<img src="{{ $item->image }}" alt="{{ $item->name }}">
		</div>
		@endforeach
	</div>
</section>
<section class="product">
	<div class="container">
		@if(count($itemCateHot) > 0)
		@foreach($itemCateHot as $i)
		<div class="list--item">
			<div class="title">
				<h3>{{ $i->name }}</h3>
			</div>
			@if(count($listItem[$i->code]) > 0)
			<div class="list--item__product">
				<div class="row">
					@foreach($listItem[$i->code] as $j)
					<div class="item col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="item__content">
							<a href="/items/{{ $j->subject }}.html">
								<div class="item__img">
									<img src="{{ getFirstImage($j->image) }}" alt="{{ $j->name }}">
								</div>
							</a>
							<div class="item__detail">
								<h4 class="item__name"><a href="/items/{{ $j->subject }}.html">{{ $j->name }}</a></h4>
								<?=getPrice($j) ?>
								<button class="btn-buy button-buy"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Mua ngay</button>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			@endif
		</div>
		@endforeach
		@endif
	</div>
</section>
<section class="news">
	<div class="container">
		@if(count($newsCateHot) > 0)
		@foreach($newsCateHot as $i)
		<div class="list--news">
			<div class="title">
				<h3>{{ $i->name }}</h3>
			</div>
			@if(count($listNews[$i->code]) > 0)
			<div class="list--news__product">
				<div class="row">
					@foreach($listNews[$i->code] as $j)
					<div class="news col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="news__content">
							<a href="/news/{{ $j->subject }}.html">
								<div class="news__img">
									<img src="{{ $j->image }}" alt="{{ $j->name }}">
								</div>
								<div class="news__detail">
									<h4 class="news__name">{{ $j->name }}</h4>
									<div class="news__">
										{{ $j->detail_short }}
									</div>
								</div>
							</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			@endif
		</div>
		@endforeach
		@endif
	</div>
</section>
@endsection