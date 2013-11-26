<html>
	<head>
		<title>{{$domain->title}} - {{$article->title}}</title>
		<meta charset="UTF-8">
		<meta name="keywords" content="{{ $domain->keyword }}">
		<meta name="description" content="{{ $domain->keyword }}">
		<link rel="shortcut icon" href="{{ asset('/images/dashboard/favicon.ico') }}" type="image/x-icon">
		<link href="{{ asset($cssLinks['header']) }}" rel="stylesheet" type="text/css" media="screen">
		<link href="{{ asset($cssLinks['article']) }}" rel="stylesheet" type="text/css" media="screen">
		<link href="{{ asset($cssLinks['footer']) }}" rel="stylesheet" type="text/css" media="screen">
		<?php /**TODO place google ga code here **/ ?>
	</head>
	<body>
		<!-- Header -->
		<div class="header">
			<!-- Logo -->
			<div class="site_logo">
				<a href="http://{{ $domain->name }}">
					<img src="{{ asset('/layout/core/images/logo.png') }}"/>
				</a>
			</div>
			<!-- Domain Name -->
			<div class="domain_name">
					<a href="http://{{ $domain->name }}">{{ $domain->name}}</a>
			</div>
		</div>
		<!-- Content Warpper -->
		<div class="content_wrapper">
			<div id="ads">
				<img src="{{ asset('/layout/core/images/default_ad.png')}}"/>
			</div>
			<div id="article_title">
				{{ $article->title }}
			</div>
			<div id="article_content">
				<div class="cover_image">
					@if($article->cover_image)
						<img src="{{ asset($article->cover_image) }}"/>
					@else
						<img src="{{ asset('/layout/core/images/article_image_'.($article->id%2+1).'.png') }}"/>
					@endif
				</div>
				<div class="description">
					{{ $article->description }}
				</div>
				<div class="content">
					{{ $article->content }}
				</div>
			</div>
			<div id="bookmarker_list">
				<ul>
					@for($i=1;$i<=5;$i++)
					<li class="booker_item">
						<div class="booker_logo">
							<img src="{{ asset('/layout/core/images/article_booker_'.$i.'.png') }}"/>
						</div>
						<div class="booker_bonus">
								<img class="currency" src="{{ asset('/layout/core/images/currency.png') }}">
								<span class="bonus">450</span>
								<br/>
								<span class="label">bonus bet !</span>					
						</div>
						<div class="claim_submit submit_{{$i}}">
								<span>BET NOW</span>
						</div>
					</li>
					@endfor
				</ul>
			</div>
		</div>
		<!-- Footer -->
		<div class="footer">
			<!-- Logo -->
			<div class="left">
				<div class="site_logo">
					<a href="http://{{ $domain->name }}">
						<img src="{{ asset('/layout/core/images/logo.png') }}"/>
					</a>
				</div>
				<div class="copyright">
					<p>Copyright © 2013 {{ $domain->name }} and Gambling.com.au PTY LTD.</p>
					<p>All images and logos remain the property of the copyright holders at all times.</p>
				</div>
				
			</div>
			<!-- Domain Name -->
			<div class="right">
				<div class ="social">
					
				</div>
				<div class ="contact_privacy">
					<a href="#">Contact Us</a>
					|
					<a href="#">Privacy Policy</a>
					|
					<a href="#">Term of Service</a>
				</div>
			</div>
		</div>
	</body>
</html>