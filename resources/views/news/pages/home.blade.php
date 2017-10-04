@extends('news.layout.layout')

@section('content')
<section class="row">
	<!-- Category posts -->
	@foreach($cates as $cate)
		<article class="six column">
			<h4 class="cat-title"><a href="#">{{ $cate->name }} ( {{ $cate->posts->where('status',1)->count() }} )</a></h4>
			<?php 
				$posts = $cate->posts->where('status',1)->sortByDesc('created_at')->take(4);
				$post_1 = $posts->shift();
			?>
				<div class="post-image">
					@if(count($post_1->files)>0) 
						<?php $image = $post_1->files[0]->link; ?>
					@else 
						<?php $image = 'http://placehold.it/300x220'; ?>
					@endif
					<a href="post/{{$post_1->slug}}.html"><img src="{{ $image }}" alt="" style="width:300px;height:220px"></a>
				</div>
				<div class="post-container">
					<h2 class="post-title">{{ $post_1->title }}</h2>
					<div class="post-content">
						<p>{{ $post_1->description }}</p>
					</div>
				</div>
				<div class="post-meta">
					<span class="view"><a href="post/{{$post_1->slug}}.html">{{ $post_1->view }} views</a></span>
					<span class="author"><a href="author/{{ $post_1->admin->name }}">{{ $post_1->admin->name }}</a></span>
					<span class="date"><a href="#">{{date('G:i d-m-Y', strtotime($post_1->created_at)) }}</a></span>
				</div>
				@foreach( $posts->all() as $post)
				<div class="other-posts">
					<ul class="no-bullet">
						<li>
							@if(count($post->files)>0) 
								<?php $image = $post->files[0]->link; ?>
							@else 
								<?php $image = 'http://placehold.it/50x50'; ?>
							@endif
							<a href="#"><img src="{{$image}}" alt="image" style="width:50px;height:50px"></a>
							<h3 class="post-title"><a href="post/{{$post['slug'] }}.html">{{$post['title'] }}</a></h3>
							<span class="date"><a href="#">{{date('G:i d-m-Y', strtotime($post['created_at'])) }}</a></span>
						</li>
					</ul>
				</div>
				@endforeach
		</article>
	@endforeach
</section>
<!-- End Carousel Posts -->
<!-- Gallery Posts -->
<div class="clearfix mb25 oh">
	<h4 class="cat-title">Tin video</h4>
	<!-- jCarousel -->
	<div class="carousel-container">
		<div class="carousel-navigation">
			<a class="carousel-prev"></a>
			<a class="carousel-next"></a>
		</div>
		<div class="carousel-item-holder gallery row" data-index="0">
			@foreach( $videos as $video)
			<div class="four column carousel-item">
				<a href="#"><img src="http://placehold.it/300x250" alt=""></a>
			</div>
			<div class="four column carousel-item">
				<a href="#"><img src="http://placehold.it/300x250" alt=""></a>
			</div>
			@endforeach
		</div>
	</div>
	<!-- End jCarousel -->
</div>
<!-- End Gallery Posts -->
@endsection