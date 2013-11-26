<html>
	<head>
		<title>{{ $domain->title }}</title>
		<meta charset="UTF-8">
		<meta name="keywords" content="{{ $domain->keyword}}">
		<meta name="description" content="{{ $domain->keyword }}">
		<link rel="shortcut icon" href="{{ asset('/images/dashboard/favicon.ico') }}" type="image/x-icon">
		<link href="{{ asset($cssLinks['header']) }}" rel="stylesheet" type="text/css" media="screen">
		<link href="{{ asset($cssLinks['home']) }}" rel="stylesheet" type="text/css" media="screen">
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
			<div class="bookmarker_block">
				<div id="heading">
					{{ $domain->heading}}
				</div>
				<div id="intro">
					{{ $domain->description }}
				</div>
				<div class="booker_list">
					<ul>
						@for($i=1;$i<=$domain->template_id;$i++)
							<li class="booker_item @if($i==3 && $domain->template_id==5)featured @endif" onclick="window.location='http://google.com.vn'">
								<div class="booker_logo">
									<img src="{{ asset('/layout/core/images/booker_'.$i.'.png') }}"/>
								</div>
								<div class="booker_bonus">
									<ul id="bonus_list">
										<li>
											@if($i==3 && $domain->template_id==5)
												<img class="currency" src="{{ asset('/layout/core/images/featured_currency.png') }}"/></li>
											@else
												<img class="currency" src="{{ asset('/layout/core/images/currency.png') }}"/></li>
											@endif
										<li>
											<span class="bonus">450</span>
										</li>
										<li>
											<span class="label">bonus bet</span>
										</li>
									</ul>
								</div>
								<div class="booker_description">
									 Put An Extra $500 Bucks Behind Your Favourite!  
								</div>
								<ul class="description_list">
									<li>
										Simple on registeration
									</li>
									<li>
										Double on first deposist
									</li>
									<li>
										Easy to bet
									</li>
									<li>
										Many bonus and benefit
									</li>
								</ul>
								<div class="claim_submit claim_{{$i}}">
									<span>Claim Bonus!</span>
								</div>
							</li>
						@endfor						
					</ul>
				</div>
			</div>
			<div class="article">
				<table cellspacing="20">
					@if(count($articles)>0)
						@foreach($articles as $key => $article)
							@if($key==0 || $key%$domain->article_columns == 0)
							<tr>
							@endif
								<td class="@if($domain->article_columns == 2) two_column @else one_column @endif">
									<div class="article_title">
										<a href="{{URL::route('article', array('article'=>$article->label))}}" title="{{ $article->title }}">{{ $article->title }}</a>
									</div>
									<div class="article_image">
										@if($article->cover_image)
											<img src="{{ asset($article->cover_image) }}"/>
										@else
											<img src="{{ asset('/layout/core/images/article_image_'.(($article->id)%2+1).'.png') }}"/>
										@endif
									</div>
									<div class="article_description">
										{{ $article->description }}
									</div>
									<div class="article_content">
										{{ str_replace('\n','<br>', $article->short_content) }}</span>
									</div>
									<div class="viewmore">
										<a href="{{URL::route('article', array('article'=>$article->label))}}"><img src="{{ asset('/layout/core/images/blank.png')}}"/></a>
									</div>
								</td>
								@if($domain->article_columns == 2 && count($articles) == 1)
									<td class="two_column"></td>
								@endif
							@if(($key+1)%$domain->article_columns == 0 || $key == count($articles)-1)
							</tr>
							@endif
							
						@endforeach
					@endif
				</table>
			</div>
			<div class="next_site"></div>
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