<!-- Left sidebar layout for admin page -->
<div id="sidebar">
	@if(Auth::check())
		<ul id="sidebar_list">
			<!-- User menu site bar -->
			@if($menu['main'] == 'user')
				<li class="sidebar_menu">
					<a href="{{URL::route('admin.user.index')}}" @if($menu['side_bar'] == 'index') class="active" @endif>
						Manage Users
					</a>
				</li>
				<li class="sidebar_menu">
					<a href="{{URL::route('admin.user.create')}}"  @if($menu['side_bar'] == 'create') class="active" @endif>
						Add New User
					</a>
				</li>
			<!-- Domain menu site bar -->
			@elseif($menu['main'] == 'domain')
				<li class="sidebar_menu">
					<a href="{{URL::route('admin.domain.index')}}"  @if($menu['side_bar'] == 'index') class="active" @endif>
						Manage Domains
					</a>
				</li>
				<li class="sidebar_menu">
					<a href="{{URL::route('admin.domain.create')}}"  @if($menu['side_bar'] == 'create') class="active" @endif>
						Add New Domain
					</a>
				</li>
			<!-- Category menu site bar -->
			@elseif($menu['main'] == 'category')
				<li class="sidebar_menu">
					<a href="{{URL::route('admin.category.index')}}"  @if($menu['side_bar'] == 'index') class="active" @endif>
						Manage Categories
					</a>
				</li>
				<li class="sidebar_menu">
					<a href="{{URL::route('admin.category.create')}}"  @if($menu['side_bar'] == 'create') class="active" @endif>
						Add New Category
					</a>
				</li>
			<!-- Layout menu site bar -->
			@elseif($menu['main'] == 'layout')
				<li class="sidebar_menu">
					<a href="{{URL::route('admin.layout.index')}}"  @if($menu['side_bar'] == 'index') class="active" @endif>
						Manage Layouts
					</a>
				</li>
				<li class="sidebar_menu">
					<a href="{{URL::route('admin.layout.create')}}"  @if($menu['side_bar'] == 'create') class="active" @endif>
						Add New Layout
					</a>
				</li>
			<!-- Article menu site bar -->
			@elseif($menu['main'] == 'article')
				<li class="sidebar_menu">
					<a href="{{URL::route('admin.article.index')}}"  @if($menu['side_bar'] == 'index') class="active" @endif>
						Manage Articles
					</a>
				</li>
				<li class="sidebar_menu">
					<a href="{{URL::route('admin.article.create')}}"  @if($menu['side_bar'] == 'create') class="active" @endif>
						Add New Article
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