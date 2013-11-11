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
						<a href="#">
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
	<ul id="dropdown_navigator">
		@if(Auth::check())
			<li>{{ HTML::linkRoute('admin.index','Home',array(),array('class'=>'first')) }}</li>
			<li><a href="javascrip:void(0);" @if($menu['main']=='user') class="active" @endif >Users</a>
				<ul class="sub_navigator">
					<li>{{ HTML::linkRoute('admin.user.index','Manage Users') }}</li>
					<li>{{ HTML::linkRoute('admin.user.create','Create New User') }}</li>
				</ul>
			</li>
			<li><a href="javascrip:void(0);" class="last">Domains</a>
				<ul class="sub_navigator">
					<li>{{ HTML::linkRoute('admin.domain.index','Manage Domains') }}</li>
					<li>{{ HTML::linkRoute('admin.domain.create','Add NewDomain') }}</li>
				</ul>
			</li>
		@else
			<li>{{ HTML::linkRoute('login','Welcome',array(),array('class'=>'first')) }}</li>
		@endif
	</ul>
</div>