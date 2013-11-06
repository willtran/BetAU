@extends('admin.layout')

@section('content')
<h1>Create New User</h1>
<!-- Check for error flash var -->
@if(Session::has('flash_error'))
	<div id="flash_error">{{ Session::get('flash_error') }}</div>
@endif

<!-- Check for notice flash var -->
@if(Session::has('flash_notice'))
	<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
@endif

<!-- User management space -->
<table id="user_management_table" cellspacing="3" border="1" cellpadding="1">
	<thead>
		<tr>
			<td width="15px"></td>
			<td>User ID</td>
			<td>Username</td>
			<td>E-mail Address</td>
			<td>User Level</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		@if(count($users) > 0)
			@foreach($users as $user)
				<tr>
					<td width="15px"></td>
					<td>{{ $user->id }}</td>
					<td>{{ $user->username }}</td>
					<td>{{ $user->email }}</td>
					<td>
						@if($user->level_id == 1)
							Admin
						@elseif($user->level_id == 2)
							Editor
						@endif
					</td>
					<td>{{ HTML::linkRoute('user-edit','Edit',array('id' => $user->id)) }}
						| Delete</td>
				</tr>
			@endforeach
		@else
		<p>
			No user found!
		</p>
		@endif
	</tbody>
</table>
@stop 