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
						<img src="{{getFirstImage($item->image)}}" alt="{{ $item->name }}">
					</div>
					<div class="list-thumbs">
						<ul>
							@foreach(json_decode( $item->image ) as $v)
							<li>
								<img src="{{ $v[1] }}" alt="{{ $item->name }}">
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection