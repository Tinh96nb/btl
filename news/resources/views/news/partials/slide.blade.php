<div class="flexslider mb25">
	<ul class="slides no-bullet inline-list m0">
        @foreach($posts as $post)
		<li>
     		<a href="post/{{ $post->slug }}.html">
                <img alt="{{ $post->files[0]->name }}" src="{{ $post->files[0]->link }}"> 
            </a>                    
     		<div class="flex-caption">
                <div class="desc">
                	<h1><a href="post/{{ $post->slug }}.html">{{ $post->title }}</a></h1>
                	<p>{{ $post->description }}</p>
                </div>
            </div>
		</li>
		@endforeach
	</ul>
</div>