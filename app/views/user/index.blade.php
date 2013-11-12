@extends('admin.layout')

@section('content')
<!-- User management space -->
@if(count($users) > 0)
	<div class="content_section_title">
		Users Listing
	</div>
	<div class="content_section table_center">
		<table id="user_management_table">
			<thead>
				<tr>
					<td width="5%" align="center" style="border-top-left-radius: 5px;">ID</td>
					<td width="20%" align="center">Username</td>
					<td width="30%" align="center">E-mail Address</td>
					<td width="20%" align="center">User Level</td>
					<td width="25%" align="center" style="border-top-right-radius: 5px;">Action</td>
				</tr>
			</thead>
			<tbody>		
					@foreach($users as $key => $user)
						<tr id="user_{{ $user->id }}" @if($key%2) class="event_background" @else class="odd_background" @endif >							
							<td align="center">{{ $user->id }}</td>
							<td align="center">{{ $user->username }}</td>
							<td align="center">{{ $user->email }}</td>
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
		
			</tbody>
		</table>
	</div>
@else
<!-- No user found notice -->
	<div id="flash_notice">
		No user found.
	</div>
@endif
@stop 