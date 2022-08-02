@extends('frontend.index')
@section('title', $category->name)
@section('content')
<div class="newscategory">
	<div class="container">
		<div class="list--news">
			<div class="title">
				<h1>{{ $category->name }}</h1>
			</div>
			<div class="content">
				<div class="row">
				@foreach($listNews as $value)
				<div class="news col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="news__content">
							<a href="/news/{{ $value->subject }}.html">
								<div class="news__img">
									<img src="{{ $value->image }}" alt="{{ $value->name }}">
								</div>
								<div class="news__detail">
									<h4 class="news__name">{{ $value->name }}</h4>
									<div class="news__">
										{{ $value->detail_short }}
									</div>
								</div>
							</a>
						</div>
					</div>
				@endforeach
			</div>
			</div>
		</div>
	</div>
</div>
@endsection