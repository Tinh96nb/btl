@extends('news/layout/single')
@section('content')
@if(isset($post))
@section('title')
| {{ $post->title }}
@endsection
	<a href="#" class="featured-img">
		@if(count($post->files)>0) 
			<?php $image = $post->files[0]->link; ?>
		@else 
			<?php $image = 'http://placehold.it/620x375'; ?>
		@endif
		<img src="{{$image}}" alt="">
	</a>
				
				<h1 class="post-title">{{ $post->title }}</h1>

				 {!!  $post->content !!}

				<div class="post-meta">
					<span class="view"><a href="">{{$post->view}} views</a></span>
					<span class="author"><a href="#">{{ $post->admin->name }}</a></span>
					<span class="date"><a href="">{{date('F d,Y', strtotime($post->created_at)) }}</a></span>
					<li class="widget widget_tag_cloud clearfix">
						<div class="tagcloud">
							@foreach($post->tags as $tag)
								<a href="tag/{{ $tag->name }}" title="3 topics" style="font-size: 22pt;">{{ $tag->name }}</a>
							@endforeach
						</div>
					</li>
				</div>

				<div class="social-media clearfix">
					<ul>
						<li class="twitter">
							<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.nextwpthemes.com/" data-text="">Tweet</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
						</li>
						<li class="facebook">
							<script>(function(d, s, id) {
							  var js, fjs = d.getElementsByTagName(s)[0];
							  if (d.getElementById(id)) return;
							  js = d.createElement(s); js.id = id;
							  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
							  fjs.parentNode.insertBefore(js, fjs);
							}(document, 'script', 'facebook-jssdk'));
							</script>

							<div class="fb-like" data-href="http://www.nextwpthemes.com/" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>
						</li>
						<li class="google_plus">
							<!-- Place this tag where you want the +1 button to render. -->
							<div class="g-plusone" data-size="medium"></div>

							<!-- Place this tag after the last +1 button tag. -->
							<script type="text/javascript">
							  (function() {
								var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
								po.src = 'https://apis.google.com/js/plusone.js';
								var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
							  })();
							</script>
						</li>
					</ul>
				</div>

				<div class="clear"></div>

				<div class="line"></div>

				<h4 class="post-title">Bình Luận</h4>
				<script>(function(d, s, id) {
                  var js, fjs = d.getElementsByTagName(s)[0];
                  if (d.getElementById(id)) return;
                  js = d.createElement(s); js.id = id;
                  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=863868720428280";
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-comments" data-href="http://localhost/post/{{$post->title}}" data-numposts="5" data-width="100%"></div>
				<br>
@else
<section class="row">
	<article class="post ten column">
		<h3>Bài viết không tồn tại.</h3>
	</article>
</section>
@section('title')
| Không tìm thấy
@endsection
@endif
@endsection