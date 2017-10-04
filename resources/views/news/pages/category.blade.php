@extends('news.layout.single')

@section('content')
<!-- Posts -->
@if(isset($cate))
<h4 class="cat-title mb25">{{ $cate->name}}</h4>
@section('title')
| {{ $cate->name}}
@endsection
<section class="row">
	<!-- Category posts -->
	@foreach($cate->posts as $post)
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
			<span class="view"><a href="">{{$post->view}} views</a></span>
			<span class="author"><a href="author/{{$post->admin->name}}">{{$post->admin->name}}</a></span>
			<span class="date"><a href="#">{{date('G:i d-m-Y', strtotime($post->created_at)) }}</a></span>
		</div>
	</article>
	@endforeach
	<!-- End Category posts -->
</section>
@else
<section class="row">
	<h4 class="cat-title mb25">Chuyên Mục {{ $key}}</h4>
	<article class="post ten column">
		<h3>Không có bài viết nào được tìm thấy.</h3>
	</article>
</section>
@section('title')
| Không có bài viết
@endsection
@endif
@endsection