<!-- Header code layout for admin page -->
<div id="admin_page_navigator">
	<ul id="dropdown_navigator">
		@if(Auth::check())
			<li>{{ HTML::linkRoute('admin-index','Home',array(),array('class'=>'first')) }}</li>
			<li><a href="#">Users</a>
				<ul class="sub_navigator">
					<li><a href="#">Manage Users</a></li>
					<li><a href="#">Create New User</a></li>
				</ul>
			</li>
			<li><a href="#">Domains</a>
				<ul class="sub_navigator">
					<li><a href="#">Manage Domains</a></li>
					<li><a href="#">Create New Domain</a></li>
				</ul>
			</li>
			<li>{{ HTML::linkRoute('logout', 'Logout ('.Auth::user()->username.')', array(),array('class'=>'last')) }}</li>
		@else
			<li>{{ HTML::linkRoute('admin-home','Welcome',array(),array('class'=>'first')) }}</li>
			<li>{{ HTML::linkRoute('login', 'Login', array(),array('class'=>'last')) }}</li>
		@endif
	</ul>
</div>