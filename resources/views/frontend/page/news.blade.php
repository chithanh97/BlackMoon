@extends('frontend.index')
@section('title', $news->name)
@section('description', $news->description)
@section('o_title', $news->title)
@section('image', $news->image)
@section('type', 'article')
@section('url', $_SERVER['SERVER_NAME'].'/'.$news->subject.'.html')
@section('content')
<div class="newsdetail">
	<div class="container">
		<div class="head">
			<div class="date">
				<span class="day">12</span>
				<span class="month">6</span>
				<span class="year">2022</span>
			</div>
			<div class="news--title">
				<h1>{{ $news->name }}</h1>
			</div>
		</div>
		<div class="news-content">
			<?=$news->detail ?>
			<div class="share-link">
				<ul class="social-sharing list-unstyled">
					<li>
						<a class="btn btn-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=getCurrentPageURL();?>" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;">
							<i class="fa fa-facebook"></i> Facebook
						</a>
					</li>
					<li>
						<a class="btn btn-twitter" target="_blank" href="https://twitter.com/intent/tweet?text={{ $news->name }}&amp;url=<?=getCurrentPageURL();?>&amp;" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;">
							<i class="fa fa-twitter"></i> Twitter
						</a>
					</li>
					<li>
						<a class="btn btn-pinterest" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?=getCurrentPageURL();?>&amp;description=<?=strip_tags($news->detail_short);?>&amp;media=<?=$news->image?>" title="" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;">
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
	</div>
</div>
@endsection