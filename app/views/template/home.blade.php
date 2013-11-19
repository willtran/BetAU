<html>
	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="{{ $domain->keyword}}">
		<meta name="description" content="{{ $domain->keyword }}">
		<link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}" type="image/x-icon">
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
				<a href="#">
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
					@if($domain->article_columns == 2)
					<tr>
						<td class="two_column">
							<div class="article_title">
								<a href="#">ACT Horse Racing</a>
							</div>
							<div class="article_image">
								<img src="{{ asset('/layout/core/images/article_image.png') }}"/>
							</div>
							<div class="article_description">
								Placing bets on ACT horse racing is practically tradition with more and more males – and females – getting into the spirit of the game. The fact that there are so many methods of placing a bet in this game only makes it more competitive.
							</div>
							<div class="article_content">
								ACT horse racing Types
								The most common type is through the Straight Bet or Single where the punter simply places their money on the horse that they believe will win. There’s also the “Place” where the punter bets on their chosen second places and a “Show” for the third place. There’s also a variation of this where the punter can collect if their chosen horse places anywhere within the top three winners.
								For the more competitive in ACT horse racing, there’s also the Combination Bet which allows the punter to choose a maximum of four horses to win in a specific order. Some betting odds like the Pick 3 requires that the player choose the winner for three different races that are played consecutively. There’s even a Pick 6 which...
							</div>
							<div class="viewmore">
								<a href="#"><img src="{{ asset('/layout/core/images/blank.png')}}"/></a>
							</div>
						</td>
						<td class="two_column">
							<div class="article_title">
								<a href="#">ACT Horse Racing</a>
							</div>
							<div class="article_image">
								<img src="{{ asset('layout/core/images/article_image.png') }}"/>
							</div>
							<div class="article_description">
								Placing bets on ACT horse racing is practically tradition with more and more males – and females – getting into the spirit of the game. The fact that there are so many methods of placing a bet in this game only makes it more competitive.
							</div>
							<div class="article_content">
								ACT horse racing Types
								The most common type is through the Straight Bet or Single where the punter simply places their money on the horse that they believe will win. There’s also the “Place” where the punter bets on their chosen second places and a “Show” for the third place. There’s also a variation of this where the punter can collect if their chosen horse places anywhere within the top three winners.
								For the more competitive in ACT horse racing, there’s also the Combination Bet which allows the punter to choose a maximum of four horses to win in a specific order. Some betting odds like the Pick 3 requires that the player choose the winner for three different races that are played consecutively. There’s even a Pick 6 which...
							</div>
							<div class="viewmore">
								<a href="#"><img src="{{ asset('/layout/core/images/blank.png')}}"/></a>
							</div>
						</td>
					</tr>
					@else
					<tr>
						<td class="one_column">
							<div class="article_title">
								<a href="#">ACT Horse Racing</a>
							</div>
							<div class="article_image">
								<img src="{{ asset('/layout/core/images/article_image.png') }}"/>
							</div>
							<div class="article_description">
								Placing bets on ACT horse racing is practically tradition with more and more males – and females – getting into the spirit of the game. The fact that there are so many methods of placing a bet in this game only makes it more competitive.
							</div>
							<div class="article_content">
								ACT horse racing Types
								The most common type is through the Straight Bet or Single where the punter simply places their money on the horse that they believe will win. There’s also the “Place” where the punter bets on their chosen second places and a “Show” for the third place. There’s also a variation of this where the punter can collect if their chosen horse places anywhere within the top three winners.
								For the more competitive in ACT horse racing, there’s also the Combination Bet which allows the punter to choose a maximum of four horses to win in a specific order. Some betting odds like the Pick 3 requires that the player choose the winner for three different races that are played consecutively. There’s even a Pick 6 which...
							</div>
							<div class="viewmore">
								<a href="#"><img src="{{ asset('/layout/core/images/blank.png')}}"/></a>
							</div>
						</td>
					</tr>
					<tr>
						<td class="one_column">
							<div class="article_title">
								<a href="#">ACT Horse Racing</a>
							</div>
							<div class="article_image">
								<img src="{{ asset('/layout/core/images/article_image.png') }}"/>
							</div>
							<div class="article_description">
								Placing bets on ACT horse racing is practically tradition with more and more males – and females – getting into the spirit of the game. The fact that there are so many methods of placing a bet in this game only makes it more competitive.
							</div>
							<div class="article_content">
								ACT horse racing Types
								The most common type is through the Straight Bet or Single where the punter simply places their money on the horse that they believe will win. There’s also the “Place” where the punter bets on their chosen second places and a “Show” for the third place. There’s also a variation of this where the punter can collect if their chosen horse places anywhere within the top three winners.
								For the more competitive in ACT horse racing, there’s also the Combination Bet which allows the punter to choose a maximum of four horses to win in a specific order. Some betting odds like the Pick 3 requires that the player choose the winner for three different races that are played consecutively. There’s even a Pick 6 which...
							</div>
							<div class="viewmore">
								<a href="#"><img src="{{ asset('layout/core/images/blank.png')}}"/></a>
							</div>
						</td>
					</tr>
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
					<a href="#">
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