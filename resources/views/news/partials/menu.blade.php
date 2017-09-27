<!-- Menu -->
<header class="clearfix">
	<nav id="main-menu" class="left navigation">
		<ul class="sf-menu no-bullet inline-list m0">
			<li><a href="index.html" class="active">Home</a></li>
			@foreach ($categories as $cate)

				<li>
					<a href="#">{{ $cate->name }}</a>
	    		</li>

			@endforeach
    		<li><a href="#">Single Post</a>
    			<ul class="sub-menu">
					<li><a href="singlepost-right-sidebar.html">Right Sidebar</a></li>
					<li><a href="singlepost-left-sidebar.html">Left Sidebar</a></li>
					<li><a href="singlepost-without-sidebar.html">Without Sidebar</a></li>
				</ul>
    		</li>
    		<li><a href="#">Pages</a>
    			<ul class="sub-menu">
					<li><a href="typography.html">Typography</a></li>
					<li><a href="video.html">Videos</a></li>
					<li><a href="404.html">Error 404</a></li>
					<li><a href="underconstruction.html">Underconstruction</a></li>
				</ul>
    		</li>
    		<li><a href="shortcodes.html">Shortcodes</a></li>
    		<li><a href="#">Features</a>
    			<ul class="sub-menu">
    				<li><a href="gallery.html">Gallery</a></li>
					<li><a href="#">Videos</a>
						<ul class="sub-menu">
							<li><a href="youtube.html">Youtube</a></li>
							<li><a href="vimeo.html">Vimeo</a></li>
						</ul>
					</li>
				</ul>
    		</li>
    		<li><a href="contact.html">Contact</a></li>
		</ul>
	</nav>

	<div class="search-bar right clearfix">
		<form action="http://www.example.com">
			<input name="s" type="text" data-value="search" value="search">
			<input name="submit" type="submit" value="">
		</form>
	</div>
</header>
