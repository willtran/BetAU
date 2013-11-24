<!-- Header code layout for admin page -->
<div id="top">
	<!-- Header bar -->
	<div id="header_bar">
		<!-- Logo -->
		<div id="site_logo_block">
			<a id="site_logo" href="{{ URL::route('admin.index')}}"></a>
		</div>
		<!-- Mini menu -->
		<ul id="mini_menu">
			<li id="user_setting_block">
					@if(Auth::check())
						<a href="{{ URL::route('admin.index') }}" @if($menu['main']=='home') class="active" @endif>
							<img src ="{{asset('/images/dashboard/blank.png')}}" alt="" class="home_icon"/>
							Home
						</a>
						<a href="{{ URL::route('admin.user.index')}}" @if($menu['main']=='user'&&$menu['side_bar']=='index') class="active" @endif>
							<img src ="{{asset('/images/dashboard/blank.png')}}" alt="" class="add_user_icon"/>
							Users
						</a>
						<a href="{{ URL::route('admin.domain.index')}}" @if($menu['main']=='domain') class="active" @endif>
							<img src ="{{asset('/images/dashboard/blank.png')}}" alt="" class="domain_icon"/>
							Domains
						</a>
						<a href="{{ URL::route('admin.category.index')}}" @if($menu['main']=='category') class="active" @endif>
							<img src ="{{asset('/images/dashboard/blank.png')}}" alt="" class="category_icon"/>
							Categories
						</a>
						<a href="{{ URL::route('admin.layout.index')}}" @if($menu['main']=='layout') class="active" @endif>
							<img src ="{{asset('/images/dashboard/blank.png')}}" alt="" class="layout_icon"/>
							Layouts
						</a>
						<a href="{{ URL::route('admin.article.index')}}" @if($menu['main']=='article') class="active" @endif>
							<img src ="{{asset('/images/dashboard/blank.png')}}" alt="" class="article_icon"/>
							Articles
						</a>
						<a href="#" id="user_setting">
							<img src ="{{asset('/images/dashboard/blank.png')}}" alt="" class="user_setting_icon"/>
							{{ ucfirst(Auth::user()->username) }}
							<img src ="{{asset('/images/dashboard/arrow_down.png')}}" alt="" class="arrow_down"/>
						</a>
					@endif
				</a>
			</li>
			
				<li id="access_block">
					@if(Auth::check())
						<a href="{{URL::route('logout')}}">
							<img src ="{{asset('/images/dashboard/blank.png')}}" alt="" class="access_icon"/>
							Logout
						</a>
					@else
						<a href="{{URL::route('login')}}">
							<img src ="{{asset('/images/dashboard/blank.png')}}" alt="" class="access_icon"/>
							Login
						</a>
					@endif
				</li>
		</ul>
	</div>
</div>