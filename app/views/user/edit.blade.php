@extends('admin.layout')

@section('content')
	<h1>Edit User</h1>
	<!-- Check for error flash var -->
	@if($errors->has())
		@foreach($errors->all() as $message)
			<div id="flash_error">{{ $message }}</div>
		@endforeach
	@endif
	
	<!-- User create form -->

	{{ Form::open(array('id'=> 'user_edit_form')) }}
		<table>
			<tr>
				<td> </td>
				<td>{{ Form::hidden('user_id', $user->id) }}</td>
			</tr>
			<!-- Email field -->
			<tr>
				<td>{{ Form::label('email', 'Email') }}</td>
				<td>{{ Form::email('email', $user->email) }}</td>
			</tr>
			<!-- Username field -->
			<tr>
				<td>{{ Form::label('username', 'Username') }}</td>
				<td>{{ Form::text('username', $user->username) }}</td>
			</tr>
			<tr>
				<td>{{ Form::label('level_id','User Level') }}</td>
				<td>{{ Form::select('level_id', array(
									''	=> '--- Select a level ---',
									'1' => 'Admin',
									'2' => 'Editor'), 
								$user->level_id)}}</td>
			</tr>
			<!-- Sumbit button -->
			<tr>
				<td></td>
				<td>{{ Form::submit('Edit')}}
					   {{ Form::button('Cancel', array(
							'onclick' => "document.location.href='".URL::previous()."'" )
						)}}
				</td>
			</tr>
		</table>
	{{ Form::close() }}
@stop
