<!-- Left sidebar layout for admin page -->
<div id="sidebar">
	@if(Auth::check())
		<ul id="sidebar_list">
			<!-- User menu site bar -->
			@if($menu['main'] == 'user')
				<li class="user_menu">
					<a href="{{URL::route('user-manage')}}" @if($menu['side_bar'] == 'manage') class="active" @endif>
						Manage Users
					</a>
				</li>
				<li class="user_menu">
					<a href="{{URL::route('user-create')}}"  @if($menu['side_bar'] == 'create') class="active" @endif>
						Add New User
					</a>
				</li>
			<!-- Domain menu site bar -->
			@elseif($menu['main'] == 'domain')
				<li class="domain_menu">
					<a href="{{URL::route('admin.domain.index')}}"  @if($menu['side_bar'] == 'index') class="active" @endif>
						Manage Domains
					</a>
				</li>
				<li class="domain_menu">
					<a href="{{URL::route('admin.domain.create')}}"  @if($menu['side_bar'] == 'create') class="active" @endif>
						Add New Domain
					</a>
				</li>
			@else
				<ul id="sidebar_list">
					<li>
						<a href="{{URL::route('admin-home')}}" class="active">
							Announcement
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
				</a>
			</li>
		</ul>
	@endif
</div>