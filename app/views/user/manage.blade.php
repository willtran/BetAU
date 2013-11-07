@extends('admin.layout')

@section('content')
<h1>User</h1>

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
				<tr id="user_{{ $user->id }}">
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
						|
						<a href="javascript:void(0);" onclick="user.userDelete('{{ URL::route('user-delete')}}', {{ $user->id }});">Delete</a>
					</td>
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