@extends('frontend.index')
@section('title', $news->name)
@section('content')
<div class="newsdetail">
	<div class="container">
		<div class="news--title">
			<h1>{{ $news->name }}</h1>
		</div>
		<div class="news-content">
			<?=$news->detail ?>
		</div>
	</div>
</div>
@endsection