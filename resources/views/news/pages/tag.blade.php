@extends('news.layout.single')
@section('content')
<!-- Posts -->
@if(isset($tag))
@section('title')
| Tag {{ $tag->name}}
@endsection
<h4 class="cat-title mb25">Bài viết theo thẻ {{ $tag->name}}</h4>
<section class="row">
	<!-- Category posts -->
	@foreach($tag->posts as $post)
	<article class="post six column">
		<div class="post-image">
			@if(count($post->files)>0) 
				<?php $image = $post->files[0]->link; ?>
			@else 
				<?php $image = 'http://placehold.it/300x220'; ?>
			@endif
			<a href="post/{{$post->slug}}.html"><img src="{{$image}}" alt="" style="width: 300px;height: 220px;"></a>
		</div>

		<div class="post-container">
			<h2 class="post-title">{{$post->title}}</h2>
			<div class="post-content">
				<p>{{$post->description}}</p>
			</div>
		</div>

		<div class="post-meta">
			<span class="author"><a href="author/{{$post->admin->name}}">{{$post->admin->name}}</a></span>
			<span class="date"><a href="#">{{date('G:i d-m-Y', strtotime($post->created_at)) }}</a></span>
		</div>
	</article>
	@endforeach
@else
	<section class="row">
	<h4 class="cat-title mb25">Bài viết theo thẻ {{ $key}}</h4>
	<article class="post ten column">
		<h3>Không có bài viết nào được tìm thấy.</h3>
	</article>
@section('title')
| Không tìm thấy
@endsection
@endif
	<!-- End Category posts -->
</section>
@endsection