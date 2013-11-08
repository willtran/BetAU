<!-- Left sidebar layout for admin page -->
<div id="sidebar">
	@if(Auth::check())
		<ul id="sidebar_list">
			<!-- User menu site bar -->
			@if($menu['main'] == 'user')
				<li class="user_menu">
					<a href="{{URL::route('user-manage')}}" @if($menu['side_bar'] == 'manage') class="active" @endif>
						Manage Users
						@if($menu['side_bar'] != 'manage')
							<img src ="{{asset('/images/dashboard/arrow_right.png')}}" alt="" class="arrow_right"/>
						@else
							<img src ="{{asset('/images/dashboard/blank.png')}}" alt="" class="arrow_right"/>
						@endif
					</a>
				</li>
				<li class="user_menu">
					<a href="{{URL::route('user-create')}}"  @if($menu['side_bar'] == 'create') class="active" @endif>
						Add New User
						@if($menu['side_bar'] != 'create')
							<img src ="{{asset('/images/dashboard/arrow_right.png')}}" alt="" class="arrow_right"/>
						@else
							<img src ="{{asset('/images/dashboard/blank.png')}}" alt="" class="arrow_right"/>
						@endif
					</a>
				</li>
			<!-- Domain menu site bar -->
			@elseif($menu['main'] == 'domain')
				<li class="domain_menu">
					<a>
						Manage Domains
					</a>
				</li>
				<li class="domain_menu">
					<a>
						Add New Domain
					</a>
				</li>
			@else
				<ul id="sidebar_list">
					<li>
						<a href="{{URL::route('admin-home')}}" class="active">
							Announcement
							<img src ="{{asset('/images/dashboard/blank.png')}}" alt="" class="arrow_right"/>
						</a>
					</li>
				</ul>		
			@endif
		</ul>
	@else
		<ul id="sidebar_list">
			<li>
				<a href="{{URL::route('login')}}" class="active">
					Login
					<img src ="{{asset('/images/dashboard/blank.png')}}" alt="" class="arrow_right"/>
				</a>
			</li>
		</ul>
	@endif
</div>