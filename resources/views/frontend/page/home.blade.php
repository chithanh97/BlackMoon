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
@endsection
@push('scripts')
<script>
	$('.list--item__slide').owlCarousel({
		loop: true,
		margin: 10,
		nav: false,
		items: 1,
		autoplay: true,
		lazyLoad: true,
		autoplaySpeed: 1000,
		autoplayHoverPause: true
	})
</script>
@endpush