@extends('frontend.index')
@section('title', $item->name)
@section('content')
<div class="items">
	<div class="container">
		<div class="news--title">
			<h1>{{ $item->name }}</h1>
		</div>
		<div class="item-content">
			<div class="row">
				<div class="com-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="thumbnail">
						<img id="proimage" class="img-responsive" itemprop="image" src="{{ getFirstImage($item->image) }}" alt="{{ $item->name }}" data-zoom-image="{{ getFirstImage($item->image) }}" />
					</div>
					<div class="list-thumbs owl-carousel">
						@foreach(json_decode( $item->image ) as $key => $v)
						<div id="thumbnail_{{ $key }}" class="thumb_item" data-src="{{ $v[1] }}">
							<a href="javascript:void(0)" data-imageid="{{ $item->id }}" data-image="{{ $v[1] }}" data-zoom-image="{{ $v[1] }}" title="{{ $item->name }}">
								<img class="img-responsive" id="thumb_{{ $key }}" itemprop="image" data-id="img{{$key}}" src="{{ $v[1] }}" alt="{{ $item->name }}">
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
	// $('#img0').removeClass('hidden');
	// $('.list-thumbs img').click(function(){
	// 	let id = $(this).data('id');
	// 	$('.thumbnail a').addClass('hidden');
	// 	$('#'+id).removeClass('hidden');
	// });
	var loadIcon = "//cdn.shopify.com/s/files/1/0928/4804/t/2/assets/loading.gif?2264549637723899300";
	$("#proimage").ezPlus({

		zoomType: "inner",
		cursor: 'crosshair',

		gallery: 'thumbs_list',
		galleryActiveClass: 'active',
		imageCrossfade: true,
		scrollZoom: true,
		onImageSwapComplete: function() {
			$(".zoomWrapper div").hide()
		},
		loadingIcon: loadIcon
	});
	$("#proimage").bind("click", function(e) {
		var ez = $('#proimage').data('elevateZoom');
		$.fancybox(ez.getGalleryList());
		return false;
	});
</script>
@endpush