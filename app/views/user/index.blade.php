@extends('admin.layout')

@section('content')
<!-- User management space -->
<table id="user_management_table">
	<thead>
		<tr>
			<td width="5%" align="center" style="border-top-left-radius: 10px;"></td>
			<td width="15%" align="center">User ID</td>
			<td width="15%">Username</td>
			<td width="25%">E-mail Address</td>
			<td width="15%" align="center">User Level</td>
			<td width="25%" align="center" style="border-top-right-radius: 10px;">Action</td>
		</tr>
	</thead>
	<tbody>
		@if(count($users) > 0)
			@foreach($users as $key => $user)
				<tr id="user_{{ $user->id }}" @if($key%2) class="event_background" @else class="odd_background" @endif >
					<td width="5%" align="center"></td>
					<td align="center">{{ $user->id }}</td>
					<td>{{ $user->username }}</td>
					<td>{{ $user->email }}</td>
					<td align="center">
						@if($user->level_id == 1)
							Admin
						@elseif($user->level_id == 2)
							Editor
						@endif
					</td>
					<td align="center">
						<a class="user_edit" href="{{ URL::route('admin.user.edit',array('user' => $user->id)) }}" ><img src="{{ asset('/images/dashboard/blank.png') }}" alt="User Edit" title="Edit user"/></a>
						<a class="user_delete" href="javascript:void(0);" onclick="user.userDelete('{{ URL::route('admin.user.destroy', array('user'=>$user->id)) }}',{{ $user->id }});"><img class="user_delete" src="{{asset('images/dashboard/blank.png')}}" alt="User Delete" title="Delete user"/></a>
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