<!-- Left sidebar layout for admin page -->
<div id="sidebar">
	@if(Auth::check())
		<ul id="sidebar_list">
			<!-- User menu site bar -->
			@if($menu['main'] == 'user')
				<li class="user_menu">
					<a href="{{URL::route('admin.user.index')}}" @if($menu['side_bar'] == 'index') class="active" @endif>
						Manage Users
					</a>
				</li>
				<li class="user_menu">
					<a href="{{URL::route('admin.user.create')}}"  @if($menu['side_bar'] == 'create') class="active" @endif>
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
			@elseif($menu['main'] == 'category')
				<li class="domain_menu">
					<a href="{{URL::route('admin.category.index')}}"  @if($menu['side_bar'] == 'index') class="active" @endif>
						Manage Categories
					</a>
				</li>
				<li class="domain_menu">
					<a href="{{URL::route('admin.category.create')}}"  @if($menu['side_bar'] == 'create') class="active" @endif>
						Add New Category
					</a>
				</li>
			@else
				<li>
					<a href="{{URL::route('admin.index')}}" class="active">
						Announcement
					</a>
				</li>	
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