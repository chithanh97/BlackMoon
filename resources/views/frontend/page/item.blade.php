@extends('frontend.index')
@section('title', $item->name)
@section('content')
<div class="items">
	<div class="container">
		<div class="item-content">
			<div class="row">
				<div class="com-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="thumbnail">
						@foreach(json_decode( $item->image ) as $key => $v)
						<a href="{{ $v[1] }}" class="fancybox hidden" data-fancybox="gallery" id="thumb_{{ $key }}">
							<img class="img-responsive item-zoom" itemprop="image" src="{{ $v[1] }}" alt="{{ $item->name }}" data-zoom-image="{{ $v[1] }}" />
						</a>
						@endforeach
					</div>
					<div class="list-thumbs owl-carousel">
						@foreach(json_decode( $item->image ) as $key => $v)
						<div id="thumbnail_{{ $key }}" class="thumb_item" data-src="{{ $v[1] }}">
							<a class=""  href="javascript:void(0)" title="{{ $item->name }}">
								<img class="img-responsive" id="thumb_{{ $key }}" itemprop="image" data-id="thumb_{{$key}}" src="{{ $v[1] }}" alt="{{ $item->name }}">
							</a>
						</div>
						@endforeach
					</div>
				</div>
				<div class="com-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="item--title">
						<h1>{{ $item->name }}</h1>
					</div>
					<div class="short-detail">
						{{$item->detail_short}}
					</div>
					<div class="price-item">
						<?=getPrice($item) ?>
					</div>
					<div class="add-cart">
						<div class="quantity">
							<input id="qty" name="qty" type="number" min="1" max="100" step="1" value="1">
						</div>
						<button data-id="{{ $item->id }}" name="addtocart" class="btn btn-primary addtocart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào giỏ</button>
						<button data-id="{{ $item->id }}" name="buynow" class="btn btn-info button-buy"><i class="fa fa-list-alt" aria-hidden="true"></i> Mua ngay</button>
					</div>
					<div class="share-link">
						<ul class="social-sharing list-unstyled">
							<li>
								<a class="btn btn-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=getCurrentPageURL();?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;">
									<i class="fa fa-facebook"></i> Facebook
								</a>
							</li>
							<li>
								<a class="btn btn-twitter" target="_blank" href="https://twitter.com/intent/tweet?text={{ $item->name }}&amp;url=<?=getCurrentPageURL();?>&amp;" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;">
									<i class="fa fa-twitter"></i> Twitter
								</a>
							</li>
							<li>
								<a class="btn btn-pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?=getCurrentPageURL();?>&amp;description=<?=strip_tags($item->detail_short);?>&amp;media=<?=$item->image?>" title="" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;">
									<i class="fa fa-pinterest-p"></i> Pinterest
								</a>
							</li>
							<li>
								<a class="btn btn-linkedin" target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?=URL::current();?>" title="" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;">
									<i class="fa fa-linkedin"></i> Linkedin
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-12" id="myTab">
					<ul class="nav nav-tabs"  role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="home" aria-selected="true">Chi tiết</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="comment-tab" data-toggle="tab" href="#comment" role="tab" aria-controls="comment" aria-selected="false">Bình luận</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail">
							<?=$item->detail ?>
						</div>
						<div class="tab-pane fade" id="comment" role="tabpanel" aria-labelledby="comment">
							<div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-width="100%" data-numposts="5" data-colorscheme="light"></div>
						</div>
					</div>
				</div>
				<div class="col-lg-12 product-similar">
					<div class="title">
						<h3>Sản phẩm liên quan</h3>
					</div>
					<div class="list-similar owl-carousel">
						@foreach($listItems as $j)
						<div class="item">
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
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
	$('#thumb_0').removeClass('hidden');
	$('.list-thumbs img').click(function(){
		let id = $(this).data('id');
		$('.fancybox').addClass('hidden');
		$('#'+id).removeClass('hidden');
	});

	$('.addtocart').click(function(){
		let id = $(this).data('id');
		let qty = $('#qty').val();
		$('.show-cart').removeClass('animation-cart');
		$.ajax({
			url: '/add-cart/',
			type: 'POST',
			data: {
				'id' : id,
				'qty' : qty,
			},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		}).done((res) => {
			if(parseInt(res) > parseInt($('.count-cart').text())){
				$('.count-cart').text(res);
				$('.show-cart').addClass('animation-cart');
				setTimeout(()=>{$('.show-cart').removeClass('animation-cart');}, 500);
			} else {
				alert('Có lỗi trong quá trình thêm vào!');
			}
		});
	});
</script>

@endpush
@push('styles')
<style>
	#proimage{
		position: relative!important;
	}
</style>
@endpush