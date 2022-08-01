<div class="container">
	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="footer-logo">
				<a href="/">
					<img src="{{ $config->logo }}" alt="{{ $config->name }}">
				</a>
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<ul>
				<li></li>
			</ul>
			@if(count($listNews[$i->code]) > 0)
			<ul>
				@foreach($listNews[$i->code] as $j)
				<li><a href="/news/{{ $j->subject }}.html">{{ $j->name }}</a></li>
				@endforeach
			</ul>
			@endif
		</div>
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"></div>
	</div>
</div>