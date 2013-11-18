<html>
	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="<?php /**TODO place domain keywords here **/ ?>">
		<meta name="description" content="<?php /**TODO place domain keywords here **/ ?>">
		<link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}" type="image/x-icon">
		<link href="{{ asset('/css/template/default/header.css') }}" rel="stylesheet" type="text/css" media="screen">
		<link href="{{ asset('/css/template/default/content.css') }}" rel="stylesheet" type="text/css" media="screen">
		<link href="{{ asset('/css/template/default/footer.css') }}" rel="stylesheet" type="text/css" media="screen">
		<?php /**TODO place google ga code here **/ ?>
	</head>
	<body>
		<!-- Header -->
		<div class="header">
			<!-- Logo -->
			<div class="site_logo">
				<a href="#">
					<img src="{{ asset('/images/template/default/logo.png') }}"/>
				</a>
			</div>
			<!-- Domain Name -->
			<div class="domain_name">
					<?php /**TODO place domain name here **/ ?>
					<a href="http://{{ $domain['host']}}">{{ $domain['host']}}</a>
			</div>
		</div>
		<!-- Content Warpper -->
		<div class="content_wrapper">
			<div class="bookmarker_block">
				<div id="heading">
					<?php /**TODO place domain headding here **/ ?>
					The Best Bookmaker Promotions
				</div>
				<div id="intro">
					<?php /**TODO place domain description here **/ ?>
					We review Australia's favourite sports betting and Bet Au sites along with tips for increasing your chances at winning big bucks betting online! We cover sports such as horse racing, AFL, greyhound racing and other Australian favourite sports
				</div>
				<div class="booker_list">
					<?php /**TODO call listing booker list here **/ ?>
					<ul>
						@for($i=1,$total=5;$i<=$total;$i++)
							<li class="booker_item @if($i==3)featured @endif" onclick="window.location='http://google.com.vn'">
								<div class="booker_logo">
									<img src="{{ asset('../../../images/template/default/booker_'.$i.'.png') }}"/>
								</div>
								<div class="booker_bonus">
									<ul id="bonus_list">
										<li>
											@if($i==3&&$total==5)
												<img class="currency" src="{{ asset('/images/template/default/featured_currency.png') }}"/></li>
											@else
												<img class="currency" src="{{ asset('/images/template/default/currency.png') }}"/></li>
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
				<?php /**TODO place article name here **/ ?>
			</div>
			<div class="next_site"></div>
		</div>
		<!-- Footer -->
		<div class="footer">
			<!-- Logo -->
			<div class="left">
				<div class="site_logo">
					<a href="#">
						<img src="{{ asset('/images/template/default/logo.png') }}"/>
					</a>
				</div>
				<div class="copyright">
					<p>Copyright © 2013 {{ $domain['host']}} and Gambling.com.au PTY LTD.</p>
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