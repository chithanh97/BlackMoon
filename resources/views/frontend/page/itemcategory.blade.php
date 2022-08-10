@extends('frontend.index')
@section('title', isset($category) ? $category->name : 'Sản phẩm')
@section('content')
<div class="newscategory">
	<div class="container">
		<div class="list--news">
			<div class="title">
				<h1>{{ isset($category) ? $category->name : 'Sản phẩm' }}</h1>
			</div>
			<div class="content">
				<div class="row">
					@foreach($listItems as $value)
					<div class="item col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="item__content">
							<a href="/items/{{ $value->subject }}.html">
								<div class="item__img">
									<img src="{{ getFirstImage($value->image) }}" alt="{{ $value->name }}">
								</div>
							</a>
							<div class="item__detail">
								<h4 class="item__name"><a href="/items/{{ $value->subject }}.html">{{ $value->name }}</a></h4>
								<?=getPrice($value) ?>
								<button data-id="{{ $value->id }}" class="btn-buy button-buy"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Mua ngay</button>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
		<div class="navigation">
			{{ $listItems->links("pagination::bootstrap-4") }}
		</div>
	</div>
</div>
@endsection